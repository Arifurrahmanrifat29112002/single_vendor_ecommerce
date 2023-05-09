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
                   <h3 class="text-center">Send Mail to {{ $order->email }}</h3>

                    <div class="row justify-content-center">
                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card ">
                              <div class="card-body">


                                <form class="forms-sample" action="{{ route('send_user_mail',['id'=>$order->id]) }}">
                                    @csrf
                                  <div class="form-group row">
                                    <label for="exampleInputUsername2" class="col-sm-3 col-form-label">Email Greeting</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control text-light" id="exampleInputUsername2" name="greeting">
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">FirstLine</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control text-light" id="exampleInputEmail2" name="firstline">
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="exampleInputMobile" class="col-sm-3 col-form-label">Body</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control text-light" id="exampleInputMobile" name="body">
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="exampleInputPassword2" class="col-sm-3 col-form-label">Email Button Name</label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control text-light" id="exampleInputPassword2" name="button">
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Email Url</label>
                                    <div class="col-sm-9">
                                      <input type="url" class="form-control text-light" id="exampleInputConfirmPassword2" name="url">
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="exampleInputConfirmlastline" class="col-sm-3 col-form-label">LastLine </label>
                                    <div class="col-sm-9">
                                      <input type="text" class="form-control text-light" id="exampleInputConfirmlastline" name="lastline">
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
