<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.frotend_partial.frontend-head')
</head>

<body>
    <!-- Topbar Start -->
    @include('layouts.frotend_partial.frontend-topbar')
    <!-- Topbar End -->


    <!-- Navbar Start -->
    @include('layouts.frotend_partial.frontend-navbar')
    <!-- Navbar End -->

    @yield('content')

    <!-- Footer Start -->
    @include('layouts.frotend_partial.frontend-footer')
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    @include('layouts.frotend_partial.frontend-script')
</body>

</html>
