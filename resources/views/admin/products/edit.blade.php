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
                    <h2>Создать продукт</h2>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item">Продукты</li>
                        <li class="breadcrumb-item active">Новый</li>
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
                            <form id="basic-form" method="post" action="{{route('admin.products.update',$product)}}"
                                  enctype="multipart/form-data">
                                @method("PUT")
                                @csrf
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect01">Выбрать
                                            категорию</label>
                                    </div>
                                    <select class="custom-select" id="inputGroupSelect01" name="category_id">
                                        <option selected="">Категория</option>
                                        @foreach($categories as $item)
                                            <option value="{{$item->id}}"
                                                    @if($product->category_id == $item->id) selected @endif >{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect01">Выбрать бренд</label>
                                    </div>
                                    <select class="custom-select" id="inputGroupSelect01" name="brand_id">
                                        @foreach($brands as $item)
                                            <option value="{{$item->id}}"
                                                    @if($product->brand_id == $item->id) selected @endif >{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Название продукта</label>
                                    <input type="text" name="name" class="form-control" id="title" required="true"
                                           value="{{$product->name}}">
                                    <input type="hidden" name="slug" id="slug" required="true"
                                           value="{{$product->slug}}">
                                    @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Описание</label>
                                    <textarea class="form-control" rows="5" cols="30" name="description"
                                              required>{{$product->description}}</textarea>
                                    @error('description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Короткое описание</label>
                                    <textarea class="form-control" rows="5" cols="30" name="short_description"
                                              required>{{$product->short_description}}</textarea>
                                    @error('short_description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>SEO Описание</label>
                                    <textarea class="form-control" rows="5" cols="30"
                                              name="seo_description">{{$product->seo_description}}</textarea>
                                    @error('seo_description')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Дополнительно</label>
                                    <br/>
                                    <label class="fancy-checkbox">
                                        <input type="checkbox" name="featured"
                                               @if($product->featured == 1) checked @endif>
                                        <span>Рекомендуемые</span>
                                    </label>
                                    @error('featured')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <p id="error-checkbox"></p>

                                    <label>SKU</label>
                                    <input type="text" name="SKU" class="form-control" required="true"
                                           value="{{$product->SKU}}">
                                    @error('SKU')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <label>Количество</label>
                                    <input type="number" min="0" step="1" name="quantity" class="form-control"
                                           required="true" value="{{$product->quantity}}">
                                    @error('quantity')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <label>Обычная цена</label>
                                    <input type="number" min="0" step="0.01" name="regular_price" class="form-control"
                                           required="true" value="{{$product->regular_price}}">
                                    @error('regular_price')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    <label>Продажная цена</label>
                                    <input type="number" min="0" step="0.01" name="sale_price" class="form-control"
                                           required="true" value="{{$product->sale_price}}">
                                    @error('sale_price')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect02">Статус товара</label>
                                    </div>

                                    <select class="custom-select" id="inputGroupSelect02" name="stock_status">
                                        <option selected="">----</option>
                                        <option value="instock"
                                                @if($product->stock_status == 'instock') selected @endif>Активна
                                        </option>
                                        <option value="outofstock"
                                                @if($product->stock_status == 'outofstock') selected @endif>Неактивна
                                        </option>
                                    </select>

                                    @error('stock_status')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{--                                <div class="">--}}
                                {{--                                    <div class="image">--}}
                                {{--                                        <img src="{{asset('assets/uploads/products')}}/{{$product->image}}" data-image="{{$product->image}}" alt="img">--}}
                                {{--                                    </div>--}}
                                {{--                                    <input type="file" id="dropify-event" name="image">--}}
                                {{--                                </div>--}}

                                <div class="form-group">
                                    <label>Главная картинка</label>
                                    <div class="gallery-single" data-id="{{$product->id}}">
                                        <div class="row">
                                            {{--                                                                        {{dd($images)}}--}}
                                            @if(!is_null($product->image))
                                                <div class="col-md-3">
                                                    <a href="{{asset('assets/uploads/products')}}/{{$product->image}}"
                                                       class="img-gallery-box" data-fancybox="images" data-width="1200"
                                                       style="background-image: url(/assets/uploads/products/{{$product->image}}); background-repeat: no-repeat"
                                                       onclick="event.preventDefault()">
                                                        <div class="trash-block" data-url="{{$product->image}}"
                                                             onclick="removePhoto(this,this.getAttribute('data-url'));return false;"></div>
                                                    </a>
                                                    <input type="hidden" name="image" value="{{$product->image}}">
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
                                @php
                                    $images = json_decode($product->images,true);
                                    if(is_null($images))
                                    {
                                        $images = [];
                                    }
                                @endphp
                                <br>
                                <div class="form-group">
                                    <label>Галерея</label>
                                    <div class="gallery" data-id="{{$product->id}}">
                                        <div class="row">
                                            {{--                                                                        {{dd($images)}}--}}
                                            @if(count($images) > 0)
                                                @foreach($images as $image)
                                                    <div class="col-md-3">
                                                        <a href="{{asset('assets/uploads/products')}}/{{$image}}"
                                                           class="img-gallery-box" data-fancybox="images"
                                                           data-width="1200"
                                                           style="background-image: url(/assets/uploads/products/{{$image}}); background-repeat: no-repeat"
                                                           onclick="event.preventDefault()">
                                                            <div class="trash-block" data-url="{{$image}}"
                                                                 onclick="removePhoto(this,this.getAttribute('data-url'));return false;"></div>
                                                        </a>
                                                        <input type="hidden" name="gallery[]" value="{{$image}}">
                                                    </div>
                                                @endforeach
                                            @endif
                                            <div class="col-md-3">
                                                <label for="addPhotoInput" class="add-photo">
                                                    <input type="file" name="file" id="addPhotoInput"
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
    <script src="{{asset('adminka/js/addPhoto.js')}}"></script>
    <script src="{{asset('adminka/js/removePhoto.js')}}"></script>
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

        // создание второго селекта после полученных данных
        function r_handler(elem, respons, id) {
            var tmpelem = $(elem).parent('td').parent('tr').find('td:nth-child(2)')

            var str = '<select class="js-example-basic-single" name="state['+ id +'][]" onchange="addSelect(this)">'
            for (var i = 0; i < respons.length; i++) {
                str = str + '<option value="' + respons[i].id + '">' + respons[i].value + '</option>'
            }
            str = str + '<option value="Add" data-for="'+ id +'">Добавить</option></select>'

            $(tmpelem).find('.wrap_add_input').remove();

            $(tmpelem).find('select').remove();
            $(tmpelem).find('span.select2').remove();


            $(str).appendTo($(tmpelem))
            $('.js-example-basic-single').select2();
        }

        // получение данных в зависимости от выбраного пункта в селекте
        function getSelect(elem) {

            var r_path = '/attribute/get-value/';
            var r_args = $(elem).val();
            // let value = $(elem).find('option:selected').text();
            $.ajax({
                url: r_path,
                type: "POST",
                data: {
                    id: r_args
                },
                success: function (response) {
                    // console.log(response)
                    r_handler(elem, response, r_args)
                },
                error: function (response) {

                }
            });

        }

        // создает селект при добавлении нового атрибута
        function createSelect(respons) {
            console.log(respons)
            var str = '<select class="js-example-basic-single" name="" onchange="getSelect(this)"><option value="Выберите" disabled selected>Выберите</option>'
            for (var i = 0; i < respons.length; i++) {
                str = str + '<option value="' + respons[i].id + '" name="attribute">' + respons[i].name + '</option>'
            }
            str = str + '</select>'

            $('<tr><td style="width: 20%;">' +
                str +
                '</td>' +
                '<td>' +
                '</td>' +
                '<td class="text-right" style="width: 20%;">' +
                '<button type="button" onclick="removeTr(this);">' +
                '<i class="fa fa-minus-circle"></i>' +
                '</button>' +
                '</td>' +
                '</tr>').appendTo('table.table tbody')

            $('.js-example-basic-single').select2();
        }

        // добавить новый атрибут
        function addAttribute() {

            var r_path = '/attribute/get-attribute/';

            $.ajax({
                url: r_path,
                type: "POST",
                success: function (response) {
                    // console.log(response)
                    createSelect(response)
                },
                error: function (response) {
                    console.log(response)
                }
            });
        }

        function addSelect(elem) {
            if ($(elem).val() == 0) return false
            if ($(elem).val() == 'Add') {
                let add_to = $(elem).find("option:selected").attr('data-for');
                $('<div class="wrap_add_input"><input type="text" name="addAttribute['+ add_to +'][]"></div>').appendTo($(elem).parent('td'))
            }
            if ($(elem).val() != 'Add') {
                $(elem).siblings('.wrap_add_input').remove()
            }
        }

        // удаление строки таблицы
        function removeTr(elem) {
            $(elem).parent('td').parent('tr').remove();
        }

        // переключатель табов
        function titleOpen(elem) {
            var tab = $(elem);
            $(tab).siblings(".tab-title").removeClass("open");
            $(tab).addClass("open");
        }

        $(function () {
            $('.js-example-basic-single').select2();
        })
    </script>
@endsection
