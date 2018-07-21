<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>A Market</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('css/backend_css/vendors/iconfonts/mdi/css/materialdesignicons.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/backend_css/vendors/iconfonts/puse-icons-feather/feather.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/backend_css/vendors/css/vendor.bundle.base.css') }}" />
  <link rel="stylesheet" href="{{ asset('css/backend_css/vendors/css/vendor.bundle.addons.css') }}" />
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('css/backend_css/style.css') }}"/>
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset('images/backend_images/favicon.png') }}" />
  <style>
  .auth.auth-bg-1 {
  background: url("{{ asset('images/backend_images/login_1.jpg') }}");
  background-size: cover; }

  h2{
    color: #fff;
  }
  </style>
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
      <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
             <h2 class="text-center mb-4">Login Admin</h2>
            <div class="auto-form-wrapper">
              <form method="post" action="{{ url('admin') }}"> {{ csrf_field() }}
                <div class="form-group">
                  <label class="label">Email</label>
                  <div class="input-group">
                    <input type="email" class="form-control" placeholder="Email" name="email">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label class="label">Password</label>
                  <div class="input-group">
                    <input type="password" class="form-control" placeholder="*********" name="password">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <button class="btn btn-primary submit-btn btn-block" type="submit" value="Login"> Login</button>
                </div>
                <div class="text-block text-center my-3">
                   @if(Session::has('flash_message_error')) 
                  <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong>{!! session('flash_message_error') !!}</strong>
                  </div>
                  @endif
                  @if(Session::has('flash_message_success')) 
                  <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button> 
                    <strong>{!! session('flash_message_success') !!}</strong>
                  </div>
                  @endif
                <!--  
                  <span class="text-small font-weight-semibold">Not a member ?</span>
                  <a href="register.html" class="text-black text-small">Create new account</a>
                  -->
                </div>
              </form>
            </div>
            
            <p class="footer-text text-center">copyright © 2018 Bootstrapdash. All rights reserved.</p>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="{{ asset('css/backend_css/vendors/js/vendor.bundle.base.js') }}"></script>
  <script src="{{ asset('css/backend_css/vendors/js/vendor.bundle.addons.js') }}"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="{{ asset('js/backend_js/off-canvas.js') }}"></script>
  <script src="{{ asset('js/backend_js/hoverable-collapse.js') }}"></script>
  <script src="{{ asset('js/backend_js/misc.js') }}"></script>
  <script src="{{ asset('js/backend_js/settings.js') }}"></script>
  <script src="{{ asset('js/backend_js/todolist.js') }}"></script>
  <!-- endinject -->
</body>

</html>