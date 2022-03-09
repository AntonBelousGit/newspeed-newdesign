<!doctype html>
<html lang="en">
<head>
<title>Adminka Speedshop</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta name="description" content="">
<meta name="csrf-token" content="{{ csrf_token() }}">

<link rel="icon" href="favicon.ico" type="image/x-icon">
<!-- VENDOR CSS -->
<link rel="stylesheet" href="{{asset('adminka/assets/vendor/bootstrap/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('adminka/assets/vendor/font-awesome/css/font-awesome.min.css')}}">

{{--<link rel="stylesheet" href="{{asset('adminka/assets/vendor/charts-c3/plugin.css')}}"/>--}}
{{--<link rel="stylesheet" href="{{asset('adminka/assets/vendor/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')}}">--}}
{{--<link rel="stylesheet" href="{{asset('adminka/assets/vendor/chartist/css/chartist.min.css')}}">--}}
{{--<link rel="stylesheet" href="{{asset('adminka/assets/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.css')}}">--}}
{{--<link rel="stylesheet" href="{{asset('adminka/assets/vendor/toastr/toastr.min.css')}}">--}}
{{--<!-- MAIN CSS -->--}}
  <link rel="stylesheet" href="{{ asset('adminka/assets/css/main.css')}}">
<link rel="stylesheet" href="{{asset('adminka/assets/css/color_skins.css')}}">
{{--<!--для таблиц -->--}}
{{--<link rel="stylesheet" href="{{asset('adminka/assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css')}}">--}}
  @yield('style')
  <style>
    .sidebar-nav .metismenu ul a.has-arrow, .sidebar-nav .metismenu ul a.custom_content{
      content: '';
      left: 0;
      padding-left: 10%;
    }
    .sidebar-nav .metismenu ul a.has-arrow::before, .sidebar-nav .metismenu ul a.custom_content::before {
      content: '';
      position: absolute;
      left: 0;
      padding-left: 0;
    }
  </style>
</head>
<body class="theme-orange">


@include('layouts.shapka')
  @yield('content')
  <!-- Javascript -->
<script src="{{asset('adminka/js/jquery.js')}}"></script>
<script src="{{asset('adminka/assets/bundles/libscripts.bundle.js')}}"></script>
<script src="{{asset('adminka/assets/bundles/vendorscripts.bundle.js')}}"></script>
<script src="{{asset('adminka/assets/bundles/mainscripts.bundle.js')}}"></script>
{{--<script src="{{asset('adminka/assets/bundles/c3.bundle.js')}}"></script>--}}
{{--<script src="{{asset('adminka/assets/bundles/chartist.bundle.js')}}"></script>--}}
{{--<script src="{{asset('adminka/assets/vendor/toastr/toastr.js')}}"></script>--}}
{{--<script src="{{asset('adminka/assets/vendor/parsleyjs/js/parsley.min.js')}}"></script>--}}
{{--<script src="{{asset('adminka/assets/bundles/mainscripts.bundle.js')}}"></script>--}}
{{--<script src="{{asset('adminka/assets/js/index.js')}}"></script>--}}

{{--<script src="{{asset('adminka/assets/bundles/datatablescripts.bundle.js')}}"></script>--}}
{{--<script src="{{asset('adminka/assets/js/pages/tables/jquery-datatable.js')}}"></script>--}}
@yield('modal')
@yield('script')
@yield('scripts')

</body>
</html>
