<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\order;
use App\Models\product;
use App\Models\Reply;
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


    // comment
    public function comment(Request $request)
    {
        $request->validate([
            '*' => 'required'
        ]);

       if (Auth::id()) {
           $comment = new Comment;
           $comment->name = Auth::user()->name;
           $comment->uesr_id = Auth::user()->id;
           $comment->comment = $request->comment;

           $comment->save();

           return back();
       } else {
         return redirect('login');
       }



    }


     // comment
     public function reply(Request $request)
     {
         $request->validate([
             '*' => 'required'
         ]);

        if (Auth::id()) {
            $reply = new Reply;
            $reply->name = Auth::user()->name;
            $reply->uesr_id = Auth::user()->id;
            $reply->comment_id = $request->comment_id;
            $reply->reply = $request->reply;

            $reply->save();

            return back();
        } else {
          return redirect('login');
        }



     }
}
