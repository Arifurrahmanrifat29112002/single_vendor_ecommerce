<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index() //return resource>view>frontend>userHome.blade.php
    {
       $product = product::all();
        return view('frontend.userHome',compact('product'));
    }
    public function redirect()
    {
        $auth_role = Auth()->user()->role;
        if ($auth_role == 'admin') {
            return view('admin.home');
        }else{
            $product = product::all();
            return view('frontend.userHome',compact('product'));
        }
    }
}
