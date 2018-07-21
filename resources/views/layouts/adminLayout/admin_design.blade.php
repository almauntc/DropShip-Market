<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>A Market</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('css/backend_css/vendors/iconfonts/mdi/css/materialdesignicons.min.css') }}"/>
  <link rel="stylesheet" href="{{ asset('css/backend_css/vendors/css/vendor.bundle.base.css') }}"/>
  <link rel="stylesheet" href="{{ asset('css/backend_css/vendors/css/vendor.bundle.addons.css') }}"/>
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('css/backend_css/style.css') }}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset('images/backend_images/favicon.png') }}" />
  <style>
   .card-weather .card-body:first-child {
      background: url("{{ asset('images/backend_images/samples/weather.svg') }}") no-repeat center;
      background-size: cover; }
  </style>
</head>

<body>
  <div class="container-scroller">

    @include('layouts.adminLayout.admin_header')

    <div class="container-fluid page-body-wrapper">

    @include('layouts.adminLayout.admin_sidebar')

    @yield('content')
 
    @include('layouts.adminLayout.admin_footer')

      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="{{ asset('css/backend_css/vendors/js/vendor.bundle.base.js') }}"></script>
  <script src="{{ asset('css/backend_css/vendors/js/vendor.bundle.addons.js') }}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="{{ asset('js/backend_js/off-canvas.js') }}"></script>
  <script src="{{ asset('js/backend_js/misc.js') }}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{ asset('js/backend_js/dashboard.js') }}"></script>
  <!-- End custom js for this page-->
</body>

</html>