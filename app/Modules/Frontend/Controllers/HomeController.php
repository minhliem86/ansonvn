<?php

namespace App\Modules\Frontend\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;

class HomeController extends Controller
{
    public function getIndex()
    {
      return view('Frontend::page.home');
    }
}
