@props(['title' => 'admin', 'content' => 'No content provided'])
{{-- this is the main layout --}}
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ $title }}</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('admin/assets2/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets2/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets2/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets2/vendors/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets2/vendors/mdi/css/materialdesignicons.min.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- <link rel="stylesheet" href="admin/assets2/vendors/datatables.net-bs4/dataTables.bootstrap4.css"> -->
    <link rel="stylesheet" href="{{ asset('admin/assets2/vendors/datatables.net-bs5/dataTables.bootstrap5.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets2/js/select.dataTables.min.css') }}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('admin/assets2/css/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('admin/assets2/images/favicon.png') }}" />
  </head>
  <body>
    {{-- main body content --}}
    {{ $content }}
    <!-- plugins:js -->
    <script src="{{ asset('admin/assets2/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('admin/assets2/vendors/chart.js/chart.umd.js') }}"></script>
    {{-- <script src="{{ asset('admin/assets2/vendors/datatables.net/jquery.dataTables.js') }}"></script> --}}
    <!-- <script src="admin/assets2/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script> -->
    {{-- <script src="{{ asset('admin/assets2/vendors/datatables.net-bs5/dataTables.bootstrap5.js') }}"></script> --}}
    <script src="{{ asset('admin/assets2/js/dataTables.select.min.js') }}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('admin/assets2/js/off-canvas.js') }}"></script>
    <script src="{{ asset('admin/assets2/js/template.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{ asset('admin/assets2/js/jquery.cookie.js') }}" type="text/javascript"></script>
    <script src="{{ asset('admin/assets2/js/dashboard.js') }}"></script>
    <!-- <script src="admin/assets2/js/Chart.roundedBarCharts.js"></script> -->
    <!-- End custom js for this page-->
  </body>
</html>