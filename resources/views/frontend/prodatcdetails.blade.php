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
      <div class="row " >
        <div class="card " style="width: 18rem;">
            <img class="card-img-top" src="..." alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">{{ $product->product_title}}</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
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
   </body>
</html>
