@extends('layouts.admin')
@section('style')
    {{--<!-- MAIN CSS -->--}}
    <link rel="stylesheet" href="{{asset('adminka/css/main.css')}}">
@endsection
@section('script')
@endsection

@section('content')
    <div id="main-content">
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-md-6 col-sm-12">
                    <h2>Edit Block</h2>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item">Block</li>
                        <li class="breadcrumb-item active">New</li>
                    </ul>
                    <a href="javascript:void(0);" class="btn btn-sm btn-primary" title="">Create New</a>
                </div>
            </div>
        </div>
        <div class="container-fluid">

            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2>Edit Block</h2>
                        </div>
                        <div class="body">
                            <form id="basic-form" method="post" action="{{route('admin.blocks.update',$block)}}"
                                  enctype="multipart/form-data">
                                @method("PUT")
                                @csrf
                                <div class="form-group">
                                    <label>Название блока</label>
                                    <input type="text" name="title" class="form-control" id="title" required="true"
                                           value="{{$block->title}}">
                                    <input type="hidden" name="slug" id="slug" required="true"
                                           value="{{$block->slug}}">
                                    @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect02">Статус блока</label>
                                    </div>

                                    <select class="custom-select" id="inputGroupSelect02" name="status">
                                        <option selected="">----</option>
                                        <option value="1"
                                                @if($block->status == 1) selected @endif>Активна
                                        </option>
                                        <option value="0"
                                                @if($block->status == 0) selected @endif>Неактивна
                                        </option>
                                    </select>

                                    @error('status')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary">Сохранить</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection
