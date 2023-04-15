<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index() //return resource>view>frontend>userHome.blade.php
    {
        return view('frontend.userHome');
    }
    public function redirect()
    {
        $auth_role = Auth()->user()->role;
        if ($auth_role == 'admin') {
            return view('admin.home');
        }else{
            return view('frontend.userHome');
        }
    }
}
