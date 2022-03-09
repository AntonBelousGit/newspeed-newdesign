@extends('layouts.admin')
@section('style')
    {{--<!-- MAIN CSS -->--}}
    <link rel="stylesheet" href="{{asset('adminka/css/main.css')}}">
    {{--<!--для таблиц -->--}}
    <link rel="stylesheet" href="{{asset('adminka/assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css')}}">
@endsection
@section('script')
    <script src="{{asset('adminka/assets/bundles/datatablescripts.bundle.js')}}"></script>
    <script src="{{asset('adminka/assets/js/pages/tables/jquery-datatable.js')}}"></script>
    <script src="{{asset('adminka/js/galleries/banners_index.js')}}" ></script>
@endsection

@section('content')

    <div id="main-content">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h2>Banners</h2>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item active">Banners</li>
                    </ul>
                    <a href="{{route('admin.banners.create')}}" class="btn btn-sm btn-primary" title="">Create New</a>
                </div>
            </div>
        </div>

        <div class="container-fluid">


            <div class="row clearfix">

                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>Banners List</h2>
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
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover js-basic-example dataTable table-custom" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Model</th>
                                        <th>Model id</th>
                                        <th>Link</th>
                                        <th>Value</th>
                                        <th>Galleries</th>
                                        <th>Views</th>
                                        <th>Создан</th>
                                        <th>Действие</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>Image</th>
                                        <th>Model</th>
                                        <th>Model id</th>
                                        <th>Link</th>
                                        <th>Value</th>
                                        <th>Galleries</th>
                                        <th>Views</th>
                                        <th>Создан</th>
                                        <th>Действие</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
{{--                                    {{dd($products)}}--}}
                                    @foreach($banners as $item)

                                        <tr class="gradeA">
                                            <td><img src="{{asset('storage/galleries')}}/{{$item->img}}" alt="img" style="width: 160px;"></td>
                                            <td>{{$item->model}}</td>
                                            <td>{{$item->model_id ?? '-------------------------------'}}</td>
                                            <td>{{$item->url}}</td>

                                            <td>{{$item->value['title']}}</td>
                                            <td>
                                                <form action="{{route('admin.galleries.move_banner_to_gallery',$item)}}" class="d-inline" method="POST">
                                                    @csrf
                                                    <div class="col-lg-6 col-md-12">
                                                        @foreach($gallery_blocks as $gallery_block)
                                                            <div class="fancy-checkbox">
                                                                <label><input type="checkbox" class="input_move_to_gallery"  id="{{ $gallery_block->slug }}" name="{{ $gallery_block->slug }}" value="{{ $item->id }}" ><span>{{ ucfirst($gallery_block->slug) }}</span></label>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </form>
                                            </td>
                                            <td>{{$item->views}}</td>
                                            <td>{{$item->created_at?->format('d/m/y H:i:s')?? ''}}</td>
                                            <td class="actions">
                                                <a class="btn btn-sm btn-icon btn-pure btn-default on-editing m-r-5 button-save"
                                                        data-toggle="tooltip" data-original-title="Save" hidden><i class="icon-drawer" aria-hidden="true"></i></a>
                                                <a class="btn btn-sm btn-icon btn-pure btn-default on-editing button-discard"
                                                            data-toggle="tooltip" data-original-title="Discard" hidden><i class="icon-close" aria-hidden="true"></i></a>
                                                <a href="{{route('admin.banners.edit', $item )}}" class="btn btn-sm btn-icon btn-pure btn-default on-default m-r-5 button-edit"
                                                                data-toggle="tooltip" data-original-title="Edit"><i class="icon-pencil" aria-hidden="true"></i></a>

                                                <form action="{{route('admin.banners.destroy',$item)}}" class="d-inline" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-icon btn-pure btn-default on-default button-remove"
                                                            data-toggle="tooltip" data-original-title="Remove"><i class="icon-trash" aria-hidden="true"></i></button>
                                                </form>
                                                <a href="{{route('admin.banners.create', ['model' =>'Product', 'model_id' => $item->id] )}}" class="btn btn-sm btn-icon btn-pure btn-default on-default m-r-5"
                                                   data-toggle="tooltip" data-original-title="Move to Main Slider"><i class="icon-picture"  aria-hidden="true"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
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
