<?php

namespace App\Modules\Frontend\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;

class GioithieuController extends Controller
{
    public function getGioithieu()
    {
      return view('Frontend::page.about');
    }
}
