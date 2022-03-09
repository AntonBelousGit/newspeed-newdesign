{{--@extends('admin.layouts.default')--}}
@extends('layouts.admin')
@section('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="HexaBit Bootstrap 4x Admin Template">
    <meta name="author" content="WrapTheme, www.thememakker.com">
@endsection
@section('style')
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{ asset('adminka/assets/vendor/light-gallery/css/lightgallery.css')}}">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ asset('adminka/assets/vendor/dropify/css/dropify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminka/assets/vendor/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}">


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



        .dropify-wrapper{
            height: 150px;
        }
        .card{
            padding: 0;
            margin: 1%;
        }
        .card-body{
            padding: 0;
        }
        .blue-background-class {
            background-color: #c4e1ff;
        }
        .table-dragger-handle {
            position: relative;
            display: inline-block;
            font-style: normal;
            font-weight: 400;
            font-size: larger;
            -webkit-transform: translate(0,0);
            -ms-transform: translate(0,0);
            -o-transform: translate(0,0);
            transform: translate(0,0);
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            speak: none;
            text-rendering: auto;
            margin-left: .3em;
            font-family: "Web Icons";
        }

        .table-dragger-handle:before {
            content: "\f0b2";
            font-family: 'FontAwesome';
        }
        .card-header{
            display: flex;
            justify-content: space-between;
        }
        .close_image_block{
            margin: -3% -3% 0 0;
        }
        .close_image_block i{
            color: grey;
            font-size: larger;
        }
        .chart-img{
            max-width: 100px;
        }
        .progress{
            margin-bottom: 0;
        }
    </style>
@endsection
@section('script')

<script src="{{ asset('adminka/assets/vendor/light-gallery/js/lightgallery-all.min.js')}}"></script><!-- Light Gallery Plugin Js -->

<script src="{{ asset('adminka/assets/js/pages/medias/image-gallery.js')}}"></script>

<script src="{{ asset('adminka/assets/vendor/dropify/js/dropify.min.js')}}"></script>
<script src="{{ asset('adminka/assets/js/pages/forms/dropify.js')}}"></script>

<script src="http://sortablejs.github.io/Sortable/Sortable.js"></script>
<script src="{{ asset('adminka/js/galleries/sliders_gallery.js')}}"></script>
    <script>
        //progress bars
        $('.progress .progress-bar').progressbar({
            display_text: 'none'
        });
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
                    <h2>Main Gallery</h2>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item">Pages</li>
                        <li class="breadcrumb-item active">Gallery</li>
                    </ul>
                    <a href="javascript:void(0);" class="btn btn-sm btn-primary" title="">Create New</a>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">


                    <div class="card">
                     <form method="POST" action="{{ route('admin.galleries.sliders_update', ['gallery' => 2 ]) }}" class="" id="form_admin_sidebar_update" enctype="multipart/form-data" >
{{--                        <form method="POST" action="{{ route('admin.sidebars.update', ['sidebar' => 2 ]) }}" class="" id="form_admin_sidebar_update"  >--}}
                            @csrf
                            <div class="body" id="main_gallery_wrap">
                                <div id="sliders_gallery" class="list-unstyled row clearfix">
                                    @forelse ($gallery ?? [] as $key =>$image)
                                        @php $img = (isset($image['img']) && strlen($image['img'])> 0) ? $image['img']: null @endphp
                                        <div id="image-{{$key}}"  data-id="{{ $key.$img }}" class="col-lg-2 col-md-4 col-sm-12 m-50 card border-secondary js_images_counter">
                                            <div class="card-header" >img - {{ $key }}<i class="table-dragger-handle"></i><div class="close_image_block" data-block-id="{{$key}}" onclick="delete_main_gallery_block(this);"><i class="fa fas fa-times"></i></div></div>
                                            <div class="card-body text-secondary" data-parent_id="{{$key}}">
                                                <input type="file" name="image[]" class="dropify" id="main_image-{{$key}}" data-input-id="{{$key}}" data-default-file="{{ $img !==null ? asset('storage/galleries/sliders_gallery/'.$img) : ''}}" >
                                                <input type="hidden" name="old_image[]" value="{{$img}}" id="old_image_{{$key}}" >
                                            </div>
                                            <ul class="list-group list-group-flush">
                                                <li class="list-group-item">
                                                    <label for="title1[]">Title 1:</label>
                                                    <textarea class="container-fluid" id="title1[]" name="title1[]">{{ $image['title1'] ?? null }}</textarea>
                                                </li>
                                                <li class="list-group-item">
                                                    <label for="title2[]">Title 2:</label>
                                                    <textarea class="container-fluid" id="title2[]" name="title2[]">{{ $image['title2'] ?? null }}</textarea>
                                                </li>
                                                <li class="list-group-item">
                                                    <label for="url[]">URL:</label>
                                                    <textarea class="container-fluid" id="url[]" name="url[]">{{ $image['url'] ?? null }}</textarea>
                                                </li>
                                            </ul>
                                        </div>
                                    @empty
                                    @endforelse
                                </div>
                                <button type="button" id="addImg" class="btn btn-primary" >Add Image</button>
                                <button type="submit" class="btn btn-success" title="Save"><span class="sr-only">Save</span><i class="fa fa-save"></i></button>
                            </div>
                        </form>
                    </div>

                    @if($views !== null)
                    <div class="card">
                        <div class="header">
                            <h2>Referrals</h2>
                            <ul class="header-dropdown dropdown dropdown-animated scale-left">
                                <li> <a href="javascript:void(0);" data-toggle="cardloading" data-loading-effect="pulse"><i class="icon-refresh"></i></a></li>
                                <li><a href="javascript:void(0);" class="full-screen"><i class="icon-size-fullscreen"></i></a></li>
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another Action</a></li>
                                        <li><a href="javascript:void(0);">Something else</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <ul class="list-unstyled list-referrals">
                                @php $x=0; @endphp
                                @forelse ($views ?? [] as $key =>$view)
                                    @php $url_view = $view['href']; $array_key = array_search($url_view, array_column($gallery, 'url'));  @endphp
                                @if(is_int($array_key))
                                    @php $url = (isset($gallery[$array_key]['url']) && strlen($gallery[$array_key]['url'])> 0) ? $gallery[$array_key]['url']: null;  $img = (isset($gallery[$array_key]['img']) && strlen($gallery[$array_key]['img'])> 0) ? $gallery[$array_key]['img']: null; $url_view_count = $view['count_views']; @endphp
                                <li>
                                    <div class="chart-img-link-wrap"><img class="chart-img border-secondary" src="{{asset('storage/galleries/main_gallery/'.$img)}}"><span class="text-muted float-right"><a href="{{ $url }}">{{ $url }}</a></span></div>
                                    <div class="progress progress-xs progress-transparent custom-color-{{ $chart_colors[$x] }}">
                                        <div class="progress-bar" data-transitiongoal="{{ (($url_view_count/$total_views) * 100 ) }}"></div>
                                    </div>

                                    <span class="value">{{ $url_view_count }}</span>
                                    @php $x==3 ? $x=0 : $x++; @endphp
                                </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endif

                </div>
            </div>
        </div>
    </div>

</div>
@endsection