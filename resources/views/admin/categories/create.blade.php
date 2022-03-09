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
                    <h2>Создать категорию</h2>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item">Категории</li>
                        <li class="breadcrumb-item active">Создать категорию</li>
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
                            <h2>Создать категорию</h2>
                        </div>
                        <div class="body">
                            <form id="basic-form" method="post" action="{{route('admin.categories.store')}}">
                                  @csrf
                                   <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01">Родительская категория</label>
                                </div>
                                <select class="custom-select" id="inputGroupSelect01" name="category_id">
                                    <option selected="" value="null">Родительская категория</option>
                                    @foreach($categories as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                </select>
                            </div>
                                   <div class="form-group">
                                    <label>Название категории</label>
                                    <input type="text" name="name" id="title" class="form-control" required="true" value="{{old('name')}}">
                                       @error('title')
                                       <div class="alert alert-danger">{{ $message }}</div>
                                       @enderror
                                    <input type="hidden" name="slug" id="slug" required="true" value="{{old('slug')}}">
                                       @error('slug')
                                       <div class="alert alert-danger">{{ $message }}</div>
                                       @enderror
                                </div>

                                <div class="form-group">
                                    <label>Описание</label>
                                    <textarea class="form-control" rows="5" cols="30" name="description" required>{{old('description')}}</textarea>
                                    @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                 <div class="form-group">
                                    <label>SEO Описание</label>
                                    <textarea class="form-control" rows="5" cols="30" name="seo_description">{{old('seo_description')}}</textarea>
                                     @error('seo_description')
                                     <div class="alert alert-danger">{{ $message }}</div>
                                     @enderror
                                </div>
                                <div class="form-group">
                                    <label>Дополнительно</label>
                                    <br/>
                                    <label class="fancy-checkbox">
                                        <input type="checkbox" name="popular" data-parsley-errors-container="#error-checkbox" {{ old('popular') == 'on' ? 'checked' : '' }}>
                                        <span>Популярные</span>
                                    </label>
                                    <label class="fancy-checkbox">
                                        <input type="checkbox" name="recomend" {{ old('recomend') == 'on' ? 'checked' : '' }}>
                                        <span>Рекомендуемые</span>
                                    </label>
                                 <p id="error-checkbox"></p>
                                </div>
                                <div class="form-group">
                                    <label>Статус</label>
                                    <br />
                                    <label class="fancy-radio">
                                        <input type="radio" name="status" value="true" >
                                        <span><i></i>Активна</span>
                                    </label>
                                    <label class="fancy-radio">
                                        <input type="radio" name="status" value="false">
                                        <span><i></i>Неактивна</span>
                                    </label>
                                    @error('status')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <p id="error-radio"></p>
                                </div>
                                <div class="form-group">
                                    <label>Главная картинка</label>
                                    <div class="gallery-single" data-id="">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="addSinglePhotoInput" class="add-photo">
                                                    <input type="file" name="file" id="addSinglePhotoInput" class="input-file-hidden">
                                                    <div class="add-photo-title text-center">
                                                        <img src="{{asset('img/plus.svg')}}" style="width: 20px;">
                                                        <div class="dark-blue font-12 medium">Добавить фото</div>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                        <div id="photo-error-message" class="error-message mb-1"></div>
                                        <small class="form-text text-muted">Изображения. До 1мб файл</small>
                                    </div>
                                </div>
                             <div class="body">

{{--                            <input type="file" id="dropify-event" data-default-file="{{asset('adminka/assets/images/image-gallery/1.jpg')}}">--}}
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
    <script src="{{asset('adminka/js/addPhotoCat.js')}}"></script>
    <script src="{{asset('adminka/js/removePhotoCat.js')}}"></script>
    <script>
        $('#title').keyup(function() {

            $('#slug').val(generate_url($(this).val()));
        });

        function generate_url(str)
        {
            var url = str.replace(/[\s]+/gi, '-');
            url = translit(url);
            url = url.replace(/[^0-9a-z_\-]+/gi, '').toLowerCase();
            return url;
        }

        function translit(str)
        {
            var ru=("А-а-Б-б-В-в-Ґ-ґ-Г-г-Д-д-Е-е-Ё-ё-Є-є-Ж-ж-З-з-И-и-І-і-Ї-ї-Й-й-К-к-Л-л-М-м-Н-н-О-о-П-п-Р-р-С-с-Т-т-У-у-Ф-ф-Х-х-Ц-ц-Ч-ч-Ш-ш-Щ-щ-Ъ-ъ-Ы-ы-Ь-ь-Э-э-Ю-ю-Я-я").split("-")
            var en=("A-a-B-b-V-v-G-g-G-g-D-d-E-e-E-e-E-e-ZH-zh-Z-z-I-i-I-i-I-i-J-j-K-k-L-l-M-m-N-n-O-o-P-p-R-r-S-s-T-t-U-u-F-f-H-h-TS-ts-CH-ch-SH-sh-SCH-sch-'-'-Y-y-'-'-E-e-YU-yu-YA-ya").split("-")
            var res = '';
            for(var i=0, l=str.length; i<l; i++)
            {
                var s = str.charAt(i), n = ru.indexOf(s);
                if(n >= 0) { res += en[n]; }
                else { res += s; }
            }
            return res;
        }
    </script>
@endsection
