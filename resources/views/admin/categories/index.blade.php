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
                                        <tr class="gradeA" onclick="activeItem(this)">
                                            <td class="dt-control">
                                                <div>
                                                    Техника для дома
                                                </div>
                                            </td>
                                            <td>1</td>
                                            <td class="actions">
                                                <a href=""
                                                   class="btn btn-sm btn-icon btn-pure btn-default on-default m-r-5 button-edit"
                                                   data-toggle="tooltip" data-original-title="Edit"><i
                                                            class="icon-pencil" aria-hidden="true"></i></a>
                                                <a href=""
                                                   class="btn btn-sm btn-icon btn-pure btn-default on-default m-r-5"
                                                   data-toggle="tooltip" data-original-title="Banner"><i
                                                            class="icon-picture" aria-hidden="true"></i></a>
                                                <form action=""
                                                      class="d-inline" method="POST">
                                                    <button class="btn btn-sm btn-icon btn-pure btn-default on-default button-remove"
                                                            data-toggle="tooltip" data-original-title="Remove"><i
                                                                class="icon-trash" aria-hidden="true"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                        <tr class="gradeA" onclick="activeItem(this)">
                                            <td class="dt-control">
                                                <div>
                                                    Техника для дома
                                                </div>
                                            </td>
                                            <td>1</td>
                                            <td class="actions">
                                                <a href=""
                                                   class="btn btn-sm btn-icon btn-pure btn-default on-default m-r-5 button-edit"
                                                   data-toggle="tooltip" data-original-title="Edit"><i
                                                            class="icon-pencil" aria-hidden="true"></i></a>
                                                <a href=""
                                                   class="btn btn-sm btn-icon btn-pure btn-default on-default m-r-5"
                                                   data-toggle="tooltip" data-original-title="Banner"><i
                                                            class="icon-picture" aria-hidden="true"></i></a>
                                                <form action=""
                                                      class="d-inline" method="POST">
                                                    <button class="btn btn-sm btn-icon btn-pure btn-default on-default button-remove"
                                                            data-toggle="tooltip" data-original-title="Remove"><i
                                                                class="icon-trash" aria-hidden="true"></i></button>
                                                </form>
                                            </td>
                                        </tr>
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
    width: 37%;
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
    width: 33%;
}

