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
                    <h2>Обновить продукт</h2>
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
            <div class="content-regulations">
                <form id="basic-form" method="post" action="{{route('admin.products.update',$product)}}"
                      enctype="multipart/form-data">
                    @method("PUT")
                    @csrf
                    <div class="wrap_tabs">
                        <div class="tabs">
                            <label for="tab1" class="tab-title open" onclick="titleOpen(this)">
                                Главаная
                            </label>
                            <label for="tab2" class="tab-title" onclick="titleOpen(this)">
                                Добавить атрибуты
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary btn_save">
                            <svg version="1.0" xmlns="http://www.w3.org/2000/svg"
                                 width="1280.000000pt" height="1280.000000pt" viewBox="0 0 1280.000000 1280.000000"
                                 preserveAspectRatio="xMidYMid meet">
                                <metadata>
                                    Created by potrace 1.15, written by Peter Selinger 2001-2017
                                </metadata>
                                <g transform="translate(0.000000,1280.000000) scale(0.100000,-0.100000)"
                                   stroke="none">
                                    <path d="M0 6400 l0 -6400 6400 0 6400 0 0 5200 0 5200 -1200 1200 -1200 1200
                            -400 0 -400 0 0 -2600 0 -2600 -3200 0 -3200 0 0 2600 0 2600 -1600 0 -1600 0
                            0 -6400z m11200 -2800 l0 -2800 -4800 0 -4800 0 0 2800 0 2800 4800 0 4800 0
                            0 -2800z"/>
                                    <path d="M2400 5200 l0 -400 4000 0 4000 0 0 400 0 400 -4000 0 -4000 0 0
                            -400z"/>
                                    <path d="M2400 3600 l0 -400 4000 0 4000 0 0 400 0 400 -4000 0 -4000 0 0
                            -400z"/>
                                    <path d="M2400 2000 l0 -400 4000 0 4000 0 0 400 0 400 -4000 0 -4000 0 0
                            -400z"/>
                                    <path d="M7200 10200 l0 -1800 800 0 800 0 0 1800 0 1800 -800 0 -800 0 0
                            -1800z"/>
                                </g>
                            </svg>
                        </button>
                    </div>
                    <div class="tabs-content">
                        <div class="wrap-regulations-content">
                            <input type="radio" name="tab-group" class="tab" id="tab1" checked>
                            <div class="regulations-content">
                                <div class="container-fluid">
                                    <div class="row clearfix">
                                        <div class="col-md-12">
                                            <div class="card">
                                                <div class="header">
                                                    <h2>Обновить продукт</h2>
                                                </div>
                                                <div class="body">
                                                    <div>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <label class="input-group-text"
                                                                       for="inputGroupSelect01">Выбрать
                                                                    категорию</label>
                                                            </div>
                                                            <select class="custom-select" id="inputGroupSelect01"
                                                                    name="category_id">
                                                                <option selected="">Категория</option>
                                                                @foreach($categories as $item)
                                                                    <option value="{{$item->id}}"
                                                                            @if($product->category_id == $item->id) selected @endif >{{$item->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <label class="input-group-text"
                                                                       for="inputGroupSelect01">Выбрать бренд</label>
                                                            </div>
                                                            <select class="custom-select" id="inputGroupSelect01"
                                                                    name="brand_id">
                                                                @foreach($brands as $item)
                                                                    <option value="{{$item->id}}"
                                                                            @if($product->brand_id == $item->id) selected @endif >{{$item->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="label_input"><span class="star">*</span>Название
                                                                продукта</label>
                                                            <input type="text" name="name" class="form-control"
                                                                   id="title" required="true"
                                                                   value="{{$product->name}}">
                                                            <input type="hidden" name="slug" id="slug" required="true"
                                                                   value="{{$product->slug}}">
                                                            @error('name')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="label_input"><span class="star">*</span>Описание</label>
                                                            <textarea class="form-control" rows="5" cols="30"
                                                                      name="description"
                                                                      required>{{$product->description}}</textarea>
                                                            @error('description')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="label_input"><span class="star">*</span>Короткое
                                                                описание</label>
                                                            <textarea class="form-control" rows="5" cols="30"
                                                                      name="short_description"
                                                                      required>{{$product->short_description}}</textarea>
                                                            @error('short_description')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="label_input"><span class="star">*</span>SEO
                                                                Описание</label>
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

                                                            <label class="label_input"><span
                                                                    class="star">*</span>SKU</label>
                                                            <input type="text" name="SKU" class="form-control"
                                                                   required="true"
                                                                   value="{{$product->SKU}}">
                                                            @error('SKU')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                            <label class="label_input"><span class="star">*</span>Количество</label>
                                                            <input type="number" min="0" step="1" name="quantity"
                                                                   class="form-control"
                                                                   required="true" value="{{$product->quantity}}">
                                                            @error('quantity')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                            <label class="label_input"><span
                                                                    class="star">*</span>Цена</label>
                                                            <input type="number" min="0" step="0.01"
                                                                   name="regular_price" class="form-control"
                                                                   required="true" value="{{$product->regular_price}}">
                                                            @error('regular_price')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                            <label class="label_input"><span class="star">*</span>Акционная
                                                                цена</label>
                                                            <input type="number" min="0" step="0.01" name="sale_price"
                                                                   class="form-control"
                                                                   required="true" value="{{$product->sale_price}}">
                                                            @error('sale_price')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend">
                                                                <label class="input-group-text"
                                                                       for="inputGroupSelect02">Статус товара</label>
                                                            </div>

                                                            <select class="custom-select" id="inputGroupSelect02"
                                                                    name="stock_status">
                                                                <option selected="">----</option>
                                                                <option value="instock"
                                                                        @if($product->stock_status == 'instock') selected @endif>
                                                                    Активна
                                                                </option>
                                                                <option value="outofstock"
                                                                        @if($product->stock_status == 'outofstock') selected @endif>
                                                                    Неактивна
                                                                </option>
                                                            </select>

                                                            @error('stock_status')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="label_input"><span class="star">*</span>Главная
                                                                картинка</label>
                                                            <div class="gallery-single" data-id="{{$product->id}}">
                                                                <div class="row">
                                                                    {{--                                                                        {{dd($images)}}--}}
                                                                    @if(!is_null($product->image))
                                                                        <div class="col-md-3">
                                                                            <a href="{{asset('assets/uploads/products')}}/{{$product->image}}"
                                                                               class="img-gallery-box"
                                                                               data-fancybox="images" data-width="1200"
                                                                               style="background-image: url(/assets/uploads/products/{{$product->image}}); background-repeat: no-repeat"
                                                                               onclick="event.preventDefault()">
                                                                                <div class="trash-block"
                                                                                     data-url="{{$product->image}}"
                                                                                     onclick="removePhotoSingle(this,this.getAttribute('data-url'));return false;"></div>
                                                                            </a>
                                                                            <input type="hidden" name="image"
                                                                                   value="{{$product->image}}">
                                                                        </div>
                                                                    @endif
                                                                    @error('image')
                                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                                    @enderror
                                                                    <div class="col-md-3">
                                                                        <label for="addSinglePhotoInput"
                                                                               class="add-photo">
                                                                            <input type="file" name="file"
                                                                                   id="addSinglePhotoInput"
                                                                                   class="input-file-hidden">
                                                                            <div class="add-photo-title text-center">
                                                                                <img src="{{asset('img/plus.svg')}}"
                                                                                     style="width: 20px;">
                                                                                <div class="dark-blue font-12 medium">
                                                                                    Добавить фото
                                                                                </div>
                                                                            </div>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div id="photo-error-message"
                                                                     class="error-message mb-1"></div>
                                                                <small class="form-text text-muted">Изображения. До
                                                                    200КБ
                                                                    файл</small>
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
                                                            <label class="label_input"><span class="star">*</span>Галерея</label>
                                                            <div class="gallery" data-id="{{$product->id}}">
                                                                <div class="row">
                                                                    @if(count($images) > 0)
                                                                        @foreach($images as $image)
                                                                            <div class="col-md-3">
                                                                                <a href="{{asset('assets/uploads/products')}}/{{$image}}"
                                                                                   class="img-gallery-box"
                                                                                   data-fancybox="images"
                                                                                   data-width="1200"
                                                                                   style="background-image: url(/assets/uploads/products/{{$image}}); background-repeat: no-repeat"
                                                                                   onclick="event.preventDefault()">
                                                                                    <div class="trash-block"
                                                                                         data-url="{{$image}}"
                                                                                         onclick="removePhoto(this,this.getAttribute('data-url'));return false;"></div>
                                                                                </a>
                                                                                <input type="hidden" name="gallery[]"
                                                                                       value="{{$image}}">
                                                                            </div>
                                                                        @endforeach
                                                                    @endif
                                                                    <div class="col-md-3">
                                                                        <label for="addPhotoInput" class="add-photo">
                                                                            <input type="file" name="file"
                                                                                   id="addPhotoInput"
                                                                                   class="input-file-hidden">
                                                                            <div class="add-photo-title text-center">
                                                                                <img src="{{asset('img/plus.svg')}}"
                                                                                     style="width: 20px;">
                                                                                <div class="dark-blue font-12 medium">
                                                                                    Добавить фото
                                                                                </div>
                                                                            </div>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                                <div id="photo-error-message"
                                                                     class="error-message mb-1"></div>
                                                                <small class="form-text text-muted">Изображения. До
                                                                    200КБ
                                                                    файл</small>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <button type="submit" class="btn btn-primary">Сохранить</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="wrap-regulations-content">
                            <input type="radio" name="tab-group" class="tab" id="tab2">
                            <div class="regulations-content">
                                <div class="wrap_inputs">
                                    <table id="attribute" class="table table-striped table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <td>Атрибут</td>
                                            <td>Текст</td>
                                            <td></td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($product->attribute as $key => $value)
                                            @forelse($value as $attribute_item)
                                                <tr>
                                                    <td style="width: 20%;">
                                                        <select class="js-example-basic-single first_select" name=""
                                                                onchange="getSelect(this)">
                                                            @foreach($attributes as $item)
                                                                <option
                                                                    value="{{$item->code}}" {{$item->code == $key? 'selected':''}}> {{$item->name}} </option>
                                                            @endforeach

                                                        </select>
                                                    </td>
                                                    <td>
                                                        <select class="js-example-basic-single" name="state[{{$key}}][]"
                                                                onchange="getSelect(this)">
                                                            @foreach($attributes->where('code',$key)->first()->values as $item)
                                                                <option
                                                                    value="{{$item->value}}" {{$item->value == $attribute_item? 'selected':''}}> {{$item->value}} </option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <td class="text-right" style="width: 20%;">
                                                        <button type="button" onclick="removeTr(this)">
                                                            <i class="fa fa-minus-circle"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            @empty

                                            @endforelse
                                        @empty

                                        @endforelse
                                        <tr>
                                            <td style="width: 20%;">
                                                <select class="js-example-basic-single first_select" name=""
                                                        onchange="getSelect(this)">
                                                    <option value="Выберите" disabled selected>Выберите</option>
                                                    @foreach($attributes as $item)
                                                        <option
                                                            value="{{$item->code}}"> {{$item->name}}</option>
                                                    @endforeach

                                                </select>
                                            </td>
                                            <td>
                                            </td>
                                            <td class="text-right" style="width: 20%;">
                                                <button type="button" onclick="removeTr(this)">
                                                    <i class="fa fa-minus-circle"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <td colspan="2"></td>
                                            <td class="text-right">
                                                <button type="button" onclick="addAttribute()">
                                                    <i class="fa fa-plus-circle"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        </tfoot>
                                    </table>
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

            <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
            <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

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

                function r_handler(elem, respons, code) {
                    var tmpelem = $(elem).parent('td').parent('tr').find('td:nth-child(2)')

                    var str = '<select class="js-example-basic-single" name="state[' + code + '][]" onchange="addSelect(this)">'
                    for (var i = 0; i < respons.values.length; i++) {
                        str = str + '<option value="' + respons.values[i].value + '">' + respons.values[i].value + '</option>'
                    }
                    str = str + '<option value="Add" data-for="' + code + '">Добавить</option></select>'

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
                        type: "GET",
                        data: {
                            code: r_args
                        },
                        success: function (response) {
                            r_handler(elem, response, r_args)
                        },
                        error: function (response) {

                        }
                    });

                }

                // создает селект при добавлении нового атрибута
                function createSelect(respons) {
                    var str = '<select class="js-example-basic-single" name="" onchange="getSelect(this)"><option value="Выберите" disabled selected>Выберите</option>'
                    for (var i = 0; i < respons.length; i++) {
                        str = str + '<option value="' + respons[i].code + '" name="attribute">' + respons[i].name + '</option>'
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
                            createSelect(response)
                        },
                        error: function (response) {
                            console.log(response)
                        }
                    });
                }

                function addSelect(elem) {
                    console.log(elem);
                    if ($(elem).val() == 0) return false
                    if ($(elem).val() == 'Add') {
                        let add_to = $(elem).find("option:selected").attr('data-for');
                        $('<div class="wrap_add_input"><input type="text" name="addAttribute[' + add_to + '][]"></div>').appendTo($(elem).parent('td'))
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
