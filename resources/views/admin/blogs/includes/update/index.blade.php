@extends('layouts.admin')
@section('meta')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('style')
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{ asset('adminka/assets/vendor/bootstrap/css/bootstrap.min.css') }}">
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
    <script src="{{ asset('adminka/js/blog/update_blog.js')}}"></script>

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
                    <h2>Blog Post</h2>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.blogs.index') }}">Blog</a></li>
                        <li class="breadcrumb-item active">Blog Post</li>
                    </ul>
                    <a href="javascript:void(0);" class="btn btn-sm btn-primary" title="">Create New</a>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            @if (\session()->has('message'))
                <div class="alert_success">
                    <ul>
                        <li>{!! \session()->get('message') !!}</li>
                    </ul>
                </div>
            @endif
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="body">
                            <form method="POST" action="{{ route('admin.blogs.update', ['blog' => $blog->id ]) }}" class="" id="form_admin_blog_update" enctype="multipart/form-data" >
{{--                                <form method ="POST" action="{{ route('admin.blogs.update', ['blog' =>$blog->id]) }}" class="" id="form_admin_blog_update" >--}}
                                @csrf
                                @method("PATCH")
                            <div class="form-group">
                                <input name="title" type="text" value="{{ old('title') ?? $blog->title ?? null }}" class="form-control" placeholder="Enter Blog title" />
                            </div>
                            <div class="form-group">
                                <input type="text" name="intro" value="{{ old('intro') ?? $blog->intro ?? null }}" class="form-control" placeholder="Enter Blog Intro" />
                            </div>
{{--                            <div class="form-group">--}}
{{--                                <select class="form-control show-tick">--}}
{{--                                    <option>Select Category</option>--}}
{{--                                    <option>WebDesign</option>--}}
{{--                                    <option>Photography</option>--}}
{{--                                    <option>Technology</option>--}}
{{--                                    <option>Lifestyle</option>--}}
{{--                                    <option>Sports</option>--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                            <div class="summernote">--}}
{{--                                <h3 class="m-b-0">hi,</h3>--}}
{{--                                <h4 class="m-t-0">we are Summernote</h4>--}}
{{--                                <p></p>--}}
{{--                            </div>--}}
                            <div class="form-group">
                                <textarea name="text" class="form-control summernote" rows="10">{{ old('text') ?? $blog->text ?? null }}</textarea>
                                <div class="col-lg-6 col-md-12">
                                    <div class="card">
                                        <div class="header">
                                            <h2>Upload Main Image </h2>
{{--                                            <small>Taken from: https://github.com/JeremyFagis/dropify</small>--}}
                                        </div>
                                        <div class="body">
                                            <input type="file" name="image" class="dropify" id="main_image" data-default-file="{{ $blog->original_path_image() }}" >
                                            <input type="hidden" name="old_image" value="{{ $blog->original_path_image() }}" id="old_image" >
                                            <input type="hidden" name="blog_id" value="{{ $blog->id }}" id="blog_id" >
                                        </div>
                                    </div>
                                </div>
                            </div>
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

