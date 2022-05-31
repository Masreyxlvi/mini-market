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

  {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="{{ asset('assets') }}/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  {{-- <link rel="stylesheet" href="{{ asset('assets') }}/vendors/ti-icons/css/themify-icons.css"> --}}
  <link rel="stylesheet" type="text/css" href="{{ asset('assets') }}/build/js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('assets') }}/bulid/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset('assets') }}/bulid/images/favicon.png" />
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
   @include('dashboard.layouts.navbar')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
   
     @include('dashboard.layouts.sidebar')
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          @yield('content')
        <!-- content-wrapper ends -->
        </div>
        <!-- partial:partials/_footer.html -->
        <!-- partial -->
        @include('dashboard.layouts.footer')
      </div>
      <!-- main-panel ends -->
    </div>   
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="{{ asset('assets') }}/vendors/js/vendor.bundle.base.js"></script>
  {{-- <script src="{{ asset('assets') }}/vendors/datatables.net/jquery.dataTables.js"></script> --}}
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="{{ asset('assets') }}/vendors/chart.js/Chart.min.js"></script>
  <script src="{{ asset('assets') }}/vendors/datatables.net/jquery.dataTables.js"></script>
  <script src="{{ asset('assets') }}/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
  {{-- <script src="{{ asset('assets') }}/vendors/sweetalert/sweetalert.js"></script> --}}
  <script src="{{ asset('assets') }}/build/js/dataTables.select.min.js"></script>
  <script src="{{ asset('assets') }}/build/js/tablesorter.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{ asset('assets') }}/build/js/off-canvas.js"></script>
  <script src="{{ asset('assets') }}/build/js/hoverable-collapse.js"></script>
  <script src="{{ asset('assets') }}/build/js/template.js"></script>
  <script src="{{ asset('assets') }}/build/js/data-table.js"></script>
  {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> --}}
  {{-- <script src="{{ asset('assets') }}/build/js/settings.js"></script> --}}
  {{-- <script src="{{ asset('assets') }}/build/js/todolist.js"></script> --}}
  {{-- <script src="{{ asset('assets') }}/build/js/select2.js"></script> --}}
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{ asset('assets') }}/build/js/dashboard.js"></script>
  <script src="{{ asset('assets') }}/build/js/Chart.roundedBarCharts.js"></script>
  <!-- End custom js for this page-->
<script>
    $(function(){
      $('#succes-alert').fadeTo(2000, 500).slideUp(500, function(){
        $('#succes->alert').slideUp(500)
      });
    })
  </script>

  @stack('script')
</body>

</html>

