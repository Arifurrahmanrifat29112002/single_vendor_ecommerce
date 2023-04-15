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

            @include('admin.main')
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    @include('admin.script')
</body>

</html>
