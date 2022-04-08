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
                                <table id="table_id"
                                       class="table table-bordered table-hover js-basic-example dataTable table-custom"
                                       cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>Название</th>
                                        <th>The sort order</th>
                                        <th>Действие</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>Название</th>
                                        <th>The sort order</th>
                                        <th>Действие</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach($categories as $item)
                                        <tr class="gradeA" data-id="{{$item->id}}" onclick="activeItem(this)">
                                            <td class="dt-control" data-id="{{$item->id}}">
                                                <div>
                                                    {{$item->name}}
                                                </div>
                                            </td>
                                            <td>{{$item->sort}}</td>
                                            <td class="actions">
                                                <a href="{{route('admin.categories.edit', $item )}}"
                                                   class="btn btn-sm btn-icon btn-pure btn-default on-default m-r-5 button-edit"
                                                   data-toggle="tooltip" data-original-title="Edit"><i
                                                        class="icon-pencil" aria-hidden="true"></i></a>

                                                <form action="{{route('admin.categories.destroy',$item)}}"
                                                      class="d-inline" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button
                                                        class="btn btn-sm btn-icon btn-pure btn-default on-default button-remove"
                                                        data-toggle="tooltip" data-original-title="Remove"><i
                                                            class="icon-trash" aria-hidden="true"></i></button>
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

<style>

    #table_id td.dt-control div:after {
        content: '';
        display: block;
        width: 12px;
        height: 8px;
        background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg width='12' height='8' viewBox='0 0 12 8' fill='none' xmlns='http://www.w3.org/2000/svg'%3e%3cpath d='M6.81272 7.14577L11.1195 1.57814C11.4846 1.10564 11.0425 0.499268 10.3064 0.499268L1.69294 0.499268C0.958044 0.499268 0.514772 1.10477 0.881054 1.57814L5.18778 7.14577C5.26958 7.25325 5.38782 7.34259 5.53051 7.40474C5.6732 7.46688 5.83526 7.49961 6.00025 7.49961C6.16525 7.49961 6.32731 7.46688 6.47 7.40474C6.61268 7.34259 6.73092 7.25325 6.81272 7.14577Z' fill='%23212529'/%3e%3c/svg%3e");
        background-repeat: no-repeat;
        margin-left: 5px;
    }

    #table_id td.dt-control div {
        display: flex;
        align-items: center;
        font-style: normal;
        font-weight: 700;
        font-size: 14px;
        line-height: 22px;
        color: #3B6D9A;
    }

    #table_id tr.open td.dt-control div:after {
        display: none;
    }

    #table_id tr.open td.dt-control div {
        color: #212529;
    }

    #table_id td[colspan="3"] {
        padding: 0;
    }

    #table_id td[colspan="3"] table {
        width: 100%;
    }

    .subtable td:nth-child(1) {
        width: 31.7%;
        padding: 0 0 0 30px;
    }

    .subtable td:nth-child(1) div:after {
        content: '';
        display: block;
        width: 12px;
        height: 8px;
        background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg width='12' height='8' viewBox='0 0 12 8' fill='none' xmlns='http://www.w3.org/2000/svg'%3e%3cpath d='M6.81272 7.14577L11.1195 1.57814C11.4846 1.10564 11.0425 0.499268 10.3064 0.499268L1.69294 0.499268C0.958044 0.499268 0.514772 1.10477 0.881054 1.57814L5.18778 7.14577C5.26958 7.25325 5.38782 7.34259 5.53051 7.40474C5.6732 7.46688 5.83526 7.49961 6.00025 7.49961C6.16525 7.49961 6.32731 7.46688 6.47 7.40474C6.61268 7.34259 6.73092 7.25325 6.81272 7.14577Z' fill='%23212529'/%3e%3c/svg%3e");
        background-repeat: no-repeat;
        margin-left: 5px;
    }

    .subtable tr.open td:nth-child(1) div {
        color: #212529;
    }

    .subtable tr.open td:nth-child(1) div:after {
        display: none;
    }

    .subtable td:nth-child(1) div {
        display: flex;
        align-items: center;
        font-weight: 600;
        font-size: 14px;
        line-height: 22px;
        text-align: center;
        color: #3B6D9A;
    }

    .subtable td:nth-child(2) {
       width: 38.1%;
    }

    .subtable2 td:nth-child(1) {
        width: 31.7%;
        padding: 0 0 0 60px;
    }

    .dt-control div,
    .sorting_1 div {
        cursor: pointer;
    }
</style>

