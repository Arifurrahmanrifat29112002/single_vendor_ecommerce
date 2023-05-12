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
      <div class="">
         <!-- header section strats -->
         @include('frontend.header')
         <!-- end header section -->
         <!-- slider section -->

         <!-- end slider section -->
      </div>

      <div class="container">
        <div class="row ">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Order</h4>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>


                          <th> Product Title </th>
                          <th> Quentity </th>
                          <th> Price </th>
                          <th> Image</th>
                          <th> Payment Status </th>
                          <th> Delivery Status </th>
                          <th> order cancel</th>
                        </tr>
                      </thead>
                      <tbody class="alldata">

                     @foreach ($order as $order_info)
                     <tr>
                        <td>{{ $order_info->product_title }} </td>
                        <td> {{ $order_info->quentity }} </td>
                        <td> {{ $order_info->price }} </td>
                        <td> <img src="{{ asset('upload/product_image') }}/{{ $order_info->image }}" alt="image" width="40"> </td>
                        <td>
                          <div class="badge badge-outline-success">{{ $order_info->payment_status }}</div>
                        </td>
                        <td>
                          <div class="badge badge-outline-success">{{ $order_info->delivery_status }}</div>
                        </td>




                        @if ($order_info->delivery_status != 'deliverd')
                            <td>
                                <a href="{{ route('order.cancle',['id'=>$order_info->id]) }}" class="btn btn-danger">Cancle</a>
                            </td>
                        @else
                        <td>
                            <a href="#" class="btn btn-success">Order deliverd</a>
                        </td>
                        @endif



                      </tr>
                     @endforeach
                     <tbody id="Content" class="searchdata"></tbody>   {{--   live search result show this table--}}


                      </tbody>


                    </table>

                  </div>
                </div>
              </div>
            </div>
          </div>


      </div>

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
