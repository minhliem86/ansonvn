<?php

namespace App\Modules\Admin\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\ProductRepository;
use App\Repositories\CategoriesRepository;
use App\Repositories\PhotoRepository;
use App\Repositories\Eloquent\CommonRepository;
use Datatables;
use DB;

class ProductController extends Controller
{
    protected $_original;
    protected $_thumbnail;
    protected $_removePath;
    protected $product;
    protected $category;
    protected $common;
    protected $photo;


    public function __construct(ProductRepository $product, CommonRepository $common, PhotoRepository $photo, CategoriesRepository $category)
    {
        $this->product = $product;
        $this->category = $category;
        $this->common = $common;
        $this->photo = $photo;
        $this->_original = env('ORIGINAL_PATH');
        $this->_thumbnail = env('THUMBNAIL_PATH');
        $this->_removePath = env('REMOVE_PATH');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $product = $this->product->query(['products.id as id', 'products.name as name', 'products.img_url as img_url', 'products.order as order', 'products.status as status', 'products.category_id as category_id', 'categories.name as cate_name'])->join('categories', 'products.category_id', '=', 'categories.id');

            return Datatables::of($product)
                ->addColumn('action', function($product){
                    return '<a href="'.route('admin.product.edit', $product->id).'" class="btn btn-success btn-sm d-inline-block"><i class="fa fa-edit"></i> </a>
                <form method="POST" action=" '.route('admin.product.destroy', $product->id).' " accept-charset="UTF-8" class="d-inline-block">
                    <input name="_method" type="hidden" value="DELETE">
                    <input name="_token" type="hidden" value="'.csrf_token().'">
                               <button class="btn  btn-danger btn-sm" type="button" attrid=" '.route('admin.product.destroy', $product->id).' " onclick="confirm_remove(this);" > <i class="fa fa-trash"></i></button>
               </form>' ;
                })->editColumn('order', function ($product) {
                    return "<input type='text' name='order' class='form-control' data-id= '" . $product->id . "' value= '" . $product->order . "' />";
                })->editColumn('status', function ($product) {
                    $status = $product->status ? 'checked' : '';
                    $product_id =$product->id;
                    return '
                    <label class="switch switch-icon switch-success-outline">
                        <input type="checkbox" name="status" class="switch-input" '.$status.' data-id="'.$product_id.'">
                        <span class="switch-label" data-on="" data-off=""></span>
                        <span class="switch-handle"></span>
                    </label>
                    ';
                })->editColumn('img_url', function ($product) {
                    return '<img src="' . asset('public/uploads/'. $product->img_url ).'" width="120" class="img-responsive">';
                })->filter(function ($query) use ($request) {
                    if (request()->has('name')) {
                        $query->where('name', 'like', "%{$request->input('name')}%");
                    }
                })->setRowId('id')->make(true);
        }
        return view('Admin::pages.product.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = $this->category->query()->lists('name','id')->toArray();
        return view('Admin::pages.product.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->has('img_url')) {
            $img_url = $this->common->getPath($request->input('img_url'));
        } else {
            $img_url = "";
        }
        $order = $this->product->getOrder();
        $data = [
            'name' => $request->input('name'),
            'slug' => \LP_lib::unicode($request->input('name')),
            'description' => $request->input('description'),
            'img_url' => $img_url,
            'order' => $order,
            'category_id' => $request->input('category_id'),
            'order' => $order
        ];

        $product = $this->product->create($data);

        if($request->hasFile('thumb-input'))
        {
            $sub_photo = $request->file('thumb-input');
            if($sub_photo[0]){
                $data_photo = [];
                foreach($sub_photo as $thumb){
                    $bigSize = $this->common->uploadImage($request, $thumb, $this->_original,$resize = false,null,null, base_path($this->_removePath));
                    $smallsize = $this->common->createThumbnail($bigSize,$this->_thumbnail,350, 350, base_path($this->_removePath));
                    $thumbsize = $this->common->createThumbnail($bigSize,$this->_thumbnail,85, 85, base_path($this->_removePath));

                    $order = $this->photo->getOrder();
                    $filename = $this->common->getFileName($bigSize);
                    $data = new \App\Models\Photo(
                        [
                            'img_url' => $smallsize,
                            'thumb_url' => $thumbsize,
                            'order'=>$order,
                            'filename' => $filename,
                        ]
                    );
                    array_push($data_photo, $data);
                }

                $product->photos()->saveMany($data_photo);
            }
        }

//        if($request->has('seo_checking')){
//            if($request->has('meta_img')){
//                $img_meta = $this->common->getPath($request->input('meta_img'));
//            }else{
//                $img_meta = '';
//            }
//            $data_seo = [
//                'meta_keyword' => $request->input('keywords'),
//                'meta_description' => $request->input('description'),
//                'meta_img' => $img_meta,
//            ];
//            $product->metas()->save(new \App\Models\Meta($data_seo));
//        }
        return redirect()->route('admin.product.index')->with('success', 'Created !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = $this->category->query()->lists('name','id')->toArray();
        $inst = $this->product->find($id);
        return view('Admin::pages.product.edit', compact('inst', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $img_url = $this->common->getPath($request->input('img_url'));

        $data = [
            'name' => $request->input('name'),
            'slug' => \LP_lib::unicode($request->input('name')),
            'description' => $request->input('description'),
            'img_url' => $img_url,
            'category_id' => $request->input('category_id'),
            'order' => $request->input('order'),
            'status' => $request->input('status'),
        ];

        $product = $this->product->update($data, $id);

        if($request->hasFile('thumb-input'))
        {
            $sub_photo = $request->file('thumb-input');
            if($sub_photo[0]){
                $data_photo = [];
                foreach($sub_photo as $thumb){
                    $bigSize = $this->common->uploadImage($request, $thumb, $this->_original,$resize = false,null,null, base_path($this->_removePath));
                    $smallsize = $this->common->createThumbnail($bigSize,$this->_thumbnail,350, 350, base_path($this->_removePath));
                    $thumbsize = $this->common->createThumbnail($bigSize,$this->_thumbnail,85, 85, base_path($this->_removePath));

                    $order = $this->photo->getOrder();
                    $filename = $this->common->getFileName($bigSize);
                    $data = new \App\Models\Photo(
                        [
                            'img_url' => $smallsize,
                            'thumb_url' => $thumbsize,
                            'order'=>$order,
                            'filename' => $filename,
                        ]
                    );
                    array_push($data_photo, $data);
                }

                $product->photos()->saveMany($data_photo);
            }
        }

//        if($request->has('seo_checking')){
//            $img_meta = $this->common->getPath($request->input('meta_img'));
//
//            $data_seo = [
//                'meta_keyword' => $request->input('keywords'),
//                'meta_description' => $request->input('description'),
//                'meta_img' => $img_meta,
//            ];
//
//            if(!$request->has('meta_id')){
//                $product->metas()->save(new \App\Models\Meta($data_seo));
//            }else{
//                \DB::table('metables')->where('id',$request->input('meta_id'))->update($data_seo);
//            }
//        }



        return redirect()->route('admin.product.index')->with('success', 'Updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->product->delete($id);
        return redirect()->route('admin.product.index')->with('success', 'Deleted !');
    }

    /*DELETE ALL*/
    public function deleteAll(Request $request)
    {
        if (!$request->ajax()) {
            abort(404);
        } else {
            $data = $request->arr;
            $response = $this->product->deleteAll($data);
            return response()->json(['msg' => 'ok']);
        }
    }

    /*UPDATE ORDER*/
    public function postAjaxUpdateOrder(Request $request)
    {
        if (!$request->ajax()) {
            abort('404', 'Not Access');
        } else {
            $data = $request->input('data');
            foreach ($data as $k => $v) {
                $upt = [
                    'order' => $v,
                ];
                $obj = $this->product->find($k);
                $obj->update($upt);
            }
            return response()->json(['msg' => 'ok', 'code' => 200], 200);
        }
    }

    /*CHANGE STATUS*/
    public function updateStatus(Request $request)
    {
        if (!$request->ajax()) {
            abort('404', 'Not Access');
        } else {
            $value = $request->input('value');
            $id = $request->input('id');
            $cate = $this->product->find($id);
            $cate->status = $value;
            $cate->save();
            return response()->json([
                'mes' => 'Updated',
                'error' => false,
            ], 200);
        }
    }

    public function updateHotProduct(Request $request)
    {
        if (!$request->ajax()) {
            abort('404', 'Not Access');
        } else {
            $value = $request->input('value');
            $id = $request->input('id');
            $cate = $this->product->find($id);
            $cate->hot = $value;
            $cate->save();
            return response()->json([
                'mes' => 'Updated',
                'error' => false,
            ], 200);
        }
    }

    /* REMOVE CHILD PHOTO */
    public function AjaxRemovePhoto(Request $request)
    {
        if(!$request->ajax()){
            abort('404', 'Not Access');
        }else{
            $id = $request->input('key');
            $this->photo->delete($id);
            return response()->json(['success'],200);
        }
    }

    /* UPDATE CHILD PHOTO */
    public function AjaxUpdatePhoto(Request $request)
    {
        if(!$request->ajax()){
            abort('404', 'Not Access');
        }else{
            $id = $request->input('id_photo');
            $order = $request->input('value');
            $photo = $this->photo->update(['order'=>$order], $id);

            return response()->json([
                'mes' => 'Update Order',
                'error'=> false,
            ], 200);
        }
    }
}
