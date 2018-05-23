<?php

namespace App\Modules\Frontend\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;

use App\Repositories\CategoriesRepository;
use App\Repositories\ServiceRepository;

class HomeController extends Controller
{
    protected $category;
    protected $service;

    public function __construct(CategoriesRepository $category, ServiceRepository $service)
    {
        $this->category = $category;
        $this->service = $service;
    }

    public function getIndex()
    {
        $categories = $this->category->all(['id', 'name', 'slug', 'img_url','description']);
        $services = $this->service->all(['id', 'title', 'slug', 'img_url']);
      return view('Frontend::page.home', compact('categories', 'services'));
    }
}
