<?php

namespace App\Modules\Frontend\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\BranchRepository;

class BranchController extends Controller
{
    protected $branch;
    public function __construct(BranchRepository $branch)
    {
        $this->branch = $branch;
    }

    public function getChinhanh($id)
    {
        $branch = $this->branch->find($id);
        if(isset($branch)){
            return view('Frontend::page.branch', compact('branch'));
        }
    }
}
