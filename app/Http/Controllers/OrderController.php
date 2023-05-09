<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Notifications\SendEmailNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification as FacadesNotification;
use PDF;
use Notification;

class OrderController extends Controller
{
    //
    public function index()
    {
       $order = order::latest()->paginate(10);
        return view('admin.order.index',compact('order'));
    }
    public function deliverd($id)
    {
       $order = order::find($id);
       $order->delivery_status = "deliverd";
       $order->save();
       return back();
    }

    public function print_pdf($id)
    {
       $order = order::find($id);
        $pdf= PDF::loadView("admin.pdf",compact('order'));
        return $pdf->download('order_details.pdf');
    }


    public function send_mail($id)
    {
        $order = order::find($id);
        return view('admin.order.sendMail',compact('order'));
    }
    public function userMail(Request $request,$id)
    {
        $order = order::find($id);
        $details = [

            'greeting' => $request->greeting,
            'firstline' => $request->firstline,
            'body' => $request->body,
            'button' => $request->button,
            'url' => $request->url,
            'lastline' => $request->lastline,
        ];
         FacadesNotification::send($order,new SendEmailNotification($details));
         return redirect()->back();

    }
}
