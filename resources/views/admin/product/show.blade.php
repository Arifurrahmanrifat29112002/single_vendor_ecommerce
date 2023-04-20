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

                    <div class="row justify-content-center">
                        <div class="col-md-8 grid-margin stretch-card">
                            <div class="card">
                                @if (session()->has('success'))
                                        <div class="alert alert-success">
                                            {{ session()->get('success') }}
                                        </div>
                                @endif
                              <div class="card-body">
                                <h4 class="card-title">Product Create</h4>
                                @if($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <ul>
                                            <li>
                                                <p class="text-danger">{{ $error }}</p>
                                            </li>
                                        </ul>
                                    @endforeach
                                @endif
                                <form class="forms-sample" action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                  <div class="form-group row">
                                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Product Title</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" id="exampleInputUsername2" placeholder="Product Title" name="product_title">
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Product Category</label>
                                    <div class="col-sm-9">
                                      <select class="form-control" name="product_category"  id="">
                                        <option class="text-light" value="">select a category</option>
                                        @foreach ($category as $category)
                                        <option class="text-light" value="{{ $category->category_name }}" >{{ $category->category_name }}</option>
                                        @endforeach
                                      </select>
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="exampleInputMobile" class="col-sm-3 col-form-label">Product Price</label>
                                    <div class="col-sm-9">
                                      <input type="number" class="form-control" min="0" id="exampleInputMobile" placeholder="Product Price" name="product_price">
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Discount Price</label>
                                    <div class="col-sm-9">
                                      <input type="number" class="form-control" min="0" id="exampleInputPassword2" placeholder="Discount Price" name="product_description">
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Product Quantity</label>
                                    <div class="col-sm-9">
                                      <input type="number" class="form-control" min="0" id="exampleInputConfirmPassword2" placeholder="Product Quantity" name="product_quantity">
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="exampleInputConfirm" class="col-sm-3 col-form-label">Product Img</label>
                                    <div class="col-sm-9">
                                      <input type="file" class="form-control" min="0" id="exampleInputConfirm" name="product_image">
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="exampleFormControlTextarea1" class="col-sm-3 col-form-label">Product Description</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control text-light" id="exampleFormControlTextarea1" name="product_description"></textarea>
                                    </div>
                                  </div>

                                  <button type="submit" class="btn btn-primary me-2">Submit</button>
                                </form>
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