.subtable2 td:nth-child(1) {
   width: 37%;
   padding: 0 0 0 60px;
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

            $('#table_id tbody').on('click', 'td.dt-control', function () {
                var tr = $(this).closest('tr');
                var row = table.row( tr );

                if ( row.child.isShown() ) {
                    // This row is already open - close it
                    row.child.hide();
                    tr.removeClass('shown');
                }
                else {
                    // Open this row
                    row.child( format(row.data()) ).show();
                    tr.addClass('shown');
                }
            } );


        });

        function addSubCategory (elem) {
          if(!($(elem).hasClass('open'))) {
            $(elem).after($('<tr role="row" >' +
                '<td colspan="3">' +
                '<table class="subtable2" cellspacing="0">' +
                    '<tr role="row">' +
                        '<td class="sorting_1" colspan="1" rowspan="1">Техника для дома 1_133</td>' +
                        '<td colspan="1" rowspan="1">1</td>' +
                        '<td class="actions" colspan="1" rowspan="1">' +
                            '<a href=""' +
                            'class="btn btn-sm btn-icon btn-pure btn-default on-default m-r-5 button-edit"' +
                            'data-toggle="tooltip" data-original-title="Edit"><i ' +
                                'class="icon-pencil" aria-hidden="true"></i></a>' +
                            '<a href=""' +
                            'class="btn btn-sm btn-icon btn-pure btn-default on-default m-r-5"' +
                            'data-toggle="tooltip" data-original-title="Banner"><i ' +
                                'class="icon-picture" aria-hidden="true"></i></a>' +
                            '<form action=""' +
                            'class="d-inline" method="POST">' +
                            '<button class="btn btn-sm btn-icon btn-pure btn-default on-default button-remove"' +
                                'data-toggle="tooltip" data-original-title="Remove"><i ' +
                                    'class="icon-trash" aria-hidden="true"></i></button>' +
                            '</form>' +
                        '</td>' +
                    '</tr>' +
                    '<tr role="row">' +
                        '<td class="sorting_1" colspan="1" rowspan="1">Техника для дома 1_23</td>' +
                        '<td colspan="1" rowspan="1">1</td>' +
                        '<td class="actions" colspan="1" rowspan="1">' +
                            '<a href=""' +
                            'class="btn btn-sm btn-icon btn-pure btn-default on-default m-r-5 button-edit"' +
                            'data-toggle="tooltip" data-original-title="Edit"><i ' +
                                'class="icon-pencil" aria-hidden="true"></i></a>' +
                            '<a href=""' +
                            'class="btn btn-sm btn-icon btn-pure btn-default on-default m-r-5"' +
                            'data-toggle="tooltip" data-original-title="Banner"><i ' +
                                'class="icon-picture" aria-hidden="true"></i></a>' +
                            '<form action=""' +
                            'class="d-inline" method="POST">' +
                            '<button class="btn btn-sm btn-icon btn-pure btn-default on-default button-remove"' +
                                'data-toggle="tooltip" data-original-title="Remove"><i ' +
                                    'class="icon-trash" aria-hidden="true"></i></button>' +
                            '</form>' +
                        '</td>' +
                    '</tr>' +
                '</table>' +
                '</td>' +
            '</tr>'))
            $(elem).addClass('open')
          } else {
          }
        }

        function format ( d ) {
            // `d` is the original data object for the row
            return '<table class="subtable" cellspacing="0">'+
                '<tr role="row" onclick="addSubCategory(this)">' +
                    '<td class="sorting_1" colspan="1" rowspan="1" onclick="addSubCategory"><div>Техника для дома 1</div></td>' +
                    '<td colspan="1" rowspan="1">1</td>' +
                    '<td class="actions" colspan="1" rowspan="1">' +
                        '<a href=""' +
                        'class="btn btn-sm btn-icon btn-pure btn-default on-default m-r-5 button-edit"' +
                        'data-toggle="tooltip" data-original-title="Edit"><i ' +
                            'class="icon-pencil" aria-hidden="true"></i></a>' +
                        '<a href=""' +
                        'class="btn btn-sm btn-icon btn-pure btn-default on-default m-r-5"' +
                        'data-toggle="tooltip" data-original-title="Banner"><i ' +
                            'class="icon-picture" aria-hidden="true"></i></a>' +
                        '<form action=""' +
                        'class="d-inline" method="POST">' +
                        '<button class="btn btn-sm btn-icon btn-pure btn-default on-default button-remove"' +
                            'data-toggle="tooltip" data-original-title="Remove"><i ' +
                                'class="icon-trash" aria-hidden="true"></i></button>' +
                        '</form>' +
                    '</td>' +
                '</tr>' +
                '<tr role="row" onclick="addSubCategory(this)">' +
                    '<td class="sorting_1" colspan="1" rowspan="1">Техника для дома 2</td>' +
                    '<td colspan="1" rowspan="1">1</td>' +
                    '<td class="actions" colspan="1" rowspan="1">' +
                        '<a href=""' +
                        'class="btn btn-sm btn-icon btn-pure btn-default on-default m-r-5 button-edit"' +
                        'data-toggle="tooltip" data-original-title="Edit"><i ' +
                            'class="icon-pencil" aria-hidden="true"></i></a>' +
                        '<a href=""' +
                        'class="btn btn-sm btn-icon btn-pure btn-default on-default m-r-5"' +
                        'data-toggle="tooltip" data-original-title="Banner"><i ' +
                            'class="icon-picture" aria-hidden="true"></i></a>' +
                        '<form action=""' +
                        'class="d-inline" method="POST">' +
                        '<button class="btn btn-sm btn-icon btn-pure btn-default on-default button-remove"' +
                            'data-toggle="tooltip" data-original-title="Remove"><i ' +
                                'class="icon-trash" aria-hidden="true"></i></button>' +
                        '</form>' +
                    '</td>' +
                '</tr>' +
            '</table>';
        }
    </script>
@endsection
