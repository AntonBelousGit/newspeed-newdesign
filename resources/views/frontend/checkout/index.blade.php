@extends('layouts.app')

@section('style')
    <link rel="stylesheet" href="{{ asset('/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{ asset('/css/style.css')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.14/css/intlTelInput.css" rel="stylesheet"/>
    <link rel="preload" href="{{ asset('/css/style.min.css')}}" as="style">
    <link rel="stylesheet" href="{{ asset('/css/order.css')}}">

    {{--	<link rel="preload" href="{{ asset('/js/script.min.js')}}" as="script">--}}
@endsection
@section('scripts')
    <script src="{{ asset('/js/script.min.js')}}"></script>
    <script src="{{ asset('/js/script.js')}}"></script>
    <script src="{{ asset('/js/checkout.js')}}"></script>
    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>--}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

@endsection

@section('content')
        <div class="baners bg-Cw">
            <div class="container">
                <form class="order-body" action="#">
                    <div class="order-left" id="tabs-list">
                        <ul class="order-left-tabList">
                            <li class="tab active tab-left text-sb text-sb-l text-sb-m">Я впервые покупаю здесь</li>
                            <li class="tab tab-right text-sb text-sb-l text-sb-m">Я уже совершал покупки</li>
                        </ul>
                        <div class="order-left-box content-tab active">
                            <div class="order-left-form">
                                <input class="tel" type="tel" name="tel" placeholder='Телефон'>
                                <input class="" type="text" placeholder="Пароль">
                                <input class="" type="text" placeholder="Имя">
                                <input class="" type="text" placeholder="Фамилия">
                                <input class="" type="email" placeholder="E-mail">
                            </div>
                        </div>
                        <div class="order-left-box content-tab">

                        </div>
                    </div>
                    <div class="order-left2">
                        <div class="deliver-pay">
                            <h2 class="text-sb text-sb-xxl">Оплата</h2>
                            <div class="pay-box">
                                <label for="nalForTake">
                                    <input id="nalForTake" type="radio" name="payment" checked>
                                    <span class="text-r text-r-l">Наличными при получении</span>
                                </label>
                                <label for="imposed">
                                    <input id="imposed" type="radio" name="payment">
                                    <span class="text-r text-r-l">Наложеным платежом</span>
                                </label>
                                <label for="cashless">
                                    <input id="cashless" type="radio" name="payment">
                                    <span class="text-r text-r-l">Безналичный расчет (только для юридических лиц)</span>
                                </label>
                                <label for="paymentСard">
                                    <input id="paymentСard" type="radio" name="payment">
                                    <span class="pz">
                                <span class="text-r text-r-l">Оплата картой</span>
                                <img src="./img/visa.png" alt="">
                                <img src="./img/mastercard.png" alt="">
                                <img src="./img/master.png" alt="">
                            </span>
                                </label>
                            </div>
                            <h2 class="text-sb text-sb-xxl">Доставка</h2>
                            <p class="text-sb text-sb-m">Доставка в <span class="text-r text-r-l text-r-darckBlue und">Днепр</span>
                            </p>
                            <div class="deliver-box">
                                <label class="deliver-box-label" for="pickupStore">
                                    <input type="radio" id="pickupStore" name="delivery" checked>
                                    <span class="label-up">
                                <span class=label-up-l">
                                    <span class="text-r text-r-l"><i
                                            class="icon-"></i>  Самовывоз из нашего магазина</span>
                                </span>
                                <span class="label-up-r text-r text-r-l green">
                                    Бесплатно
                                </span>
                            </span>
                                    <span class="label-down">
                                <span class="label-down-select">
                                    <span class="text-r text-r-m text-r-greey">
                                        Забрать завтра с 12:00 до 18:00
                                    </span>
                                    <select class="js-example-basic-single">
                                        <option value="1" selected>--</option>
                                        <option value="2">Днепр, пр-кт Д.Яворницкого, 123</option>
                                    </select>
                                </span>
                                <span class="label-down-map">
                                    <img src="./img/map.jpg" alt="">
                                </span>
                            </span>
                                </label>
                                <label class="deliver-box-label" for="deliveryService">
                                    <input type="radio" id="deliveryService" name="delivery">
                                    <span class="label-up">
                                <span class=label-up-l">
                                    <span class="text-r text-r-l"><i class="icon-"></i>  Служба доставки</span>
                                </span>
                                <span class="label-up-r text-r text-r-l green">
                                    Согласно тарифам службы доставки
                                </span>
                            </span>
                                    <span class="label-down">
                                <span class="label-down-select">
                                    <span class="text-r text-r-m text-r-greey">
                                        Забрать завтра с 12:00 до 18:00
                                    </span>
                                    <select class="js-example-basic-single">
                                        <option value="1" selected>--</option>
                                        <option value="2">Днепр, пр-кт Д.Яворницкого, 123</option>
                                    </select>
                                </span>
                                <span class="label-down-map">
                                    <img src="./img/map.jpg" alt="">
                                </span>
                            </span>
                                </label>
                                <label class="deliver-box-label" for="courierDelivery">
                                    <input type="radio" id="courierDelivery" name="delivery">
                                    <span class="label-up">
                                <span class=label-up-l">
                                    <span class="text-r text-r-l"><i class="icon-"></i>  Доставка курьером</span>
                                </span>
                                <span class="label-up-r text-r text-r-l green">
                                    Бесплатно от 999 грн.
                                </span>
                            </span>
                                    <span class="label-down">
                                <span class="label-down-select">
                                    <span class="text-r text-r-m text-r-greey">
                                        Забрать завтра с 12:00 до 18:00
                                    </span>
                                    <select class="js-example-basic-single">
                                        <option value="1" selected>--</option>
                                        <option value="2">Днепр, пр-кт Д.Яворницкого, 123</option>
                                    </select>
                                </span>
                                <span class="label-down-map">
                                    <img src="./img/map.jpg" alt="">
                                </span>
                            </span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="order-right">
                        <h2 class="text-sb text-sb-xxl">Мой заказ</h2>
                        <div>
                            <div class="cart-form">
                                <div class="cart-form-header">
                                    <p class="h-t1 text-r text-r-m text-r-vh-greey">Товары</p>
                                    <p class="h-t2 text-r text-r-m text-r-vh-greey">Количество</p>
                                    <p class="h-t3 text-r text-r-m text-r-vh-greey">Сумма</p>
                                </div>
                                <ul class="cart-form-body">
                                    @foreach($cart->content() as $item)
                                        <li class="cart-form-body-item">
                                            <button class="icon-close deleteItem" data-id="{{$item->rowId}}" type="button"></button>
                                            <picture>
                                                <source srcset="{{asset('assets/uploads/products')}}/{{$item->model->image}}"
                                                        type="image/webp">
                                                <img src="{{asset('assets/uploads/products')}}/{{$item->model->image}}" alt="">
                                            </picture>
                                            <p class="text-r text-r-m">{{$item->name}}</p>
                                            <div class="item-current">
                                                <button class="btn-decrement text-r text-r-m change-qty" data-id="{{$item->rowId}}"
                                                        data-type="decrease" type="button">-
                                                </button>
                                                <input class="iterator text-r text-r-m" type="text" id="qty-input-{{$item->rowId}}"
                                                       value="{{$item->qty}}" disabled>
                                                <button class="btn-increment text-r text-r-m change-qty" data-id="{{$item->rowId}}"
                                                        data-type="increase" type="button">+
                                                </button>
                                                <input type="hidden" data-id="{{$item->rowId}}"
                                                       data-product-quantity="{{$item->model->stock}}"
                                                       id="update-cart-{{$item->rowId}}">
                                            </div>
                                            <span class="price text-r text-r-m">{{number_format($item->price,2,'.',' ')}}</span>
                                        </li>
                                    @endforeach
                                </ul>
                                <div class="cart-form-promo">
                                    <div class="sum-price">
                                        <div class="sum-price-box">
                                            <span class="text-sb text-sb-s">Общая сумма</span>
                                            <span class="text-r text-r-m">{{$cart->subtotal()}}</span>
                                        </div>
                                        <div class="sum-price-box">
                                            <span class="text-sb text-sb-s">Доставка</span>
                                            <span class="text-r text-r-m">0,00</span>
                                        </div>
                                    </div>
                                    <div class="total-amount">
                                        <span class="text-sb text-sb-xxl text-sb-blue">К оплате</span>
                                        <span class="text-sb text-sb-xxl text-sb-blue">{{$cart->subtotal()}}</span>
                                    </div>
                                    <div class="promo-box">
                                        <button class="btn btn-xxxm btn-h53 btn-orange">Заказ подтверждаю
                                        </button>
                                    </div>
                                    <div class="user-agreement">
                                        <p class="text-r text-r-m">
                                            Продолжая, вы соглашаетесь
                                            с <a class="text-r-blue" href="#">Пользовательским соглашением</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

@endsection

