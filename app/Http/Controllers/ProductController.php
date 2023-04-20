<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\product;
use Illuminate\Http\Request;
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
            '*'=>'required',
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
        return view('admin.product.show',[
            'products' =>product::latest()->paginate(30),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(product $product)
    {
        //
    }
}
