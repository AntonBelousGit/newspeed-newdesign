    @extends('layouts.admin')
    @section('style')
            <link rel="stylesheet" href="{{ asset('adminka/assets/vendor/nestable/jquery-nestable.css')}}"/>
            {{--    <link rel="stylesheet" href="{{ asset('adminka/assets/vendor/sweetalert/sweetalert.css')}}"/>--}}
            {{--    <link rel="stylesheet" href="{{ asset('adminka/assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')}}">--}}
    @endsection
    @section('script')
        <script src="{{ asset('adminka/assets/vendor/nestable/jquery.nestable.js')}}"></script><!-- Jquery Nestable -->
        {{--<script src="{{ asset('adminka/assets/vendor/sweetalert/sweetalert.min.js')}}"></script><!-- SweetAlert Plugin Js -->--}}
        {{--<script src="{{ asset('adminka/assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script><!-- bootstrap datepicker Plugin Js -->--}}
        <script src="{{ asset('adminka/assets/js/pages/ui/sortable-nestable.js')}}"></script>
        {{--<script src="{{ asset('adminka/assets/js/pages/ui/dialogs.js')}}"></script>--}}
    @endsection
@section('content')

    <div id="main-content" class="taskboard">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h2>TaskBoard</h2>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item active">TaskBoard</li>
                    </ul>
                    <a href="javascript:void(0);" class="btn btn-sm btn-primary" title="" data-toggle="modal" data-target="#addcontact">Create New</a>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row clearfix">

                <div class="col-lg-4 col-md-12">
                    <div class="card planned_task">
                        <div class="header">
                            <h2>Left Position</h2>
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
                            <div class="dd" data-plugin="nestable">
                                <ol class="dd-list">
                                    @each('admin.blocks.positions.left.item', $blocks, 'item')
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-12">
                    <div class="card progress_task">
                        <div class="header">
                            <h2>Center Position</h2>
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
                            <div class="dd" data-plugin="nestable">
                                <ol class="dd-list">
                                    <li class="dd-item" data-id="1">
                                        <div class="dd-handle">
                                            <h6>New Code Update</h6>
                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                        </div>
                                    </li>
                                    <li class="dd-item" data-id="2">
                                        <div class="dd-handle">
                                            <h6>Meeting</h6>
                                            <p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero</p>
                                            <ul class="list-unstyled team-info m-t-20">
                                                <li><img src="{{ asset('adminka/assets/images/xs/avatar7.jpg')}}" data-toggle="tooltip" data-placement="top" title="Avatar" alt="Avatar"></li>
                                                <li><img src="{{ asset('adminka/assets/images/xs/avatar9.jpg')}}" data-toggle="tooltip" data-placement="top" title="Avatar" alt="Avatar"></li>
                                            </ul>
                                        </div>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-12">
                    <div class="card completed_task">
                        <div class="header">
                            <h2>Right Position</h2>
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
                            <div class="dd" data-plugin="nestable">
                                <ol class="dd-list">
                                    <li class="dd-item" data-id="1">
                                        <div class="dd-handle">
                                            <h6>Job title</h6>
                                            <p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
                                            <ul class="list-unstyled team-info m-t-20">
                                                <li><img src="{{ asset('adminka/assets/images/xs/avatar4.jpg')}}" data-toggle="tooltip" data-placement="top" title="Avatar" alt="Avatar"></li>
                                                <li><img src="{{ asset('adminka/assets/images/xs/avatar5.jpg')}}" data-toggle="tooltip" data-placement="top" title="Avatar" alt="Avatar"></li>
                                                <li><img src="{{ asset('adminka/assets/images/xs/avatar6.jpg')}}" data-toggle="tooltip" data-placement="top" title="Avatar" alt="Avatar"></li>
                                                <li><img src="{{ asset('adminka/assets/images/xs/avatar8.jpg')}}" data-toggle="tooltip" data-placement="top" title="Avatar" alt="Avatar"></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="dd-item" data-id="2">
                                        <div class="dd-handle">
                                            <h6>Event Done</h6>
                                            <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical</p>
                                        </div>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection

@section('modal')
<!-- Add New Task -->
<div class="modal fade" id="addcontact" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="title" id="defaultModalLabel">Add New Task</h6>
            </div>
            <div class="modal-body">
                <div class="row clearfix">
                    <div class="col-12">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Task no.">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Job title">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <textarea type="number" class="form-control" placeholder="Description"></textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <select class="form-control show-tick m-b-10">
                            <option>Select Team</option>
                            <option>John Smith</option>
                            <option>Claire Peters</option>
                            <option>Ken Patrick</option>
                            <option>Cory Carter</option>
                            <option>Rochelle Barton</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <label>Range</label>
                        <div class="input-daterange input-group" data-provide="datepicker">
                            <input type="text" class="form-control" name="start">
                            <span class="input-group-addon"> to </span>
                            <input type="text" class="form-control" name="end">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Add</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
            </div>
        </div>
    </div>
</div>
@endsection

