<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.html')
</head>

<body>
    <div class="container-scroller">

        @include('admin.left_nav')

        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_navbar.html -->

            @include('admin.navbar')

            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row ">
                        <div class="col-12 grid-margin">
                          <div class="card">
                            <div class="card-body">
                              <h4 class="card-title">Order Status</h4>
                              <form class="form-sample" action="{{ route('order.filter') }}" method="POST">
                                @csrf
                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group row">
                                      <label class="col-sm-3 col-form-label">Form Date</label>
                                      <div class="col-sm-9">
                                        <input type="date" class="form-control search" name="form_date">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group row">
                                      <label class="col-sm-3 col-form-label">To Date</label>
                                      <div class="col-sm-9">
                                        <input type="date" class="form-control search" name="to_date">
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">

                                  <div class="col-md-6">
                                    <div class="form-group row">
                                      <label class="col-sm-3 col-form-label">Payment Status</label>
                                      <div class="col-sm-9">
                                        <select class="form-control text-light" name="payment_status">
                                            <option value="">select Payment Status</option>
                                            <option value="cash on delivery">cash on delivery</option>
                                            <option value="Paid">Paid</option>
                                        </select>


                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group row">
                                      <label class="col-sm-3 col-form-label">Delivery Status</label>
                                      <div class="col-sm-9">
                                        <select class="form-control text-light" name="delivery_status">
                                            <option value="">select Delivery Status</option>
                                            <option value="you canceled this order"> cancele order</option>
                                            <option value="processing">processing</option>
                                            <option value="deliverd">deliverd</option>
                                        </select>


                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <button type="reset" class="btn btn-danger mb-3">Reset</button>
                                <button type="submit" class="btn btn-primary mb-3">Filter</button>
                              </form>
                              <div class="table-responsive">
                                <table class="table">
                                  <thead>
                                    <tr>

                                      <th> Name </th>
                                      <th> Email </th>
                                      <th> Phone </th>
                                      <th> Address </th>
                                      <th> Product Title </th>
                                      <th> Quentity </th>
                                      <th> Price </th>
                                      <th> Image</th>
                                      <th> Payment Status </th>
                                      <th> Delivery Status </th>
                                      <th> Deliverd </th>
                                      <th> Date </th>
                                      <th> Print </th>
                                      <th> Send Mail </th>
                                    </tr>
                                  </thead>
                                  <tbody class="alldata">

                                 @foreach ($order as $order_info)
                                 <tr>
                                    <td><span class="ps-2">{{ $order_info->name }}</span></td>
                                    <td> {{ $order_info->email }} </td>
                                    <td> {{ $order_info->phone }} </td>
                                    <td> {{ $order_info->address }} </td>
                                    <td>{{ $order_info->product_title }} </td>
                                    <td> {{ $order_info->quentity }} </td>
                                    <td> {{ $order_info->price }} </td>
                                    <td> <img src="{{ asset('upload/product_image') }}/{{ $order_info->image }}" alt="image"> </td>
                                    <td>
                                      <div class="badge badge-outline-success">{{ $order_info->payment_status }}</div>
                                    </td>
                                    <td>
                                      <div class="badge badge-outline-success">{{ $order_info->delivery_status }}</div>
                                    </td>
                                    <td>
                                        @if ($order_info->delivery_status === 'processing')
                                          <a href="{{ route('order.deliverd',['id'=>$order_info->id]) }}" class="btn btn-primary">Deliverd</a>
                                        @else
                                        <span  class="btn btn-danger">Deliverd</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="badge badge-outline-success">{{ $order_info->created_at }}</div>
                                    </td>
                                    <td>
                                        <a href="{{ route('download.pdf',['id'=>$order_info->id]) }}" class="btn btn-warning">PDF</a>
                                    </td>

                                    <td>
                                        <a href="{{ route('user.sendmail',['id'=>$order_info->id]) }}" class="btn btn-primary">Send Mail</a>
                                    </td>

                                  </tr>
                                 @endforeach
                                 <tbody id="Content" class="searchdata"></tbody>   {{--   live search result show this table--}}


                                  </tbody>


                                </table>
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-center mt-3">
                                        {{ $order->links('pagination::bootstrap-5') }}
                                    </ul>
                                  </nav>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>




                </div>
                {{-- end form --}}
                {{-- start table --}}


            </div>
        </div>
        <!-- page-body-wrapper ends -->
    </div>

    @include('admin.script')

    {{-- live search js code --}}

</body>

</html>
