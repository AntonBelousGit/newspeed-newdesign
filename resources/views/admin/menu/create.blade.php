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
                    <h2>Create menu</h2>
                </div>
                <div class="col-md-6 col-sm-12 text-right">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item">Menu</li>
                        <li class="breadcrumb-item active">Create menu</li>
                    </ul>
                </div>
            </div>
        </div>

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <span class="text-danger">{{$error}}</span>
            @endforeach
        @endif

        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <h2>Create menu</h2>
                        </div>
                        <div class="body">
                            <form id="basic-form" method="post" action="{{ route('admin.menu.store') }}">
                                @csrf
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect01">Parent menu</label>
                                    </div>
                                    <select class="custom-select" id="inputGroupSelect01" name="menu_id">
                                        <option selected="" value="parent">Parent menu</option>
                                        @foreach($parent_menus as $item)
                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect02">Parent menu type</label>
                                    </div>
                                    <select class="custom-select" id="inputGroupSelect02" name="type">
                                        <option value="category">Category</option>
                                        <option value="product">Product</option>
                                        <option value="custom">Custom</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Menu item name</label>
                                    <input type="text" name="name" id="title" class="form-control" required value="">
                                </div>

                                <div class="form-group">
                                    <label>Slug</label>
                                    <input type="text" name="slug" id="slug" class="form-control" required value="">
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <br>
                                    <label class="fancy-radio">
                                        <input type="radio" name="status" value="1">
                                        <span><i></i>Active</span>
                                    </label>
                                    <label class="fancy-radio">
                                        <input type="radio" name="status" value="0">
                                        <span><i></i>Inactive</span>
                                    </label>
                                    <p id="error-radio"></p>
                                </div>
                                <div class="form-group">
                                    <label>Порядковый номер</label>
                                    <input type="number" step="1" min="1" name="sort" id="title" class="form-control"
                                           required="true" value="" style="max-width: 300px">
                                </div>
                                <div class="form-group">
                                    <label>Product category</label>
                                    <input type="text" id="search" class="form-control">
                                    <div id="display"></div>
                                </div>

                                <div class="form-group">
                                    <label>ICON</label>
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
    <script src="{{asset('adminka/js/addPhotoMenu.js')}}"></script>
    <script src="{{asset('adminka/js/removePhotoMenu.js')}}"></script>
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
    </script>


    <script>
        $(document).ready(function() {

            // Обработчик события keyup, сработает после того как пользователь отпустит кнопку, после ввода чего-либо в поле поиска.
            // Поле поиска из файла 'index.php' имеет id='search'
            $("#search").keyup(function() {

                // Присваиваем значение из поля поиска, переменной 'name'.
                var name = $('#search').val();

                // Проверяем если значение переменной 'name' является пустым
                if (name === "") {

                    // Если переменная 'name' имеет пустое значение, то очищаем блок div с id = 'display'
                    $("#display").html("");

                }
                else {
                    // Иначе, если переменная 'name' не пустая, то вызываем ajax функцию.

                    $.ajax({

                        type: "POST", // Указываем что будем обращатся к серверу через метод 'POST'
                        url: "{{route('admin.category.search-by-name')}}", // Указываем путь к обработчику. То есть указывем куда будем отправлять данные на сервере.
                        data: {
                            // В этом объекте, добавляем данные, которые хотим отправить на сервер
                            search: name, // Присваиваем значение переменной 'name', свойству 'search'.
                            _token: '{{csrf_token()}}'
                        },
                        success: function(response) {
                            // Если ajax запрос выполнен успешно, то, добавляем результат внутри div, у которого id = 'display'.

                            console.log(response.data)

                            // $("#display").html(response).show();
                        }

                    });

                }

            });

        });

        function fill(Value) {
            // Функция 'fill', является обработчиком события 'click'.
            // Она вызывается, когда пользователь кликает по элементу из результата поиска.

            $('#search').val(Value); // Берем значение элемента из результата поиска и добавляем его в значение поля поиска

            $('#display').hide(); // Скрываем результаты поиска

        }
    </script>
@endsection
