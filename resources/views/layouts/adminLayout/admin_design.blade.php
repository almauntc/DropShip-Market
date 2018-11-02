<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Admin | E-DROPSHIP</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('css/backend_css/vendors/iconfonts/mdi/css/materialdesignicons.min.css') }}"/>
  <link rel="stylesheet" href="{{ asset('css/backend_css/vendors/css/vendor.bundle.base.css') }}"/>
  <link rel="stylesheet" href="{{ asset('css/backend_css/vendors/css/vendor.bundle.addons.css') }}"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css"/>
  <link href="{{ asset('css/backend_css/bootstrap.min.css') }}" rel="stylesheet"/>
  <link href="{{ asset('css/backend_css/helper.css') }}" rel="stylesheet"/>


  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('css/backend_css/style.css') }}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset('images/frontend_images/logo.png') }}" />
  <style>
   .card-weather .card-body:first-child {
      background: url("{{ asset('images/backend_images/samples/weather.svg') }}") no-repeat center;
      background-size: cover; }

    .styled-select.slate {
     background: url(http://i62.tinypic.com/2e3ybe1.jpg) no-repeat right center;
    height: 34px;
     width: 240px;
  }

  .styled-select.slate select {
   border: 1px solid #ccc;
   font-size: 16px;
   height: 34px;
   width: 268px;
}

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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
   <script src="{{ asset('css/backend_css/vendors/js/matrix.form_validation.js') }}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="{{ asset('js/backend_js/off-canvas.js') }}"></script>
  <script src="{{ asset('js/backend_js/dropzone.js') }}"></script>
  <script src="{{ asset('js/backend_js/misc.js') }}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{ asset('js/backend_js/dashboard.js') }}"></script>
  <!-- End custom js for this page-->
   <script src="{{ asset('js/backend_js/datatables.min.js') }}"></script>
    <script src="{{ asset('js/backend_js/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('js/backend_js/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('js/backend_js/js/lib/datatables/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js') }}"></script>
    <script src="{{ asset('js/backend_js/js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('js/backend_js/js/lib/datatables/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js') }}"></script>
    <script src="{{ asset('js/backend_js/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('js/backend_js/js/lib/datatables/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('js/backend_js/js/lib/datatables/datatables-init.js"></script>


  
</body>

</html>