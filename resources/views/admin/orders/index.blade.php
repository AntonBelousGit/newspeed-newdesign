@extends('layouts.admin')
{{--@extends('layouts.app')--}}
@section('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('style')

    <link rel="icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{ asset('adminka/assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminka/assets/vendor/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminka/assets/vendor/sweetalert/sweetalert.css') }}"/>
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ asset('adminka/assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('adminka/assets/css/color_skins.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
    <style>
        table.dataTable thead .sorting, table.dataTable thead .sorting_asc, table.dataTable thead .sorting_desc, table.dataTable thead .sorting_asc_disabled, table.dataTable thead .sorting_desc_disabled {
            cursor: pointer;
            background-repeat: no-repeat;
            background-position: center left;
        }
    </style>
@endsection
@section('script')
    <script src="{{ asset('adminka/assets/bundles/libscripts.bundle.js')}}"></script>
    <script src="{{ asset('adminka/assets/bundles/vendorscripts.bundle.js')}}"></script>
    <script src="{{ asset('adminka/assets/vendor/sweetalert/sweetalert.min.js')}}"></script><!-- SweetAlert Plugin Js -->
    <script src="{{ asset('adminka/assets/bundles/mainscripts.bundle.js')}}"></script>
    <script src="{{ asset('adminka/assets/js/pages/ui/dialogs.js')}}"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
    <script src="{{ asset('adminka/js/user/users.js')}}"></script>
@endsection
@section('content')
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="m-t-30"><img src="{{asset('adminka/assets/images/icon-light.svg')}}" width="48" height="48" alt="HexaBit"></div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <div id="wrapper">
        <div id="main-content">
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-md-6 col-sm-12">
                        <h2>Advertisers List</h2>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="icon-home"></i></a></li>
                            <li class="breadcrumb-item active">Contact</li>
                        </ul>
                        {{--                    <a href="app-contact.html" class="btn btn-sm btn-success" title=""><i class="fa fa-list"></i></a>--}}
                        {{--                    <a href="app-contact-grid.html" class="btn btn-sm btn-outline-success" title=""><i class="fa fa-th-large"></i></a>--}}
                        {{--                    <a href="javascript:void(0);" class="btn btn-sm btn-primary" title="" data-toggle="modal" data-target="#addcontact">Create Contact</a>--}}
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row clearfix">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="body">
                                <div class="table-responsive check-all-parent">
                                    <table class="table table-custom table-hover m-b-0 c_list" id="users_table">
                                        <thead>
                                        <tr>
                                            <th>
                                                <label class="fancy-checkbox">
                                                    <input class="check-all" type="checkbox" name="checkbox">
                                                    <span></span>
                                                </label>
                                            </th>
                                            <th>Number</th>
                                            <th>User</th>
                                            <th>Created at</th>
                                            <th>Updated at</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @each('admin.orders.includes.index.item', $orders, 'order')
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

