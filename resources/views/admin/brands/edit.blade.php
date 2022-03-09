@extends('layouts.admin')
@section('style')
    {{--<!-- MAIN CSS -->--}}
    <link rel="stylesheet" href="{{asset('adminka/css/main.css')}}">
@endsection

@section('content')

    <div id="main-content">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h2>Create brand</h2>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item">Brands</li>
                        <li class="breadcrumb-item active">Create brand</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid">

            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2>Create brand</h2>
                        </div>
                        <div class="body">
                            <form id="basic-form" method="post" action="{{route('admin.brand.update',$brand)}}">
                                @method('patch')
                                @csrf
                                <div class="form-group">
                                    <label>Brand name</label>
                                    <input type="text" name="name" id="title" class="form-control" required="required"
                                           value="{{$brand->name}}">
                                    @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <br/>
                                    <label class="fancy-radio">
                                        <input type="radio" name="status"
                                               value="true" {{ $brand->status == 'true' ? 'checked' : '' }}>
                                        <span><i></i>Active</span>
                                    </label>
                                    <label class="fancy-radio">
                                        <input type="radio" name="status"
                                               value="false" {{ $brand->status == 'false' ? 'checked' : '' }}>
                                        <span><i></i>Inactive</span>
                                    </label>
                                    @error('status')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <p id="error-radio"></p>
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

