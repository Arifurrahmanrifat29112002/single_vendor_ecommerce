<?php

namespace App\Http\Controllers;

use App\Models\order;

use Illuminate\Http\Request;
use PDF;
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
}
