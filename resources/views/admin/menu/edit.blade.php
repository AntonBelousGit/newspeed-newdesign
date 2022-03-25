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
                    <h2>Edit menu</h2>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item">Menu</li>
                        <li class="breadcrumb-item active">Edit menu</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2>Create menu</h2>
                        </div>
                        <div class="body">
                            <form id="basic-form" method="post" action="{{ route('admin.menu.update', $menu) }}">
                                @csrf
                                @method('patch')
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect01">Parent menu</label>
                                    </div>
                                    <select class="custom-select" id="inputGroupSelect01" name="menu_id">
                                        <option value="parent">Parent menu</option>
                                        @foreach($parent_menus as $item)
                                            <option value="{{$item->id}}" {{ $item->id == $menu->menu_id? 'selected':'' }}>{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect02">Parent menu type</label>
                                    </div>
                                    <select class="custom-select" id="inputGroupSelect02" name="type">
                                        <option value="category" {{ $menu->type == 'category'? 'selected':'' }}>Category</option>
                                        <option value="product" {{ $menu->type == 'product'? 'selected':'' }}>Product</option>
                                        <option value="custom" {{ $menu->type == 'custom'? 'selected':'' }}>Custom</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Menu item name</label>
                                    <input type="text" name="name" id="title" class="form-control" required value="{{$menu->name}}">
                                </div>
                                <div class="form-group">
                                    <label>Slug</label>
                                    <input type="text" name="slug" id="slug" class="form-control" required value="{{$menu->name}}">
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <br>
                                    <label class="fancy-radio">
                                        <input type="radio" name="status" value="1" {{ $menu->status === 1 ? 'checked':'' }}>
                                        <span><i></i>Active</span>
                                    </label>
                                    <label class="fancy-radio">
                                        <input type="radio" name="status"  value="0" {{ $menu->status === 0 ? 'checked':'' }}>
                                        <span><i></i>Inactive</span>
                                    </label>
                                    <p id="error-radio"></p>
                                </div>
                                <div class="form-group">
                                    <label>Порядковый номер</label>
                                    <input type="number" step="1" min="1" name="sort" id="title" class="form-control"
                                           required value="{{$menu->sort}}" style="max-width: 300px">
                                </div>
                                <div class="form-group">
                                    <label>Главная картинка</label>
                                    <div class="gallery-single" data-id="">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label>Иконка</label>
                                                <label for="addSinglePhotoInput" class="add-photo"
                                                       style="width: 230px; height: 130px; padding-top: 0">
                                                    <input type="file" name="file" id="addSinglePhotoInput"
                                                           class="input-file-hidden">
                                                    <div class="add-photo-title text-center">
                                                        <img src="http://127.0.0.1:8000/img/plus.svg"
                                                             style="width: 20px;">
                                                        <div class="dark-blue font-12 medium">Добавить фото</div>
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="col-md-3">
                                                <label>Категория иконки</label>
                                                <div class="">
                                                    <div class="upload-image d-none">
                                                        <input type='file' id="image" class="imgInp" data-id='img1'/>
                                                    </div>
                                                    <label for="image" class="wrap_image_file">
                                                        <img id="img1"
                                                             src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ81WywbibiU11fDdgiw5ZEqf4yCkx0-9rhj006mzgiOls7JaLGtO5gpus3-X7g3Xle8MY&usqp=CAU"
                                                             alt="your image" style="width: 230px; height: 130px"/>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="photo-error-message" class="error-message mb-1"></div>
                                        <small class="form-text text-muted">Изображения. До 1мб файл</small>
                                    </div>
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

@section('scripts')
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    {{--    <script src="{{asset('adminka/js/jquery.js')}}"></script>--}}
    <script src="{{asset('adminka/js/addPhotoCat.js')}}"></script>
    <script src="{{asset('adminka/js/removePhotoCat.js')}}"></script>
    <script>
        $('#title').keyup(function () {

            $('#slug').val(generate_url($(this).val()));
        });

        function generate_url(str) {
            var url = str.replace(/[\s]+/gi, '-');
            url = translit(url);
            url = url.replace(/[^0-9a-z_\-]+/gi, '').toLowerCase();
            return url;
        }

        function translit(str) {
            var ru = ("А-а-Б-б-В-в-Ґ-ґ-Г-г-Д-д-Е-е-Ё-ё-Є-є-Ж-ж-З-з-И-и-І-і-Ї-ї-Й-й-К-к-Л-л-М-м-Н-н-О-о-П-п-Р-р-С-с-Т-т-У-у-Ф-ф-Х-х-Ц-ц-Ч-ч-Ш-ш-Щ-щ-Ъ-ъ-Ы-ы-Ь-ь-Э-э-Ю-ю-Я-я").split("-")
            var en = ("A-a-B-b-V-v-G-g-G-g-D-d-E-e-E-e-E-e-ZH-zh-Z-z-I-i-I-i-I-i-J-j-K-k-L-l-M-m-N-n-O-o-P-p-R-r-S-s-T-t-U-u-F-f-H-h-TS-ts-CH-ch-SH-sh-SCH-sch-'-'-Y-y-'-'-E-e-YU-yu-YA-ya").split("-")
            var res = '';
            for (var i = 0, l = str.length; i < l; i++) {
                var s = str.charAt(i), n = ru.indexOf(s);
                if (n >= 0) {
                    res += en[n];
                } else {
                    res += s;
                }
            }
            return res;
        }
    </script>
@endsection
