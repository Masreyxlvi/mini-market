<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Skydash Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('assets') }}/vendors/feather/feather.css">
  <link rel="stylesheet" href="{{ asset('assets') }}/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="{{ asset('assets') }}/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('assets') }}/bulid/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset('assets') }}/bulid/images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            @if(session()->has('error'))
            <div class="alert alert-danger" role="alert">
              {{session('error')  }}
            </div>
            @endif
            <div class="auth-form-light text-left py-5 px-4 px-sm-5 ">
              <div class="brand-logo">
                <img src="{{ asset('assets') }}/bulid/images/logo.svg" alt="logo">
              </div>
              <div class="text-center">
                <h4>Hello! let's get started</h4>
                <h6 class="font-weight-light">Sign in to continue.</h6>
              </div>
              <form class="pt-3" action="/" method="post">
                @csrf
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-primary border-0" id="basic-addon1"><i class="ti-email"></i></span>
                  </div>
                  <input type="email" name="email" class="form-control" placeholder="Email" aria-label="email" aria-describedby="basic-addon1" autofocus>
                </div>
                @error('email')
                <div class="invalid-feeback">
                  {{ $message }}
                </div>
                @enderror
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-primary border-0" id="basic-addon1"><i class="ti-lock"></i></span>
                  </div>
                  <input type="password" name="password" class="form-control" placeholder="Password" aria-label="password" aria-describedby="basic-addon1">
                </div>
                <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" >SIGN IN</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="{{ asset('assets') }}/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{ asset('assets') }}/build/js/off-canvas.js"></script>
  <script src="{{ asset('assets') }}/build/js/hoverable-collapse.js"></script>
  <script src="{{ asset('assets') }}/build/js/template.js"></script>
  <script src="{{ asset('assets') }}/build/js/settings.js"></script>
  <script src="{{ asset('assets') }}/build/js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>
