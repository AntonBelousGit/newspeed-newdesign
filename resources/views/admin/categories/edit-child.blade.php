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
                            <form id="basic-form" method="post" action="{{route('admin.categories.update',$category)}}">
                                @method('PUT')
                                @csrf
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect01">Родительская
                                            категория</label>
                                    </div>
                                    <select class="custom-select" id="inputGroupSelect01" name="category_id">
                                        <option selected="" value="null">Родительская категория</option>
                                        @foreach($categories as $item)
                                            <option value="{{$item->id}}"
                                                    @if($item->id == $category->category_id) selected @endif>{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Название категории</label>
                                    <input type="text" name="name" id="title" class="form-control" required="true"
                                           value="{{$category->name}}">
                                    @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <input type="hidden" name="slug" id="slug" required="true"
                                           value="{{$category->slug}}">
                                    @error('slug')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Описание</label>
                                    <textarea class="form-control" rows="5" cols="30" name="description"
                                              required>{{$category->description}}</textarea>
                                    @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>SEO Описание</label>
                                    <textarea class="form-control" rows="5" cols="30"
                                              name="seo_description">{{$category->seo_description}}</textarea>
                                    @error('seo_description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Дополнительно</label>
                                    <br/>
                                    <label class="fancy-checkbox">
                                        <input type="checkbox" name="popular"
                                               data-parsley-errors-container="#error-checkbox" {{ $category->popular == 'on' ? 'checked' : '' }}>
                                        <span>Популярные</span>
                                    </label>
                                    <label class="fancy-checkbox">
                                        <input type="checkbox"
                                               name="recomend" {{ $category->recomend == 'on' ? 'checked' : '' }}>
                                        <span>Рекомендуемые</span>
                                    </label>
                                    <label class="fancy-checkbox">
                                        <input type="checkbox"
                                               name="menu" {{ $category->menu == 'on' ? 'checked' : '' }}>
                                        <span>Add to menu</span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label>Порядковый номер</label>
                                    <input type="number" step="1" min="1" name="sort" id="title" class="form-control"
                                           required value="{{$category->sort}}" style="max-width: 300px">
                                </div>
                                <div class="form-group">
                                    <label>Статус</label>
                                    <br/>
                                    <label class="fancy-radio">
                                        <input type="radio" name="status"
                                               value="true" {{ $category->status == 'true' ? 'checked' : '' }}>
                                        <span><i></i>Активна</span>
                                    </label>
                                    <label class="fancy-radio">
                                        <input type="radio" name="status"
                                               value="false" {{ $category->status == 'false' ? 'checked' : '' }}>
                                        <span><i></i>Неактивна</span>
                                    </label>
                                    @error('status')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <p id="error-radio"></p>
                                </div>


                                <div class="form-group">
                                    <label>Главная картинка</label>
                                    <div class="gallery-single" data-id="{{$category->id}}">
                                        <div class="row">
                                            {{--                                                                        {{dd($images)}}--}}
                                            @if(!is_null($category->image))
                                                <div class="col-md-3">
                                                    <a href="{{asset('assets/uploads/category')}}/{{$category->image}}"
                                                       class="img-gallery-box" data-fancybox="images" data-width="1200"
                                                       style="background-image: url(/assets/uploads/category/{{$category->image}}); background-repeat: no-repeat"
                                                       onclick="event.preventDefault()">
                                                        <div class="trash-block" data-url="{{$category->image}}"
                                                             onclick="removePhoto(this,this.getAttribute('data-url'),'gallery-single');return false;"></div>
                                                    </a>
                                                    <input type="hidden" name="image" value="{{$category->image}}">
                                                </div>
                                            @endif
                                            @error('image')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                            <div class="col-md-3">
                                                <label for="addSinglePhotoInput" class="add-photo">
                                                    <input type="file" name="file" id="addSinglePhotoInput"
                                                           class="input-file-hidden">
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
