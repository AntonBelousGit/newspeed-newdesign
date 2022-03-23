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
@endsection

@section('content')
    <div id="main-content">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h2>Категории</h2>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item active">Категории</li>
                    </ul>
                    <a href="{{route('admin.categories.create')}}" class="btn btn-sm btn-primary" title="">Create
                        New</a>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>Список Категорий</h2>
                            <ul class="header-dropdown dropdown dropdown-animated scale-left">
                                <li><a href="javascript:void(0);" data-toggle="cardloading" data-loading-effect="pulse"><i
                                                class="icon-refresh"></i></a></li>
                                <li><a href="javascript:void(0);" class="full-screen"><i
                                                class="icon-size-fullscreen"></i></a></li>
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown"
                                       role="button" aria-haspopup="true" aria-expanded="false"></a>
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
                                <table id="table_id" class="table table-bordered table-hover js-basic-example dataTable table-custom"
                                       cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>Название</th>
                                        <th>Родительская категория</th>
                                        <th>Slug</th>
                                        <th>Изображение</th>
                                        <th>Действие</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>Название</th>
                                        <th>Родительская категория</th>
                                        <th>Slug</th>
                                        <th>Изображение</th>
                                        <th>Действие</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach($categories as $item)
                                        <tr class="gradeA">
                                            <td>{{$item->name}}</td>
                                            <td>
                                                {{$item->categoriesParent->name ?? '---'}}

                                            </td>
                                            <td>{{$item->slug}}</td>
                                            <td><img src="{{asset('assets/uploads/category')}}/{{$item->image}}"
                                                     alt="img" style="width: 160px;"></td>
                                            <td class="actions">
                                                <a href="{{route('admin.categories.edit', $item )}}"
                                                   class="btn btn-sm btn-icon btn-pure btn-default on-default m-r-5 button-edit"
                                                   data-toggle="tooltip" data-original-title="Edit"><i
                                                            class="icon-pencil" aria-hidden="true"></i></a>

                                                <form action="{{route('admin.categories.destroy',$item)}}"
                                                      class="d-inline" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-icon btn-pure btn-default on-default button-remove"
                                                            data-toggle="tooltip" data-original-title="Remove"><i
                                                                class="icon-trash" aria-hidden="true"></i></button>
                                                </form>
                                                <a href="{{route('admin.banners.create', ['model' =>'Category', 'name' =>$item->name, 'model_id' => $item->id] )}}"
                                                   class="btn btn-sm btn-icon btn-pure btn-default on-default m-r-5"
                                                   data-toggle="tooltip" data-original-title="Banner"><i
                                                            class="icon-picture" aria-hidden="true"></i></a>
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
@endsection


@section('scripts')
    <script>
        $(document).ready(function () {
            $('#table_id').DataTable({
                stateSave: true
            });
        });
    </script>
@endsection
