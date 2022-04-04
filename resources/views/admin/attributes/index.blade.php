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
                    <h2>Attributes</h2>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item active">Attributes</li>
                    </ul>
                    <a href="{{route('admin.attributes.create')}}" class="btn btn-sm btn-primary" title="">Create
                        New</a>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>Attributes</h2>
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
                                <table class="table table-bordered table-hover js-basic-example dataTable table-custom"
                                       cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>Code</th>
                                        <th>Name</th>
                                        <th>Action</th>

                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>Code</th>
                                        <th>Name</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach($attributes as $item)
                                        <tr class="gradeA">
                                            <td>{{$item->code}}</td>
                                            <td>{{$item->name}}</td>
                                            <td class="actions">
                                                <a href="{{route('admin.attributes.edit', $item )}}"
                                                   class="btn btn-sm btn-icon btn-pure btn-default on-default m-r-5 button-edit"
                                                   data-toggle="tooltip" data-original-title="Edit">
                                                    <i class="icon-pencil" aria-hidden="true"></i>
                                                </a>
                                                <a href="{{route('admin.attributes.edit-value',['id'=>$item->id])}}"
                                                   class="btn btn-sm btn-outline-info float-left ml-1"
                                                   title="add attribute"
                                                   data-toggle="tooltip"
                                                >
                                                    <i class="fa fa-plus-circle"></i>
                                                </a>
                                                <form action="{{route('admin.attributes.destroy',$item)}}"
                                                      class="d-inline" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-icon btn-pure btn-default on-default button-remove"
                                                            data-toggle="tooltip" data-original-title="Remove"><i
                                                                class="icon-trash" aria-hidden="true"></i>
                                                    </button>
                                                </form>
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
