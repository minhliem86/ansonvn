<?php

namespace App\Modules\Frontend\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\GalleryRepository;

class GalleryController extends Controller
{
    protected $gallery;

    public function __construct(GalleryRepository $gallery)
    {
        $this->gallery = $gallery;
    }

    public function getGallery()
    {
        $gallery = $this->gallery->all(['*'],['photos']);
        return view('Frontend::page.gallery', compact('gallery'));
    }

    public function postAjaxGallery(Request $request)
    {
        if($request->ajax()){
            $id = $request->input('id');
            $photos = $this->gallery->find($id)->photos;
            $data = [];
            foreach($photos as $item){
                $data[] = [
                    'src' => asset($item->img_url),
                    'thumb' => asset($item->thumb_url)
                ];
            }

            return response()->json(['data' => $data], 200);

        }else{
            abort(404);
        }
    }
}
