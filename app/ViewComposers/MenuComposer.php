<?php
namespace App\ViewComposers;

use Illuminate\View\View;
use App\Repositories\CategoriesRepository;
use App\Repositories\ServiceRepository;
use App\Repositories\BranchRepository;

class MenuComposer{

    protected $category;
    protected $service;
    protected $branch;

    public function __construct(CategoriesRepository $category, ServiceRepository $service, BranchRepository $branch)
    {
        $this->category = $category;
        $this->service = $service;
        $this->branch = $branch;
    }

    public function compose(View $view)
    {
        $cate_menu = $this->category->query(['id','name','slug'])->where('status',1)->get();
        $services = $this->service->query(['id','title','slug'])->where('status',1)->get();
        $branch = $this->branch->query(['id','title','address','phone', 'opentime', 'hotline', 'img_url', 'map'])->where('status',1)->get();
        $view->with(['cate_menu'=>$cate_menu, 'services' => $services, 'branch' => $branch]);
    }
}