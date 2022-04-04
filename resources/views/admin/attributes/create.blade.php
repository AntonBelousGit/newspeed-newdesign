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
    <div class="row user">
        <div class="col-md-9 offset-2">
            <div class="tab-content">
                <div class="tab-pane active" id="general">
                    <div class="tile">
                        <form action="{{ route('admin.attributes.store') }}" method="POST" role="form">
                            @csrf
                            <h3 class="tile-title">Attribute Information</h3>
                            <hr>
                            <div class="tile-body">
                                <div class="form-group">
                                    <label class="control-label" for="code">Code</label>
                                    <input
                                            class="form-control"
                                            type="text"
                                            placeholder="Enter attribute code"
                                            id="code"
                                            name="code"
                                            value="{{ old('code') }}"
                                    />
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="name">Name</label>
                                    <input
                                            class="form-control"
                                            type="text"
                                            placeholder="Enter attribute name"
                                            id="name"
                                            name="name"
                                            value="{{ old('name') }}"
                                    />
                                </div>
                            </div>
                            <div class="tile-footer">
                                <div class="row d-print-none mt-2">
                                    <div class="col-12 text-right">
                                        <button class="btn btn-success" type="submit"><i
                                                    class="fa fa-fw fa-lg fa-check-circle"></i>Save Attribute
                                        </button>
                                        <a class="btn btn-danger" href="{{ route('admin.attributes.index') }}"><i
                                                    class="fa fa-fw fa-lg fa-arrow-left"></i>Go Back</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
