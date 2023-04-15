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

                    @if (Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session::get('success') }}
                            <button type="button" class="close float-right" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                        </div>
                    @endif

                    <div class="row justify-content-center">
                        <h3 class="text-center">Category Edit</h3>
                        <div class="col-md-4 border border-primary m-2">
                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                        <ul>
                                            <li>
                                                <p class="text-light">{{ $error }}</p>
                                            </li>
                                        </ul>
                                @endforeach
                            @endif
                            <form action="{{ route('category.update',['id'=>$category->id]) }}" method="post">
                                @csrf
                                <div class="form-group pt-3">
                                    <div class="input-group ">
                                      <input type="text" class="form-control"  placeholder="Enter category Name" name="category_name" value="{{ $category->category_name }}">
                                        <button class="btn btn-primary" type="submit">Update</button>
                                    </div>
                                  </div>
                            </form>
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
