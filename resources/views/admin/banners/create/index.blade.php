@extends('layouts.admin')
@section('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('style')
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{ asset('adminka/assets/vendor/font-awesome/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('adminka/assets/vendor/summernote/dist/summernote.css') }}"/>
    <link rel="stylesheet" href="{{ asset('adminka/assets/vendor/dropify/css/dropify.min.css') }}">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ asset('adminka/assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('adminka/assets/css/color_skins.css') }}">

@endsection
@section('script')
    <script src="{{ asset('adminka/assets/bundles/libscripts.bundle.js')}}"></script>
    <script src="{{ asset('adminka/assets/bundles/vendorscripts.bundle.js')}}"></script>
    <script src="{{ asset('adminka/assets/vendor/dropify/js/dropify.min.js')}}"></script>
    <script src="{{ asset('adminka/assets/bundles/mainscripts.bundle.js')}}"></script>
    <script src="{{ asset('adminka/assets/vendor/summernote/dist/summernote.js')}}"></script>
    <script src="{{ asset('adminka/assets/js/pages/forms/dropify.js')}}"></script>
    <script src="{{ asset('adminka/js/update_blog.js')}}"></script>

        <script>
            jQuery(document).ready(function() {

                $('.summernote').summernote({
                    height: 350, // set editor height
                    minHeight: null, // set minimum height of editor
                    maxHeight: null, // set maximum height of editor
                    focus: false, // set focus to editable area after initializing summernote
                    popover: { image: [], link: [], air: [] }
                });

                $('.inline-editor').summernote({
                    airMode: true
                });

            });

            window.edit = function() {
                $(".click2edit").summernote()
            },

                window.save = function() {
                    $(".click2edit").summernote('destroy');
                }
        </script>

@endsection
@section('content')
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img src="{{ asset('adminka/assets/images/icon-light.svg')}}" width="48" height="48" alt="HexaBit"></div>
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
                    <h2>Banner</h2>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="blog-dashboard.html">Blog</a></li>
                        <li class="breadcrumb-item active">Blog Post</li>
                    </ul>
                    <a href="javascript:void(0);" class="btn btn-sm btn-primary" title="">Create New</a>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        @if (\Session::has('message'))
                            <div class="alert_success">
                                <ul>
                                    <li>{!! \Session::get('message') !!}</li>
                                </ul>
                            </div>
                        @endif
                        <div class="body">
                            <form method="POST" action="{{ route('admin.banners.store') }}" class="" id="form_admin_blog_create" enctype="multipart/form-data" >
{{--                                <form method="POST" action="{{ route('admin.blogs.store') }}" class="" id="form_admin_blog_create"  >--}}
                                @csrf
                                    <input type="file" name="img" class="dropify" id="main_image"  >

                                <div class="form-group">
                                    <input type="text" name="title" class="form-control" value="{{ request()->name }}" placeholder="{{ request()->name }}" />
                                </div>
                                <input type="hidden" name="model" value="{{ request()->model }}">
                                <input type="hidden" name="model_id" value="{{ request()->model_id }}">
                                    <button type="submit" class="btn btn-block btn-primary   m-t-20">Post</button>
                                </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
