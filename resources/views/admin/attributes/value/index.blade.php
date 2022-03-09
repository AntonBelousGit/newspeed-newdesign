@extends('layouts.admin')
@section('style')
    {{--<!-- MAIN CSS -->--}}
    <link rel="stylesheet" href="{{asset('adminka/css/main.css')}}">
    {{--<!--для таблиц -->--}}
    <link rel="stylesheet" href="{{asset('adminka/assets/vendor/jquery-datatable/dataTables.bootstrap4.min.css')}}">
@endsection
@section('script')

@endsection

@section('content')

    <div id="main-content">
        <div class="container-fluid">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <h2><a href="javascript:void(0);" class="btn btn-xs btn-link btn-toggle-fullwidth"><i
                                        class="fa fa-arrow-left"></i></a>Products</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item active">Products attribute</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
{{--                <div class="col-lg-12">--}}
{{--                    @if ($errors->any())--}}
{{--                        <div class="alert alert-danger">--}}
{{--                            <ul>--}}
{{--                                @foreach($errors->all() as $error)--}}
{{--                                    <li>{{$error}}</li>--}}
{{--                                @endforeach--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                    @endif--}}

{{--                    @include('backend.layouts.notification')--}}
{{--                </div>--}}
                <div class="col-lg-12">

                    <div class="card">
                        <div class="body">
                            <form action="{{route('admin.attribute-value.add-values',['id'=>$id])}}" method="post">
                                @csrf
                                <div id="product-attribute" class="content"
                                     data-mfield-options='{"section": ".group","btnAdd":"#btnAdd-1","btnRemove":".btnRemove"}'>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="button" id="btnAdd-1" class="btn btn-primary mb-1"><i
                                                        class="fa fa-plus-circle"></i></button>
                                        </div>
                                    </div>
                                    <div class="row group">
                                        <div class="col-md-2">
                                            <label for="">Value</label>
                                            <input class="form-control" name="value[]" type="text">
                                        </div>

                                        <div class="col-md-2" style="margin: auto 0 0;">
                                            <button type="button" class="btn btn-danger btnRemove">Remove</button>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success mt-3">Submit</button>
                            </form>
                            <div class="row mt-4">
                                <div class="table-responsive">
                                    <table
                                            class="table table-bordered ">
                                        <thead>
                                        <tr>
                                            <th>Value</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tfoot>
                                        <tr>
                                            <th>Value</th>
                                            <th>Actions</th>
                                        </tr>
                                        </tfoot>
                                        <tbody>
                                        @if(count($attribute->values)>0)

                                            @foreach($attribute->values as $item)
                                                <tr>
                                                    <td>{{$item->value}}</td>
                                                    <td>
                                                        <form class="float-left ml-1"
                                                              action="{{route('admin.attribute-value.delete-values',$item->id)}}" method="post">
                                                            @csrf
                                                            <button data-toggle="tooltip" title="delete" data-id="{{$item->id}}"
                                                               class="dltBtn btn btn-sm btn-outline-danger"
                                                               data-placement="bottom" data-original-title="delete">
                                                                <i class="fa fa-remove"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
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

@section('scripts')
    <script src="{{asset('adminka/js/jquery.multifield.min.js')}}"></script>
    <script>
        $('#product-attribute').multifield();
    </script>
@endsection
