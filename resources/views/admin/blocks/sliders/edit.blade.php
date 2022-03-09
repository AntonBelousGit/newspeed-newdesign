@extends('layouts.admin')
@section('style')
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{ asset('adminka/assets/vendor/light-gallery/css/lightgallery.css')}}">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{asset('adminka/css/main.css')}}">
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
    <div id="main-content">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h2>Edit Block</h2>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item">Block</li>
                        <li class="breadcrumb-item active">New</li>
                    </ul>
                    <a href="javascript:void(0);" class="btn btn-sm btn-primary" title="">Create New</a>
                </div>
            </div>
        </div>
        <div class="container-fluid">

            <div class="row clearfix">
                <div class="col-md-12">

                    <div class="card">
                        <form method="POST" action="{{ route('admin.galleries.sliders_update', ['gallery' => $gallery_id ]) }}" class="" id="form_admin_sidebar_update" enctype="multipart/form-data" >
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



                    <div class="card">
                        <div class="header">
                            <h2>Edit Block</h2>
                        </div>
                        <div class="body">
                            <form id="basic-form" method="post" action="{{route('admin.blocks.update',$block)}}"
                                  enctype="multipart/form-data">
                                @method("PUT")
                                @csrf
                                <div class="form-group">
                                    <label>Название блока</label>
                                    <input type="text" name="title" class="form-control" id="title" required="true"
                                           value="{{$block->title}}">
                                    <input type="hidden" name="slug" id="slug" required="true"
                                           value="{{$block->slug}}">
                                    @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect02">Статус блока</label>
                                    </div>

                                    <select class="custom-select" id="inputGroupSelect02" name="status">
                                        <option selected="">----</option>
                                        <option value="1"
                                                @if($block->status == 1) selected @endif>Активна
                                        </option>
                                        <option value="0"
                                                @if($block->status == 0) selected @endif>Неактивна
                                        </option>
                                    </select>

                                    @error('status')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary">Сохранить</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
