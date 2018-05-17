<?php

namespace App\Modules\Admin\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\GalleryRepository;
use App\Repositories\PhotoRepository;
use App\Repositories\Eloquent\CommonRepository;
use Datatables;
use DB;

class GalleryController extends Controller
{
    protected $gallery;
    protected $photo;
    protected $common;
    protected $_original;
    protected $_thumbnail;
    protected $_removePath;

    public function __construct(GalleryRepository $gallery, CommonRepository $common, PhotoRepository $photo )
    {
        $this->gallery = $gallery;
        $this->common = $common;
        $this->photo = $photo;
        $this->_original = env('ORIGINAL_PATH');
        $this->_thumbnail = env('THUMBNAIL_PATH');
        $this->_removePath = env('REMOVE_PATH');
    }

    public function index(Request $request)
    {
        if($request->ajax()){
            $gal = $this->gallery->query(['id', 'title', 'order', 'status']);
            return Datatables::of($gal)
                ->addColumn('action', function($gal){
                    return '<a href="'.route('admin.gallery.edit', $gal->id).'" class="btn btn-success btn-sm d-inline-block"><i class="fa fa-edit"></i> </a>
                <form method="POST" action=" '.route('admin.gallery.destroy', $gal->id).' " accept-charset="UTF-8" class="d-inline-block">
                    <input name="_method" type="hidden" value="DELETE">
                    <input name="_token" type="hidden" value="'.csrf_token().'">
                               <button class="btn  btn-danger btn-sm" type="button" attrid=" '.route('admin.gallery.destroy', $gal->id).' " onclick="confirm_remove(this);" > <i class="fa fa-trash"></i></button>
               </form>' ;
                })->editColumn('order', function($gal){
                    return "<input type='text' name='order' class='form-control' data-id= '".$gal->id."' value= '".$gal->order."' />";
                })->editColumn('status', function($gal){
                    $status = $gal->status ? 'checked' : '';
                    $gal_id =$gal->id;
                    return '
                  <label class="switch switch-icon switch-success-outline">
                    <input type="checkbox" name="status" class="switch-input" '.$status.' data-id="'.$gal_id.'">
                    <span class="switch-label" data-on="" data-off=""></span>
                    <span class="switch-handle"></span>
                </label>
              ';
                })->filter(function($query) use ($request){
                    if (request()->has('name')) {
                        $query->where('title', 'like', "%{$request->input('name')}%");
                    }
                })->setRowId('id')->make(true);
        }
        return view('Admin::pages.gallery.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin::pages.gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = $this->gallery->getOrder();

        $data = [
            'title' => $request->input('title'),
            'order' => $order,
        ];
        $gallery = $this->gallery->create($data);

        if($request->hasFile('thumb-input'))
        {
            $sub_photo = $request->file('thumb-input');
            if($sub_photo[0]){
                $data_photo = [];
                foreach($sub_photo as $thumb){
                    $bigSize = $this->common->uploadImage($request, $thumb, $this->_original,$resize = false,null,null, base_path($this->_removePath));
                    $smallsize = $this->common->createThumbnail($bigSize,$this->_thumbnail,350, 350, base_path($this->_removePath));

                    $order = $this->photo->getOrder();
                    $filename = $this->common->getFileName($bigSize);
                    $data = new \App\Models\Photo(
                        [
                            'img_url' => $bigSize,
                            'thumb_url' => $smallsize,
                            'order'=>$order,
                            'filename' => $filename,
                        ]
                    );
                    array_push($data_photo, $data);
                }

                $gallery->photos()->saveMany($data_photo);
            }
        }

        return redirect()->route('admin.gallery.index')->with('success','Created !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inst = $this->gallery->find($id);
        return view('Admin::pages.gallery.edit', compact('inst'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = [
            'title' => $request->input('title'),
            'order' => $request->input('order'),
            'status' => $request->input('status'),
        ];

        $gallery = $this->gallery->update($data, $id);

        if($request->hasFile('thumb-input'))
        {
            $sub_photo = $request->file('thumb-input');
            if($sub_photo[0]){
                $data_photo = [];
                foreach($sub_photo as $thumb){
                    $bigSize = $this->common->uploadImage($request, $thumb, $this->_original,$resize = false,null,null, base_path($this->_removePath));
                    $smallsize = $this->common->createThumbnail($bigSize,$this->_thumbnail,350, 350, base_path($this->_removePath));

                    $order = $this->photo->getOrder();
                    $filename = $this->common->getFileName($bigSize);
                    $data = new \App\Models\Photo(
                        [
                            'img_url' => $bigSize,
                            'thumb_url' => $smallsize,
                            'order'=>$order,
                            'filename' => $filename,
                        ]
                    );
                    array_push($data_photo, $data);
                }

                $gallery->photos()->saveMany($data_photo);
            }
        }

        return redirect()->route('admin.gallery.index')->with('success', 'Updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->gallery->delete($id);
        return redirect()->route('admin.gallery.index')->with('success','Deleted !');
    }

    /*DELETE ALL*/
    public function deleteAll(Request $request)
    {
        if(!$request->ajax()){
            abort(404);
        }else{
            $data = $request->arr;
            $response = $this->gallery->deleteAll($data);
            return response()->json(['msg' => 'ok']);
        }
    }

    /*UPDATE ORDER*/
    public function postAjaxUpdateOrder(Request $request)
    {
        if(!$request->ajax())
        {
            abort('404', 'Not Access');
        }else{
            $data = $request->input('data');
            foreach($data as $k => $v){
                $upt  =  [
                    'order' => $v,
                ];
                $obj = $this->gallery->find($k);
                $obj->update($upt);
            }
            return response()->json(['msg' =>'ok', 'code'=>200], 200);
        }
    }

    /*CHANGE STATUS*/
    public function updateStatus(Request $request)
    {
        if(!$request->ajax()){
            abort('404', 'Not Access');
        }else{
            $value = $request->input('value');
            $id = $request->input('id');
            $gal = $this->gallery->find($id);
            $gal->status = $value;
            $gal->save();
            return response()->json([
                'mes' => 'Updated',
                'error'=> false,
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
}
