<?php

namespace App\Modules\Admin\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\BranchRepository;
use App\Repositories\Eloquent\CommonRepository;
use Datatables;
use DB;

class BranchController extends Controller
{
    protected $branch;
    protected $common;
    public function __construct(BranchRepository $branch, CommonRepository $common)
    {
        $this->branch = $branch;
        $this->common = $common;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        if($request->ajax()){
            $branch = $this->branch->query(['id', 'title', 'address', 'phone', 'img_url', 'order', 'status']);
            return Datatables::of($branch)
                ->addColumn('action', function($branch){
                    return '<a href="'.route('admin.branch.edit', $branch->id).'" class="btn btn-success btn-sm d-inline-block"><i class="fa fa-edit"></i> </a>
                <form method="POST" action=" '.route('admin.branch.destroy', $branch->id).' " accept-charset="UTF-8" class="d-inline-block">
                    <input name="_method" type="hidden" value="DELETE">
                    <input name="_token" type="hidden" value="'.csrf_token().'">
                               <button class="btn  btn-danger btn-sm" type="button" attrid=" '.route('admin.branch.destroy', $branch->id).' " onclick="confirm_remove(this);" > <i class="fa fa-trash"></i></button>
               </form>' ;
                })->editColumn('order', function($branch){
                    return "<input type='text' name='order' class='form-control' data-id= '".$branch->id."' value= '".$branch->order."' />";
                })->editColumn('status', function($branch){
                    $status = $branch->status ? 'checked' : '';
                    $branch_id =$branch->id;
                    return '
                  <label class="switch switch-icon switch-success-outline">
                    <input type="checkbox" name="status" class="switch-input" '.$status.' data-id="'.$branch_id.'">
                    <span class="switch-label" data-on="" data-off=""></span>
                    <span class="switch-handle"></span>
                </label>
              ';
                })->editColumn('img_url',function($service){
                    return '<img src="'.asset('public/uploads/'.$service->img_url).'" width="120" class="img-responsive">';
                })->filter(function($query) use ($request){
                    if (request()->has('name')) {
                        $query->where('title', 'like', "%{$request->input('name')}%");
                    }
                })->setRowId('id')->make(true);
        }
        return view('Admin::pages.branch.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin::pages.branch.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->has('img_url')){
            $img_url = $this->common->getPath($request->input('img_url'));
        }else{
            $img_url = '';
        }
        $order = $this->branch->getOrder();

        $data = [
            'title' => $request->input('title'),
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
            'opentime' => $request->input('opentime'),
            'hotline' => $request->input('hotline'),
            'map' => $request->input('map'),
            'img_url' => $img_url,
            'order' => $order,
        ];
        $this->branch->create($data);
        return redirect()->route('admin.branch.index')->with('success','Created !');
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
        $inst = $this->branch->find($id);
        return view('Admin::pages.branch.edit', compact('inst'));
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
        $img_url = $this->common->getPath($request->input('img_url'));
        $data = [
            'title' => $request->input('title'),
            'address' => $request->input('address'),
            'phone' => $request->input('phone'),
            'opentime' => $request->input('opentime'),
            'hotline' => $request->input('hotline'),
            'map' => $request->input('map'),
            'img_url' => $img_url,
            'order' => $request->input('order'),
            'status' => $request->input('status'),
        ];
        $this->branch->update($data, $id);
        return redirect()->route('admin.branch.index')->with('success', 'Updated !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->branch->delete($id);
        return redirect()->route('admin.branch.index')->with('success','Deleted !');
    }

    /*DELETE ALL*/
    public function deleteAll(Request $request)
    {
        if(!$request->ajax()){
            abort(404);
        }else{
            $data = $request->arr;
            $response = $this->branch->deleteAll($data);
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
                $obj = $this->branch->find($k);
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
            $branch = $this->branch->find($id);
            $branch->status = $value;
            $branch->save();
            return response()->json([
                'mes' => 'Updated',
                'error'=> false,
            ], 200);
        }
    }
}
