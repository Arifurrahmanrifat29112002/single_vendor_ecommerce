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

    @if (Auth::id())
    <h3 class="text-center m-3">Comment</h3>
    {{-- comment section  --}}
    <div class="row mt-3 ">
      <form action="{{ route('product.comment') }}" method="post" class="m-auto col-md-6">
        @csrf
        <div class="form-group ">
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="comment"></textarea>
          </div>
          <button type="submit" class=" btn btn-primary">Send</button>
      </form>

    </div>
    @php
       $comment = App\Models\Comment::latest()->get();
       $Reply = App\Models\Reply::latest()->get();
    @endphp
     {{-- comment section  end --}}
     <strong class="mb-3">All comments :</strong>
     {{-- show comments section --}}
     @foreach ($comment as $comment_info)
        <div class="row">
            <div class="col-md">
                <span>{{ $comment_info->name }}</span>
                <p class="m-2">{{ $comment_info->comment }}</p>
                <a href="javascript::void(0);" onclick="reply(this)" data-Commentid="{{ $comment_info->id }}">reply</a>
            </div>
        </div>
        @endforeach

     {{-- reply section --}}

     <div class="row">
        <div class="col-md replyDiv" style="display: none" >
            <form action="{{ route('product.comment.reply') }}" method="post" class="col-md-4" >
                @csrf
                <div class="form-group ">
                    <input type="text" id="commentId" name="comment_id" hidden>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="reply"></textarea>
                  </div>
                  <button type="submit" class=" btn btn-primary">Reply</button>
                  <a href="javascript::void(0);" onclick="reply_close(this)">close</a>
              </form>
        </div>
     </div>
     @foreach ($Reply as $reply_info)
        <div class="row">
            <div class="col-md ml-3" >
                <span>{{ $reply_info->name }}</span>
                <p class="m-2">{{ $reply_info->reply }}</p>
                <a href="javascript::void(0);" onclick="reply(this)">reply</a>
            </div>
        </div>
     @endforeach


    @endif


 </div>
