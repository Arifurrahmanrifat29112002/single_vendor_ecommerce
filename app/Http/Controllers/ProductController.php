<?php

namespace App\Http\Controllers;

use App\Models\addtocard;
use App\Models\category;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

       $category = category::all();
       return view('admin.product.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_title' => 'required',
            'product_description' => 'required',
            'product_price' => 'required',
            'product_quantity' => 'required',
            'product_category' => 'required',
            'product_image'=>'mimes:png,jpg'

        ]);

        $file_name = auth()->id() . '-' . time() . '.' . $request->file('product_image')->getClientOriginalExtension();
        $img = Image::make($request->file('product_image'));
        $img->save(base_path('public/upload/product_image/' . $file_name), 80);

        $product = new product;
        $product->product_title =$request->product_title;
        $product->product_description =$request->product_description;
        $product->product_price =$request->product_price;
        $product->product_quantity =$request->product_quantity;
        $product->discound_price =$request->discound_price;
        $product->product_category =$request->product_category;

        $product->product_image =$file_name;
        $product->save();
        return back()->withSuccess('Product Create Successfull');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $product_trashed = product::onlyTrashed()->get();
        $product = product::latest()->paginate(2);
        return view('admin.product.show',compact('product','product_trashed'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $product = product::find($id);
       $category = category::all();
        return view("admin.product.edit",compact('product','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'product_title' => 'required',
            'product_description' => 'required',
            'product_price' => 'required',
            'product_quantity' => 'required',
            'product_category' => 'required',
            'product_image'=>'mimes:png,jpg'
        ]);
      $product_img =  product::find($id)->value('product_image');

        product::find($id)->update([
            'product_title' => $request->product_title,
            'product_description' => $request->product_description,
            'product_price' => $request->product_price,
            'product_quantity' => $request->product_quantity,
            'discound_price' => $request->discound_price,
            'product_category' => $request->product_category,
        ]);
        if($request->hasFile('product_image')){
            //product image update
            unlink(base_path('public/upload/product_image/' .$product_img ));
            $file_name = auth()->id() . '-' . time() . '.' . $request->file('product_image')->getClientOriginalExtension();
            $img = Image::make($request->file('product_image'));
            $img->save(base_path('public/upload/product_image/' . $file_name), 80);
            product::find($id)->update([
                "product_image" => $file_name,
            ]);
        }
        return back()->withSuccess('update successful');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        product::find($id)->delete();
        return back()->withSuccess('product temp delete successful');
    }

    public function restore($id)
    {
        product::onlyTrashed()->find($id)->restore();
        return back()->withSuccess('product restore successful');
    }
    public function delete($id)
    {
        product::onlyTrashed()->find($id)->forceDelete();
        return back()->withSuccess('product delete successful');
    }
    public function details($id)
    {
      $product = product::find($id);
      $category = $product->product_category;
      $reletad_product = product::where('product_category',$category)->get();
        return view('frontend.prodatcdetails',compact('product','reletad_product'));
    }
    public function addtocard(Request $request, $id)
    {
        if (Auth::id()) {
            $product = product::find($id);
            $card = new addtocard;
            $card->user_id = Auth::user()->id;
            $card->name = Auth::user()->name;
            $card->email = Auth::user()->email;
            $card->phone = Auth::user()->phone;
            $card->address = Auth::user()->address;
            $card->product_title = $product->product_title;

            if ($product->discound_price !=null) {
                $card->price = $product->discound_price * $request->quantity;
            }else{
                $card->price = $product->product_price * $request->quantity;
            }

            $card->quentity = $request->quantity;
            $card->image = $product->product_image;
            $card->product_id = $product->id;

            $card->save();
            return back()->withSuccess('addtocard successful');



        }else {
            return redirect('login');
        }



    }
    public function showcard()
    {
        if (Auth::id()) {
            $user = Auth::user()->id;
        $cards = addtocard::where('user_id',$user)->get();
        return view('frontend.addtocard',compact('cards'));

        }else {
            return redirect('login');
        }
    }
    public function cardremove($id)
    {
        addtocard::find($id)->delete();
        return back();
    }

}
