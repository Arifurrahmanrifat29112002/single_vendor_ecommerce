<div class="container">
    <div class="heading_container heading_center">
       <h2>
          Our <span>products</span>
       </h2>
    </div>
    
    <div class="row">
        @foreach ($product as $product_info)
        <div class="col-sm-6 col-md-4 col-lg-4">
            <div class="box">
               <div class="option_container">
                  <div class="options">
                     <a href="{{ route('product.details',['id'=>$product_info->id]) }}" class="option1">
                        Details
                     </a>

                     <form action="{{ route('addtocard',['id'=>$product_info->id]) }}" method="post" class="justify-content-center">
                        @csrf
                        <input type="number" min="1" name="quantity" style="width: 40%">
                        <button type="submit" class="btn btn-primary " >Add to card</button>

                     </form>
                  </div>
               </div>
               <div class="img-box">
                  <img src="{{ asset('upload/product_image') }}/{{ $product_info->product_image}}" alt="">
               </div>
               <div class="detail-box">
                  <h5>
                     {{ $product_info->product_title }}
                  </h5>

                  @if ($product_info->product_price != null)
                  <h6>
                    price {{ $product_info->discound_price }} tk
                   </h6>

                   <h6  style="text-decoration:line-through">
                    price {{ $product_info->product_price }} tk
                   </h6>
                  @else
                  <h6 >
                    price {{ $product_info->product_price }} tk
                   </h6>
                  @endif

               </div>
            </div>
         </div>
        @endforeach


    </div>
    <div class="btn-box">
       <a href="">
       View All products
       </a>
    </div>
 </div>
