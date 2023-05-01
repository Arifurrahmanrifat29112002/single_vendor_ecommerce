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
         {{-- {{ $cards }} --}}
         <div class="card m-3">
            <div class="card-body">
                Address :{{ Auth::user()->address }},

                phone Number :{{ Auth::user()->phone }}</p>
            </div>
          </div>
      <div class="row">
        <table class="table">
            <thead class="thead-light">
              <tr>
                <th scope="col">Product</th>
                <th scope="col">Quentaty</th>
                <th scope="col">Price</th>
                <th scope="col">Image</th>
                <th scope="col">Acction</th>
              </tr>
            </thead>
            <tbody>
                @php
                    $total_price = 0 ;
                @endphp
             @foreach ($cards as $card_info)
                    <tr>
                        <td>{{ $card_info->product_title }}</td>
                        <td>{{ $card_info->quentity }}</td>
                        <td>{{ $card_info->price }}</td>
                        <td>
                            <img class="card-img-top" src="{{ asset('upload/product_image') }}/{{ $card_info->image}}" alt="Card image cap" height="70px" style="width:40%;">
                        </td>
                        <td>
                            <form action="{{ route('cardremove',['id'=> $card_info->id]) }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Remove</button></td>
                            </form>
                    </tr>
                    @php
                        $total_price =$total_price + $card_info->price;
                    @endphp
             @endforeach
             <tr>
                <td></td>
                <td></td>
                <td>
                    total price = {{ $total_price }}
                </td>
                <td></td>
                <td></td>

             </tr>

            </tbody>
          </table>
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
