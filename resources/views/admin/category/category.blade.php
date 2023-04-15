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
                        <h3 class="text-center">Category</h3>
                        <div class="col-md-4 border border-primary m-2">
                            @if (Session::has('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session::get('success') }}
                                <button type="button" class="close float-right" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                            </div>
                        @endif
                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                        <ul>
                                            <li>
                                                <p class="text-light">{{ $error }}</p>
                                            </li>
                                        </ul>
                                @endforeach
                            @endif
                            <form action="{{ route('category.store') }}" method="post">
                                @csrf
                                <div class="form-group pt-3">
                                    <div class="input-group ">
                                      <input type="text" class="form-control"  placeholder="Enter category Name" name="category_name">
                                        <button class="btn btn-primary" type="submit">Submit</button>
                                    </div>
                                  </div>
                            </form>
                        </div>


                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-6 ">
                            <div class="card">
                                <div class="card-body">
                                  <h4 class="card-title">Categories</h4>
                                  <div class="table-responsive">
                                    <table class="table">
                                      <thead>
                                        <tr>
                                          <th> # </th>
                                          <th> Category Name </th>
                                          <th>Action</th>

                                        </tr>
                                      </thead>
                                      <tbody>
                                        @forelse ($categories as $category)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td> {{ $category->category_name }} </td>
                                            <td>
                                              <div class="btn-group" role="group" aria-label="Basic example">
                                                  <a href="{{ route('category.edit',['id'=>$category->id]) }}" class="btn btn-primary" title="edit">
                                                    <i class="mdi mdi-border-color"></i>
                                                  </a>
                                                  <a href="{{ route('category.destroy',['id'=>$category->id]) }}" onclick="return confirm('are sure')" class="btn btn-primary">
                                                    <i class="mdi mdi-delete"></i>
                                                  </a>
                                                </div>
                                            </td>
                                          </tr>
                                        @empty

                                        @endforelse

                                      </tbody>
                                    </table>
                                    <div class="d-flex justify-content-center mt-3">

                                        {{ $categories->links('pagination::bootstrap-5') }}
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