@section('scripts')
    <script>

        function activeItem(elem) {
            $(elem).toggleClass('open')
        }

        $(document).ready(function () {
            var table = $('#table_id').DataTable({
                stateSave: true
            });

            $('#table_id tbody').on('click', 'td.dt-control', async function () {
                var tr = $(this).closest('tr');
                var row = table.row(tr);
                var result = [];
                var dataId = $(tr).attr('data-id');
                let token = '{{csrf_token()}}'
                await $.ajax({
                    type: "POST",
                    url: "{{route('admin.category.searchChildrenByParent')}}",
                    data: {
                        id: dataId,
                        _token: token
                    },
                    success: function(response) {
                        result = response.data
                    }
                })
                // `d` is the original data object for the row
                var str = '<table class="subtable" cellspacing="0">';
                if(result.length > 0) {
                    for(let i = 0; i < result.length; i++) {
                        str = str + '<tr role="row" data-id="' + result[i].id + '" onclick="addSubCategory(this)">' +
                                        '<td class="sorting_1" colspan="1" rowspan="1" onclick="addSubCategory"><div>' + result[i].name +'</div></td>' +
                                        '<td colspan="1" rowspan="1">' + result[i].sort +'</td>' +
                                        '<td class="actions" colspan="1" rowspan="1">' +
                                        '<a href="http://127.0.0.1:8000/admin/categories/'+ result[i].id +'/edit"' +
                                        'class="btn btn-sm btn-icon btn-pure btn-default on-default m-r-5 button-edit"' +
                                        'data-toggle="tooltip" data-original-title="Edit"><i ' +
                                        'class="icon-pencil" aria-hidden="true"></i></a>' +
                                        '<form action="http://127.0.0.1:8000/admin/categories/'+ result[i].id + '"' +
                                        'class="d-inline" method="POST">' +
                                        '<input type="hidden" name="_token" value="'+ token + '">' +
                                        '<input type="hidden" name="_method" value="DELETE">' +
                                        '<button class="btn btn-sm btn-icon btn-pure btn-default on-default button-remove"' +
                                        'data-toggle="tooltip" data-original-title="Remove"><i ' +
                                        'class="icon-trash" aria-hidden="true"></i></button>' +
                                        '</form>' +
                                        '</td>' +
                                        '</tr>'

                    }
                    console.log(str)
                }
                str = str + '</table>';


                if (row.child.isShown()) {
                    // This row is already open - close it
                    row.child.hide();
                    tr.removeClass('shown');
                } else {
                    // Open this row
                    row = row.child(format(row.data(), str))
                    row.show()
                    tr.addClass('shown');
                }
            });


        });

        async function addSubCategory(elem) {

            if (!($(elem).hasClass('open'))) {
                var result = []
                let id = $(elem).attr('data-id')
                let token = '{{csrf_token()}}'
                await $.ajax({
                    type: "POST",
                    url: "{{route('admin.category.searchChildrenByParent')}}",
                    data: {
                        id: id,
                        _token: token
                    },
                    success: function(response) {
                        result = response.data
                    }
                })
                var str = '<tr role="row" ><td colspan="3"><table class="subtable2" cellspacing="0">';
                if(result.length > 0) {
                    for(let i = 0; i < result.length; i++) {
                        str = str + '<tr role="row" data-id="' + result[i].id + '">' +
                        '<td class="sorting_1" colspan="1" rowspan="1">'+ result[i].name +'</td>' +
                        '<td colspan="1" rowspan="1">1</td>' +
                        '<td class="actions" colspan="1" rowspan="1">' +
                        '<a href="http://127.0.0.1:8000/admin/categories/'+ result[i].id + '/edit"' +
                        'class="btn btn-sm btn-icon btn-pure btn-default on-default m-r-5 button-edit"' +
                        'data-toggle="tooltip" data-original-title="Edit"><i ' +
                        'class="icon-pencil" aria-hidden="true"></i></a>' +
                        '<form action="" class="d-inline" method="POST">' +
                        '<input type="hidden" name="_token" value="'+ token + '">' +
                        '<input type="hidden" name="_method" value="DELETE">' +
                        '<button class="btn btn-sm btn-icon btn-pure btn-default on-default button-remove"' +
                        'data-toggle="tooltip" data-original-title="Remove"><i ' +
                        'class="icon-trash" aria-hidden="true"></i></button>' +
                        '</form>' +
                        '</td>' +
                        '</tr>'
                    }
                }
                str = str + '</table></td></tr>';
                $(elem).after($(str))
                $(elem).addClass('open')
            }
        }

        function format(d, str) {
            return str;
        }
    </script>
@endsection
