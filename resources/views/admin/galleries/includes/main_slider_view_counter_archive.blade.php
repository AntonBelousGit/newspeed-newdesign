@extends('layouts.admin')
@section('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description" content="HexaBit Bootstrap 4x Admin Template">
    <meta name="author" content="WrapTheme, www.thememakker.com">
@endsection
@section('style')
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{ asset('adminka/assets/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('adminka/assets/vendor/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{ asset('adminka/assets/vendor/light-gallery/css/lightgallery.css')}}">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ asset('adminka/assets/css/main.css')}}">
    <link rel="stylesheet" href="{{ asset('adminka/assets/css/color_skins.css')}}">
    <link rel="stylesheet" href="{{ asset('adminka/assets/vendor/dropify/css/dropify.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminka/assets/vendor/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}">
    <style>
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
    <!-- Javascript -->
    <script src="{{ asset('adminka/assets/bundles/libscripts.bundle.js')}}"></script>
    <script src="{{ asset('adminka/assets/bundles/vendorscripts.bundle.js')}}"></script>

    <script src="{{ asset('adminka/assets/vendor/light-gallery/js/lightgallery-all.min.js')}}"></script><!-- Light Gallery Plugin Js -->

    <script src="{{ asset('adminka/assets/bundles/mainscripts.bundle.js')}}"></script>
    <script src="{{ asset('adminka/assets/js/pages/medias/image-gallery.js')}}"></script>

    <script src="{{ asset('adminka/assets/vendor/dropify/js/dropify.min.js')}}"></script>
    <script src="{{ asset('adminka/assets/js/pages/forms/dropify.js')}}"></script>

    <script src="http://sortablejs.github.io/Sortable/Sortable.js"></script>
    <script src="{{ asset('adminka/js/galleries/main_gallery.js')}}"></script>
    <script>
        // progress bars
        $('.progress .progress-bar').progressbar({
            display_text: 'none'
        });
    </script>
@endsection
@section('content')

    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="m-t-30"><img src="{{ asset('admin_style/assets/images/icon-light.svg')}}" width="48" height="48" alt="HexaBit"></div>
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
                        <h2>Gallery 2</h2>
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
                                            @php $url = $view['href']; $array_key = array_search($url, array_column($gallery, 'url'));  $img = (is_int($array_key)&&isset($gallery[$array_key]['img']) && strlen($gallery[$array_key]['img'])> 0) ? $gallery[$array_key]['img']: '../slider_placeholder.jpg'; $url_view = $view['count_views']; @endphp
                                            <li>
                                                <div class="chart-img-link-wrap"><img class="chart-img border-secondary" src="{{asset('storage/galleries/'.$img)}}"><span class="text-muted float-right"><a href="{{ $url }}">{{ $url }}</a></span></div>
                                                <div class="progress progress-xs progress-transparent custom-color-{{ $chart_colors[$x] }}">
                                                    <div class="progress-bar" data-transitiongoal="{{ (($url_view/$total_views) * 100 ) }}"></div>
                                                </div>
                                                <span class="value">{{ $url_view }}</span>
                                                @php $x==3 ? $x=0 : $x++; @endphp
                                            </li>
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