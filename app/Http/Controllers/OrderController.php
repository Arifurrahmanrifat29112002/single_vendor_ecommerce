<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Notifications\SendEmailNotification;
use Carbon\Carbon;
use Illuminate\Http\Client\Response as ClientResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response ;
use Illuminate\Support\Facades\Auth;
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



    // public function search(Request $request): Response
    // {

    //     // $order_search_result = order::where('name', 'Like', '%'.$request->search.'%')->orWhere('email', 'Like', '%'.$request->search.'%')->orWhere('phone', 'Like', '%'.$request->search.'%')->orWhere('address', 'Like', '%'.$request->search.'%')->orWhere('product_title', 'Like', '%'.$request->search.'%')->orWhere('price', 'Like', '%'.$request->search.'%')->orWhere('quentity', 'Like', '%'.$request->search.'%')->orWhere('product_id', 'Like', '%'.$request->search.'%')->orWhere('payment_status', 'Like', '%'.$request->search.'%')->orWhere('delivery_status', 'Like', '%'.$request->search.'%')->orWhere('created_at', 'Like', '%'.$request->search.'%')->paginate(10);

    //     // return view('admin.order.searchResult',compact('order_search_result'));

    //     // $query = order::query();
    //     // $date = $request->date_filter;
    //     // switch ($date) {
    //     //     case 'today':
    //     //             $query->whereDate('created_at',Carbon::today());
    //     //         break;
    //     //     case 'yesterday':
    //     //             $query->whereDate('created_at',Carbon::yesterday());
    //     //         break;
    //     //     case 'this_week':
    //     //             $query->whereDate('created_at',[Carbon::now()->startOfWeek(),Carbon::now()->endOfWeek()]);
    //     //         break;
    //     //     case 'last_week':
    //     //             $query->whereDate('created_at',[Carbon::now()->subWeek(),Carbon::now()]);
    //     //         break;
    //     //     case 'this_month':
    //     //             $query->whereDate('created_at',Carbon::now()->month());
    //     //         break;
    //     //     case 'last_month':
    //     //             $query->whereDate('created_at',Carbon::now()->subMonth()->month());
    //     //         break;
    //     //     case 'this_year':
    //     //             $query->whereDate('created_at',Carbon::now()->year());
    //     //         break;
    //     //     case 'last_year':
    //     //             $query->whereDate('created_at',Carbon::now()->subYear()->year());
    //     //         break;
    //     // }
    //     // return response()->view('admin.order.searchResult',compact('query'));

    // }
    public function user_order_data()
    {
        if (Auth::id()) {
          $order =  order::where('user_id',Auth::user()->id)->get();
          return view('frontend.userOrder',compact('order'));
        } else {
            return redirect('login');
        }

    }
    public function orderCacle($id)
    {
        $order =order::find($id);
        $order->delivery_status = 'you canceled this order';

        $order->save();
        return back();
    }
    public function filter(Request $request)
    {
        $order_result = order::when($request->filled('form_date') && $request->filled('to_daate'), function ($query) {
            return $query->whereBetween('created_at', [request()->form_date, request()->to_date]);
        })->when($request->filled('payment_status'), function ($query) {
            return $query->where('payment_status', request()->payment_status);
        })->when($request->filled('delivery_status'), function ($query) {
            return $query->where('delivery_status', request()->delivery_status);
        })->get();
      return view('admin.order.searchResult',compact('order_result'));
    }
}
