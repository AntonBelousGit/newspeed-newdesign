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
