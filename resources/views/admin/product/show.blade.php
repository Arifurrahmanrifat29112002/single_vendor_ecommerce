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
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                @if (session()->has('success'))
                                        <div class="alert alert-success">
                                            {{ session()->get('success') }}
                                        </div>
                                @endif
                              <div class="card-body">

                                <div class="d-flex justify-content-between align-items-center">
                                    <h4 class="card-title">Products</h4>

                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#largeModal">
                                       Trash Bin
                                     </button>
                                </div>
                                <div class="modal fade" id="largeModal" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content  bg-dark">
                                        <div class="modal-header ">
                                        <h5 class="modal-title" id="exampleModalLabel3">Trash Bin</h5>
                                        <button type="button"class="btn-close"data-bs-dismiss="modal"aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body m-1">
                                            <div class="table-responsive text-nowrap">
                                                <table class="table table-dark">

                                                <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th> Category </th>
                                                        <th> Quantity </th>
                                                        <th> Price </th>

                                                        <th> Action </th>
                                                      </tr>
                                                </thead>

                                                    @foreach ($product_trashed as $treshed_info)
                                                    <tr>
                                                        <td>{{ $treshed_info->product_title }}</td>
                                                        <td>{{ $treshed_info->product_category }}</td>
                                                        <td>{{ $treshed_info->product_quantity }}</td>
                                                        <td>{{ $treshed_info->product_price}}</td>

                                                        <td>
                                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                                <a href="{{ route('product.restore',['id'=>$treshed_info->id]) }}" class="btn btn-outline-secondary">
                                                                <i class="mdi mdi-reload"></i>
                                                                </a>
                                                                <a href="{{ route('product.delete',['id'=>$treshed_info->id]) }}" class="btn btn-outline-secondary">
                                                                <i class="mdi mdi-delete-forever"></i>
                                                                </a>
                                                            </div>
                                                        </td>
                                                      </tr>
                                                    @endforeach
                                                </table>
                                            </div>

                                        </div>

                                    </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                  <table class="table table-bordered">
                                    <thead>
                                      <tr>
                                        <th>Name</th>
                                        <th> Category </th>
                                        <th> Quantity </th>
                                        <th> Price </th>
                                        <th> Image </th>
                                        <th> Action </th>
                                      </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($product as $product_info)
                                        <tr>
                                            <td>{{ $product_info->product_title }}</td>
                                            <td>{{ $product_info->product_category }}</td>
                                            <td>{{ $product_info->product_quantity }}</td>
                                            <td>{{ $product_info->product_price}}</td>
                                            <td class="">
                                                <img src="{{ asset('upload/product_image') }}/{{ $product_info->product_image}}" alt="" style="width: 120px;height:120px">
                                              </td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a href="{{ route('product.edit',['id'=>$product_info->id]) }}" class="btn btn-outline-secondary">
                                                      <i class="mdi mdi-border-color"></i>
                                                    </a>
                                                    <a href="{{ route('product.destroy',['id'=>$product_info->id]) }}" class="btn btn-outline-secondary">
                                                      <i class="mdi mdi-delete"></i>
                                                    </a>
                                                  </div>
                                            </td>

                                        </tr>
                                        @endforeach


                                    </tbody>
                                  </table>
                                  <div class="d-flex justify-content-center mt-3">

                                    {{ $product->links('pagination::bootstrap-5') }}
                                </div>
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
</body>

</html>
