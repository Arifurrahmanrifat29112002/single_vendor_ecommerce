<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="{{ asset('frontend/css') }}/bootstrap.css" />
      <!-- font awesome style -->
      <link href="{{ asset('frontend/css') }}/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="{{ asset('frontend/css') }}/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="{{ asset('frontend/css') }}/responsive.css" rel="stylesheet" />
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
      {{-- @vite(['public/frontend/css/style.css']); --}}

   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('frontend.header')
         <!-- end header section -->
         <!-- slider section -->
         <section class="slider_section ">
            @include('frontend.slider')
         </section>
         <!-- end slider section -->
      </div>
      <!-- why section -->
      <section class="why_section layout_padding">
         @include('frontend.whysection')
      </section>
      <!-- end why section -->
    <div class="row">
        <div class="card m-auto" style="width: 18rem;">
            <img class="card-img-top" src="{{ asset('upload/product_image') }}/{{ $product->product_image}}" alt="Card image cap" width="" height="220px">
            <div class="card-body">
              <h4 class="card-title">{{ $product->product_title }}</h4>
              @if ($product->product_price != null)
              <h6>
                price {{ $product->discound_price }} tk
               </h6>

               <h6  style="text-decoration:line-through">
                price {{ $product->product_price }} tk
               </h6>
              @else
              <h6 >
                price {{ $product->product_price }} tk
               </h6>
              @endif
              <p class="card-text">Product Category: {{ $product->product_category }}</p>
              <p class="card-text">Product details: {{ $product->product_description }}</p>
              <p class="card-text">Available Quentaty: {{ $product->product_quantity }}</p>

              <form action="{{ route('addtocard',['id'=>$product->id]) }}" method="post" class="justify-content-center">
                @csrf
                <input type="number" min="1" name="quantity" style="width: 40%">
                <button type="submit" class="btn btn-primary " >Add to card</button>

             </form>
            </div>
          </div>

    </div>
    <h5 class="text-center m-2 ">Releted Products</h5>
    <div class="row justify-content-center">


        @foreach ($reletad_product as $product)
        <div class="card col-md-3 m-1">
            <img class="card-img-top" data-src="holder.js/100px160/" alt="100%x160" src="{{ asset('upload/product_image') }}/{{ $product->product_image}}" data-holder-rendered="true" style="height: 160px; width: 100%; display: block;">
            <div class="card-body">
              <h5 class="card-title">{{ $product->product_title }}</h5>
              @if ($product->product_price != null)
              <h6>
                price {{ $product->discound_price }} tk
               </h6>

               <h6  style="text-decoration:line-through">
                price {{ $product->product_price }} tk
               </h6>
              @else
              <h6 >
                price {{ $product->product_price }} tk
               </h6>
              @endif
              <div class="btn-group" role="group" aria-label="...">
                <a href="{{ route('product.details',['id'=>$product->id]) }}" class="btn btn-warning">Details</a>
                <a href="" class="btn btn-primary ml-1">Add to card</a>
              </div>
            </div>
          </div>
        @endforeach


    </div>



      <!-- end client section -->
      <!-- footer start -->
      <footer>
         @include('frontend.footer')
      </footer>
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

         </p>
      </div>
      <!-- jQery -->
      <script src="{{ asset('frontend') }}/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="{{ asset('frontend') }}/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="{{ asset('frontend') }}/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="{{ asset('frontend') }}/js/custom.js"></script>
      <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
   </body>
</html>
