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
}
