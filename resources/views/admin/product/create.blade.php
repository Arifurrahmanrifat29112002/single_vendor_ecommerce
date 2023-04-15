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
                              <div class="card-body">
                                <h4 class="card-title">Product Create</h4>

                                <form class="forms-sample">
                                  <div class="form-group row">
                                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Product Title</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" id="exampleInputUsername2" placeholder="Product Title" name="product_title">
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" id="exampleInputEmail2" placeholder="Email">
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="exampleInputMobile" class="col-sm-3 col-form-label">Mobile</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control" id="exampleInputMobile" placeholder="Mobile number">
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Password</label>
                                    <div class="col-sm-9">
                                      <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Password">
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Re Password</label>
                                    <div class="col-sm-9">
                                      <input type="password" class="form-control" id="exampleInputConfirmPassword2" placeholder="Password">
                                    </div>
                                  </div>
                                  <div class="form-check form-check-flat form-check-primary">
                                    <label class="form-check-label">
                                      <input type="checkbox" class="form-check-input"> Remember me <i class="input-helper"></i></label>
                                  </div>
                                  <button type="submit" class="btn btn-primary me-2">Submit</button>
                                  <button class="btn btn-dark">Cancel</button>
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
