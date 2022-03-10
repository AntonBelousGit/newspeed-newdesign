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
    <script>
        function blockStatus(el) {
            var mode = $(el).prop('checked');
            var id = $(el).val();

            $.ajax({
                url: "{{route('admin.block.status')}}",
                type: "POST",
                data: {
                    _token: '{{csrf_token()}}',
                    mode: mode,
                    id: id,
                },
                success: function (response) {
                    if (response.status) {
                        console.log(response.msg);
                    } else {
                        alert('Please try again!');
                    }
                }
            })
        }
    </script>
@endsection

@section('content')

    <div id="main-content">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h2>Blocks</h2>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item active">Blocks</li>
                    </ul>
{{--                    <a href="{{route('admin.banners.create')}}" class="btn btn-sm btn-primary" title="">Create New</a>--}}
                </div>
            </div>
        </div>

        <div class="container-fluid">


            <div class="row clearfix">

                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>Blocks List</h2>
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
                                        <th>Title</th>
                                        <th>Slug</th>
                                        <th>Model</th>
                                        <th>Template</th>
                                        <th>Position</th>
                                        <th>Status</th>
                                        <th>Действие</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>Title</th>
                                        <th>Slug</th>
                                        <th>Model</th>
                                        <th>Template</th>
                                        <th>Position</th>
                                        <th>Status</th>
                                        <th>Действие</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
{{--                                    {{dd($products)}}--}}
                                    @foreach($blocks as $item)
                                        <tr class="gradeA">
                                            <td>{{$item->title}}</td>
                                            <td>{{$item->slug}}</td>
                                            <td>{{$item->model}}</td>
                                            <td>{{$item->themplate}}</td>
                                            <td>{{$item->position}}</td>
                                            <td>{{$item->status == 1 ? 'on':'off'}}</td>
                                            <td class="actions">
                                                <input type="checkbox" data-toggle="toggle" name="toogle"
                                                       value="{{$item->id}}" data-on="active" data-off="inactive"
                                                       {{ $item->status == 1 ? 'checked':'' }}
                                                       data-size="small" data-onstyle="success" data-offstyle="danger"
                                                       class="banner-switcher" onchange="blockStatus(this)"
                                                >
                                                <a class="btn btn-sm btn-icon btn-pure btn-default on-editing m-r-5 button-save"
                                                        data-toggle="tooltip" data-original-title="Save" hidden><i class="icon-drawer" aria-hidden="true"></i></a>
                                                <a class="btn btn-sm btn-icon btn-pure btn-default on-editing button-discard"
                                                            data-toggle="tooltip" data-original-title="Discard" hidden><i class="icon-close" aria-hidden="true"></i></a>
                                                <a href="{{route('admin.blocks.edit', $item )}}" class="btn btn-sm btn-icon btn-pure btn-default on-default m-r-5 button-edit"
                                                                data-toggle="tooltip" data-original-title="Edit"><i class="icon-pencil" aria-hidden="true"></i></a>

                                                <form action="{{route('admin.blocks.destroy',$item)}}" class="d-inline" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-icon btn-pure btn-default on-default button-remove"
                                                            data-toggle="tooltip" data-original-title="Remove"><i class="icon-trash" aria-hidden="true"></i></button>
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

