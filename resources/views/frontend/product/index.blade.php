@extends('layouts.app')
@section('style')
    <link rel="stylesheet" href="{{ asset('/css/style.css')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.14/css/intlTelInput.css" rel="stylesheet"/>
    <link rel="preload" href="{{ asset('/css/style.min.css')}}" as="style">
    {{--	<link rel="preload" href="{{ asset('/js/script.min.js')}}" as="script">--}}
@endsection
@section('scripts')
    {{--    <script src="{{ asset('/js/script.min.js')}}"></script>--}}
    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>--}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endsection
@section('content')
    <div class="pd38"></div>
    <div class="container">
        <div class="breadcrumbs">
            <a href="" class="home_link"></a>
            <span class="icon icon_arr_right"></span>
            <a href="#">
                Персональный транспорт
            </a>
            <span class="icon icon_arr_right"></span>
            <a href="#">
                Самокати
            </a>
            <span class="icon icon_arr_right"></span>
            <div>
                Электросамокат Название
            </div>
        </div>
    </div>
    <div class="mob_tabs">
        <div class="container">
            <div class="list_tabs_link">
                <a href="#description1" class="ltl_item open" onclick="titleOpen(this)">
                    Все о товаре
                </a>
                <a href="#params" class="ltl_item" onclick="titleOpen(this)">
                    Характеристики
                </a>
                <a href="#reviews" class="ltl_item" onclick="titleOpen(this)">
                    Отзывы (6)
                </a>
            </div>
        </div>
    </div>

    <section class="section_product section">
        <div class="container">
            <div class="wrap_title">
                <h2 class="title_product">
                    {{$product->name}}
                </h2>
                <div class="cod_product">
                    Код товара: {{$product->SKU}}
                </div>
            </div>

            <div class="content-regulations">
                <div class="wrap_tabs">
                    <div class="tabs">
                        <a href="#description" class="tab-title open" onclick="titleOpen(this)">
                            Все о товаре
                        </a>
                        <a href="#params" class="tab-title" onclick="titleOpen(this)">
                            Характеристики
                        </a>
                        <a href="#reviews" class="tab-title" onclick="titleOpen(this)">
                            Отзывы (6)
                        </a>
                    </div>
                    <div class="wrap_star_review">
                        <div class="wrap_star">
                            <div class="icon icon_star active">
                            </div>
                            <div class="icon icon_star active">
                            </div>
                            <div class="icon icon_star active">
                            </div>
                            <div class="icon icon_star active">
                            </div>
                            <div class="icon icon_star">
                            </div>
                        </div>
                        <div class="text_review">
                            6 отзывов
                        </div>
                    </div>
                </div>
                <div class="regulations-content1">
                    <h2 class="title_product_mobile">
                        {{$product->name}}
                    </h2>
                    <div class="mob_cod_product">
                        <div class="cod_product">
                            Код товара: {{$product->SKU}}
                        </div>
                        <div class="availability">
                            <span class="icon icon_check"></span>
                            {{$product->stock_status}}
                        </div>
                    </div>
                    <div class="wrap_content_info">
                        @php
                            $image = json_decode($product->images) ?? [];
                        @endphp
                        <div class="left_content_info">
                            <div class="wrap_slider_product">
                                <div class="slider_product_nav">
                                    @each('frontend.product.components.image-nav', $image, 'item', 'frontend.product.components.empty')

                                </div>
                                <div class="slider_product_for">
                                    @each('frontend.product.components.image-for', $image, 'item', 'frontend.product.components.empty')
                                </div>
                            </div>
                            <div class="description_product wrap_desc" id="description">
                                <h3>
                                    Описание
                                </h3>
                                <div class="wrap_text js-block-open">
                                    <p class="js-block-open1">
                                        {{$product->description}}
                                    </p>
                                    <div class="read_more js-open-btn" onclick="openBlock(this)">Читать полностью</div>
                                </div>
                            </div>
                        </div>
                        <div class="wrap_info_product">
                            <div class="wip_top">
                                <div class="availability">
                                    <span class="icon icon_check"></span>
                                    {{$product->stock_status}}
                                </div>
                            </div>
                            <div class="wrap_mobile_product_price">
                                <div class="wrap_product_price">
                                    <div class="wrap_old_price">
                                        <div class="old_price">
                                            {{ number_format($product->regular_price,2,'.',' ')}}
                                        </div>
                                        <span>грн</span>
                                        <span class="discount">
                                            -{{ round((1- ($product->sale_price/$product->regular_price))*100) }}%
                                        </span>
                                    </div>
                                    <div class="wrap-price">
                                        {{ number_format($product->sale_price,2,'.',' ')}} грн
                                    </div>
                                </div>
                                <div class="wrap_link_option wrap_link_option_mob">
                                    <div class="wrap_link_option">
                                        <a href="#">
                                            <span class="icon icon_mobile2"></span>
                                        </a>
                                        <a href="#">
                                            <span class="icon icon_scales3"></span>
                                        </a>
                                        <a href="#">
                                            <span class="icon icon_heart3"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="wrap_buy_btn">
                                <a href="javascript:void(0);" class="my_btn btn_buy add_to_cart"
                                   data-product-id="{{$product->id}}">
                                    Купить
                                    <span class="icon icon_basket3"></span>
                                </a>
                            </div>
                            <div class="wrap_link_option">
                                <a href="#">
                                    <span class="icon icon_mobile2"></span>
                                    Быстрый заказ
                                </a>
                                <a href="#">
                                    <span class="icon icon_scales3"></span>
                                    Сравнить
                                </a>
                                <a href="#">
                                    <span class="icon icon_heart3"></span>
                                    В избраное
                                </a>
                            </div>
                            <div class="wrap_delivery">
                                <div class="wrap_title_hide" onclick="openMobBlock(this)">
                                    <h3 class="lp_title">
                                        Доставка
                                    </h3>
                                </div>
                                <div class="wrap_table_product js-hide-title">
                                    <div class="table_product">
                                        <div class="tp_item">
                                            <div class="td1">
                                                <span class="icon icon_suitcase"></span>
                                                Самовывоз
                                            </div>
                                            <div class="tp_text">
                                                <div class="td2">
                                                    Можно забрать сегодня
                                                </div>
                                                <div class="td_green">
                                                    Бесплатно
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tp_item">
                                            <div class="td1">
                                                <span class="icon icon_car3"></span>
                                                Служба доставки
                                            </div>
                                            <div class="tp_text">
                                                <div class="td2">
                                                    Отправка сегодня
                                                </div>
                                                <div class="td_green">
                                                    Согласно тарифам службы доставки
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tp_item">
                                            <div class="td1">
                                                <span class="icon icon_man"></span>
                                                Доставка курьером
                                            </div>
                                            <div class="tp_text">
                                                <div class="td2">
                                                </div>
                                                <div class="td_green">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="wrap_payment">
                                <div class="wrap_title_hide" onclick="openMobBlock(this)">
                                    <h3 class="lp_title">
                                        Оплата
                                    </h3>
                                </div>
                                <div class="js-hide-title">
                                    <div class="list_payment">
                                        <div class="icon icon_visa"></div>
                                        <div class="icon icon_mastercard"></div>
                                        <div class="icon icon_google_pay"></div>
                                        <div class="icon icon_apple_pay"></div>
                                        <div class="icon icon_privat24"></div>
                                        <div class="icon icon_pay_part"></div>
                                    </div>
                                    <div class="list_icon_pay">
                                        <div class="cash">
                                            <div class="icon icon_cash"></div>
                                            Наличные
                                        </div>
                                        <div class="non-cash">
                                            <div class="icon icon_non_cash"></div>
                                            Безналичный расчет
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="wrap_warranty">
                                <div class="list_icon_pay">
                                    <div class="cash">
                                        <div class="icon icon_warranty"></div>
                                        Гарантия
                                    </div>
                                    <div class="non-cash">
                                        <div class="icon icon_update"></div>
                                        Обмен и возврат в течение 14 дней
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="wrap_description">
                    <div class="description_product wrap_desc mob_description_product" id="description1">
                        <div class="wrap_title_hide" onclick="openMobBlock(this)">
                            <h3>
                                Описание
                            </h3>
                        </div>
                        <div class="wrap_text js-block-open js-hide-title">
                            <p class="js-block-open1">
                                {{$product->description}}
                            </p>
                            <div class="read_more js-open-btn" onclick="openBlock(this)">Читать полностью</div>
                        </div>
                    </div>
                    <div class="left_desc">
                        <div class="params_product wrap_desc" id="params">
                            <div class="wrap_title_hide" onclick="openMobBlock(this)">
                                <h3>
                                    Характеристики
                                </h3>
                            </div>
                            <div class="js-block-open js-hide-title">
                                <div class="wrap_table_params js-block-open1">
                                    <table class="table_params">

                                        @forelse($product->attribute as $key=>$attribute)
                                            <tr>
                                                <td>
                                                    {{$key}}:
                                                </td>
                                                <td>
                                                    {{$attribute[0]}}
                                                </td>
                                            </tr>
                                        @empty

                                        @endforelse
                                    </table>
                                </div>
                                <div for="tab2" class="read_more js-open-btn" onclick="openBlock(this)">Смотреть все
                                    характеристики
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="review_product wrap_desc js-block-open" id="reviews">
                        <div class="wrap_title_hide" onclick="openMobBlock(this)">
                            <h3>
                                Отзывы
                            </h3>
                        </div>
                        <div class="js-hide-title">
                            <div class="lr_item">
                                <div class="wrap_answer">
                                    <button class="my_btn btn_review btn_review_js">
                                        Оставить отзыв
                                    </button>
                                </div>
                            </div>
                            <div class="wrap_list_review js-block-open">
                                <div class="list_review js-block-open1">
                                    <div class="lr_item ">
                                        <div class="lr_name">
                                            <span>
                                                Игорь
                                            </span>
                                            <span>
                                                18 августа 2017
                                            </span>
                                        </div>
                                        <div class="lr_text">
                                            Здесь указано , что тип подшипников: гидродинамический (FDB).
                                            На сайте производителя данного кулера указано,
                                            что на него установлен вентилятор ThermalRight TY-147A ,
                                            у которого тип подшипника ни как не FDB,
                                            а Enhanced Hyper-Flow Bearing (EHFB).
                                            Исправьте пожалуйста.
                                        </div>
                                        <div class="wrap_answer">
                                            <button class="btn_answer" onclick="openAnswer(this)">
                                                Ответить
                                            </button>
                                            <div class="wrap_useful">
                                                <span>
                                                    Отзыв полезен?
                                                </span>
                                                <div class="link_like" like="true" onclick="likeAdd(this)">
                                                    <span class="icon icon_like"></span>
                                                    <span class="ll_single">1</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="lr_item">
                                        <div class="lr_name">
                                            <span>
                                                Игорь
                                            </span>
                                            <span>
                                                18 августа 2017
                                            </span>
                                        </div>
                                        <div class="lr_text">
                                            Здесь указано , что тип подшипников: гидродинамический (FDB).
                                            На сайте производителя данного кулера указано,
                                            что на него установлен вентилятор ThermalRight TY-147A ,
                                            у которого тип подшипника ни как не FDB,
                                            а Enhanced Hyper-Flow Bearing (EHFB).
                                            Исправьте пожалуйста.
                                            Здесь указано , что тип подшипников: гидродинамический (FDB).
                                            На сайте производителя данного кулера указано,
                                            что на него установлен вентилятор ThermalRight TY-147A ,
                                            у которого тип подшипника ни как не FDB,
                                            а Enhanced Hyper-Flow Bearing (EHFB).
                                            Исправьте пожалуйста.
                                        </div>
                                        <div class="wrap_answer">
                                            <button class="btn_answer" onclick="openAnswer(this)">
                                                Ответить
                                            </button>
                                            <div class="wrap_useful">
                                                <span>
                                                    Отзыв полезен?
                                                </span>
                                                <div class="link_like" like="true" onclick="likeAdd(this)">
                                                    <span class="icon icon_like"></span>
                                                    <span class="ll_single">1</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="lr_item">
                                        <div class="lr_name">
                                            <span>
                                                Игорь
                                            </span>
                                            <span>
                                                18 августа 2017
                                            </span>
                                        </div>
                                        <div class="lr_text">
                                            Здесь указано , что тип подшипников: гидродинамический (FDB).
                                            На сайте производителя данного кулера указано,
                                            что на него установлен вентилятор ThermalRight TY-147A ,
                                            у которого тип подшипника ни как не FDB,
                                            а Enhanced Hyper-Flow Bearing (EHFB).
                                            Исправьте пожалуйста.
                                        </div>
                                        <div class="wrap_answer">
                                            <button class="btn_answer" onclick="openAnswer(this)">
                                                Ответить
                                            </button>
                                            <div class="wrap_useful">
                                                <span>
                                                    Отзыв полезен?
                                                </span>
                                                <div class="link_like" like="true" onclick="likeAdd(this)">
                                                    <span class="icon icon_like"></span>
                                                    <span class="ll_single">1</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="lr_item">
                                        <div class="lr_name">
                                            <span>
                                                Игорь
                                            </span>
                                            <span>
                                                18 августа 2017
                                            </span>
                                        </div>
                                        <div class="lr_text">
                                            Здесь указано , что тип подшипников: гидродинамический (FDB).
                                            На сайте производителя данного кулера указано,
                                            что на него установлен вентилятор ThermalRight TY-147A ,
                                            у которого тип подшипника ни как не FDB,
                                            а Enhanced Hyper-Flow Bearing (EHFB).
                                            Исправьте пожалуйста.
                                        </div>
                                        <div class="wrap_answer">
                                            <button class="btn_answer" onclick="openAnswer(this)">
                                                Ответить
                                            </button>
                                            <div class="wrap_useful">
                                                <span>
                                                    Отзыв полезен?
                                                </span>
                                                <div class="link_like" like="true" onclick="likeAdd(this)">
                                                    <span class="icon icon_like"></span>
                                                    <span class="ll_single">1</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="lr_item">
                                        <div class="lr_name">
                                            <span>
                                                Игорь
                                            </span>
                                            <span>
                                                18 августа 2017
                                            </span>
                                        </div>
                                        <div class="lr_text">
                                            Здесь указано , что тип подшипников: гидродинамический (FDB).
                                            На сайте производителя данного кулера указано,
                                            что на него установлен вентилятор ThermalRight TY-147A ,
                                            у которого тип подшипника ни как не FDB,
                                            а Enhanced Hyper-Flow Bearing (EHFB).
                                            Исправьте пожалуйста.
                                        </div>
                                        <div class="wrap_answer">
                                            <button class="btn_answer" onclick="openAnswer(this)">
                                                Ответить
                                            </button>
                                            <div class="wrap_useful">
                                                <span>
                                                    Отзыв полезен?
                                                </span>
                                                <div class="link_like" like="true" onclick="likeAdd(this)">
                                                    <span class="icon icon_like"></span>
                                                    <span class="ll_single">1</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="read_more js-open-btn" onclick="openBlock(this)">Смотреть все отзывы</div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section_category section">
        <div class="container">
            <div class="category_content">
                <h3>
                    Рекомендуемые товары
                </h3>
                <div class="list_product">
                    @each('frontend.product.components.similar_product',$similar_products,'item','frontend.product.components.empty')
                    <div class="item_product">
                        <a href="#" class="wrap_img">
                            <picture>
                                <source srcset="./img/product.webp" type="image/webp">
                                <img src="./img/product.png" alt="img"></picture>
                        </a>
                        <a href="#" class="name_product">
                            Телевизор Gazer 43" Full HD Smart TV (TV43-FS2)
                        </a>
                        <div class="wrap_compare">
                            <div class="icon" onclick="addFavorite(this)">
                                <svg class="svg-scales">
                                    <use xlink:href="#svg-scales"></use>
                                </svg>
                            </div>
                            <div class="icon" onclick="addFavorite(this)">
                                <svg class="svg-heart">
                                    <use xlink:href="#svg-heart"></use>
                                </svg>
                            </div>
                        </div>
                        <div class="wrap_basket">
                            <div class="price_product">
                                <div class="old_price">
                                    <p>29 499 грн.</p>
                                    <span>-7%</span>
                                </div>
                                <div class="new_price">
                                    12 699 грн.
                                </div>
                            </div>
                            <button class="my_btn btn_basket" onclick="addBusked(this)">
                                <div class="icon icon_basket2"></div>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script>
        function openMobBlock(elem) {
            if ($(window).width() <= '767') {
                $(elem).siblings('.js-hide-title').toggleClass('d-none')
                $(elem).toggleClass('close')
            }

        }

        function openBlock(elem) {
            $(elem).addClass('d-none')
            $(elem).parent('.js-block-open').find('.js-block-open1').addClass('openBlock')

        }

        function titleOpen(elem) {
            var tab = $(elem);
            $(tab).addClass("open");
            $(tab).siblings(".tab-title").removeClass("open");
            $(tab).siblings(".ltl_item").removeClass("open");

        }


        function likeAdd(elem) {
            if ($(elem).attr('like') != 'false') {
                $(elem).attr('like', 'false')
                let like = $(elem).find($('.ll_single')).html()
                like = Number(like)
                like += 1
                $(elem).find($('.ll_single')).html(like)
            }
        }

        function openAnswer(elem) {
            let parent = $(elem).parent('.wrap_answer').parent('.lr_item')

            if ($('.formAnswer').parent().is($(parent))) {
                $(parent).find('.formAnswer').remove()
            } else {
                $(parent).append($('<form action="" class="formAnswer">\n' +
                    '<textarea></textarea>\n' +
                    '<button class="answer_btn my_btn">\n' +
                    'Отправить\n' +
                    '</button>\n' +
                    '</form>'))
            }
        }
    </script>
@endsection
