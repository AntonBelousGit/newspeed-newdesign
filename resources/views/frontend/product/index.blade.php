@extends('layouts.app')
@section('style')
    <link rel="stylesheet" href="{{ asset('/css/style.css')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.14/css/intlTelInput.css" rel="stylesheet"/>
    <link rel="preload" href="{{ asset('/css/style.min.css')}}" as="style">
    {{--	<link rel="preload" href="{{ asset('/js/script.min.js')}}" as="script">--}}
@endsection
@section('scripts')
    <script src="{{ asset('/js/script.min.js')}}"></script>
    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>--}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endsection
@section('content')
    <main>

        <div class="baners bg-Cw">
            <div class="container">
                <ul class="bread-dots">
                    <li>
                        <a class="text-r" href=""><i class="text-r icon-home"></i></a>
                    </li>
                    <li>
                        <i class="text-r icon-arrow"></i>
                        <a class="text-r" href="#">Персональный транспорт</a>
                    </li>
                    <li>
                        <i class="text-r icon-arrow"></i>
                        <a class="text-r" href="#">Самокаты</a>
                    </li>
                    <li>
                        <i class="text-r icon-arrow"></i>
                        <a class="text-r" href="#">{{ucfirst($product->name)}}</a>
                    </li>
                </ul>
            </div>
            <div class=" container">
                <div class="product">
                    <section class="product-left" id="tabs">
                        <div class="sliders">
                            @php
                                $image = json_decode($product->images) ?? []
                            @endphp
                            <div class="tovar-nav">
                                @each('frontend.product.components.image-nav', $image, 'item', 'frontend.product.components.empty')
                            </div>
                            <div class="tovar-for">
                                @each('frontend.product.components.image-for', $image, 'item', 'frontend.product.components.empty')
                            </div>
                        </div>
                        <ul class="product-left-tabs tabs-nav">
                            <li class="">
                                <a class=" text-sb text-sb-m vh-greey" href="#tab-1">О товаре</a>
                            </li>
                            <li class="">
                                <a class=" text-sb text-sb-m vh-greey" href="#tab-2">Характеристики</a>
                            </li>
                            <li class="">
                                <a class=" text-sb text-sb-m vh-greey" href="#tab-3">Отзывов (6)</a>
                            </li>
                            <li class="">
                                <a class=" text-sb text-sb-m vh-greey" href="#tab-4">Вопросы-ответы (1)</a>
                            </li>
                        </ul>
                        <div class="tabs-items">
                            <div class="product-left-tabs1 tabs-item" id="tab-1">
                                <ul class="product-left-tabs1-options">
                                    <li>
                                        <picture>
                                            <source srcset="./img/7.svg" type="image/webp">
                                            <img src="./img/7.svg" alt=""></picture>
                                        <div>
                                            <p class="text-r text-r-vh-greey">Диаметр колёс</p>
                                            <p class="text-r text-r-black">6,5 дюймов</p>
                                        </div>
                                    </li>
                                    <li>
                                        <picture>
                                            <source srcset="./img/6.svg" type="image/webp">
                                            <img src="./img/6.svg" alt="">
                                        </picture>
                                        <div>
                                            <p class="text-r text-r-vh-greey">Вес устройства</p>
                                            <p class="text-r text-r-black">9,6 кг</p>
                                        </div>
                                    </li>
                                    <li>
                                        <picture>
                                            <source srcset="./img/3.svg" type="image/webp">
                                            <img src="./img/3.svg" alt=""></picture>
                                        <div>
                                            <p class="text-r text-r-vh-greey">Допустимая нагрузка</p>
                                            <p class="text-r text-r-black">60 кг </p>
                                        </div>
                                    </li>
                                    <li>
                                        <picture>
                                            <source srcset="./img/8.svg" type="image/webp">
                                            <img src="./img/8.svg" alt=""></picture>
                                        <div>
                                            <p class="text-r text-r-vh-greey">Максимальная скорость</p>
                                            <p class="text-r text-r-black">До 25 км/ч</p>
                                        </div>
                                    </li>
                                    <li>
                                        <picture>
                                            <source srcset="./img/5.svg" type="image/webp">
                                            <img src="./img/5.svg" alt=""></picture>
                                        <div>
                                            <p class="text-r text-r-vh-greey">Мощность мотора</p>
                                            <p class="text-r text-r-black">250 Вт</p>
                                        </div>
                                    </li>
                                    <li>
                                        <picture>
                                            <source srcset="./img/4.svg" type="image/webp">
                                            <img src="./img/4.svg" alt=""></picture>
                                        <div>
                                            <p class="text-r text-r-vh-greey">Запас хода</p>
                                            <p class="text-r text-r-black">До 15 км</p>
                                        </div>
                                    </li>
                                </ul>
                                <p class="text-r text-r-l">
                                    {{$product->description}}
                                </p>
                            </div>
                            <div class="product-left-tabs2 tabs-item" id="tab-2">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <dl class="dlist-inline">
                                        </dl>
                                    </div>
                                </div>
                                <ul>
                                    @forelse($attributes as $attribute)
                                        @if ($attribute)
                                            <li class="item-row">
                                                <div class="item-row-item">
                                                    <p class="item-row-item-har text-r">{{ $attribute->attribute->name }}
                                                        :</p>
                                                </div>
                                                <div class="item-row-item">
                                                    <ul class="item-row-item-box">
                                                        @foreach($attribute->productAttributeValue as $attributeValue)
                                                            <li class="item-row-item-box-param text-r">{{$attributeValue->value}}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </li>
                                        @endif
                                    @empty

                                    @endforelse
                                </ul>
                                <div class="item-row-text-bot">
                                    <p class="text-r">* Характеристики и комплектация изделия могут изменяться
                                        производителем без
                                        предварительного уведомления</p>
                                    <button class="text-r" onclick="$('#exampleModal3').arcticmodal();">Нашли ошибку?
                                        Пожалуйста, сообщите нам
                                    </button>
                                </div>
                            </div>
                            <div class="product-left-tabs3 tabs-item" id="tab-3">
                                <ul class="feedback-list">
                                    <li class="feedback-list-item">
                                        <div class="item-row1">
                                            <span class="name-fb text-r text-r-m">Игорь</span>
                                            <div class="rating-box">
                                                <span class="rating rating-active"></span>
                                                <span class="rating rating-active"></span>
                                                <span class="rating rating-active"></span>
                                                <span class="rating rating-active"></span>
                                                <span class="rating"></span>
                                            </div>
                                            <span class="date-fb text-r text-r-m">18 августа 2017</span>
                                        </div>
                                        <p class="item-row2 text-r text-r-m">Здесь указано , что тип подшипников:
                                            гидродинамический
                                            (FDB). На сайте
                                            производителя данного кулера указано, что на него
                                            установлен вентилятор ThermalRight TY-147A , у которого тип подшипника ни
                                            как не
                                            FDB, а Enhanced Hyper-Flow Bearing
                                            (EHFB). Исправьте пожалуйста.</p>
                                        <div class="item-row3">
                                            <button class="text-r text-r-m"
                                                    onclick="$('#exampleModal2').arcticmodal();">
                                                <i class="icon-answer"></i>
                                                <span>Ответить</span>
                                            </button>
                                            <span class="like-fb text-r text-r-m text-r-darckBlue">
											<span class="text-r text-r-m">Отзыв полезен?</span>
											<i class="icon-like"></i>
											1
										</span>
                                        </div>
                                        <ul class="answer">
                                            <li class="answer-item">
                                                <p class="text-r text-r-m">Игорь, к сожалению мы не можем точно сказать
                                                    когда данный товар появится
                                                    в наличии. Да, модель устарела, и существует
                                                    вероятность того, что поставок больше не будет. Вы можете нажать
                                                    кнопку
                                                    "Сообщить когда появится" и мы сообщим вам.</p>
                                                <p class="text-r text-r-m text-r-greey">Ответ от Специалиста
                                                    Speedshop</p>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="feedback-list-item">
                                        <div class="item-row1">
                                            <span class="name-fb text-r text-r-m">Игорь</span>
                                            <div class="rating-box">
                                                <span class="rating rating-active"></span>
                                                <span class="rating rating-active"></span>
                                                <span class="rating rating-active"></span>
                                                <span class="rating rating-active"></span>
                                                <span class="rating"></span>
                                            </div>
                                            <span class="date-fb text-r text-r-m">18 августа 2017</span>
                                        </div>
                                        <p class="item-row2 text-r text-r-m">Здесь указано , что тип подшипников:
                                            гидродинамический
                                            (FDB). На сайте
                                            производителя данного кулера указано, что на него
                                            установлен вентилятор ThermalRight TY-147A , у которого тип подшипника ни
                                            как не
                                            FDB, а Enhanced Hyper-Flow Bearing
                                            (EHFB). Исправьте пожалуйста.</p>
                                        <div class="item-row3">
                                            <button class="text-r text-r-m"
                                                    onclick="$('#exampleModal2').arcticmodal();">
                                                <i class="icon-answer"></i>
                                                <span>Ответить</span>
                                            </button>
                                            <span class="like-fb text-r text-r-m text-r-darckBlue">
											<span class="text-r text-r-m">Отзыв полезен?</span>
											<i class="icon-like"></i>
											1
										</span>
                                        </div>
                                        <ul class="answer">
                                            <li class="answer-item">
                                                <p class="text-r text-r-m">Игорь, к сожалению мы не можем точно сказать
                                                    когда данный товар появится
                                                    в наличии. Да, модель устарела, и существует
                                                    вероятность того, что поставок больше не будет. Вы можете нажать
                                                    кнопку
                                                    "Сообщить когда появится" и мы сообщим вам.</p>
                                                <p class="text-r text-r-m text-r-greey">Ответ от Специалиста
                                                    Speedshop</p>
                                            </li>
                                            <li class="answer-item">
                                                <p class="text-r text-r-m">Игорь, к сожалению мы не можем точно сказать
                                                    когда данный товар появится
                                                    в наличии. Да, модель устарела, и существует
                                                    вероятность того, что поставок больше не будет. Вы можете нажать
                                                    кнопку
                                                    "Сообщить когда появится" и мы сообщим вам.</p>
                                                <p class="text-r text-r-m text-r-greey">Ответ от Специалиста
                                                    Speedshop</p>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="feedback-list-item">
                                        <div class="item-row1">
                                            <span class="name-fb text-r text-r-m">Игорь</span>
                                            <div class="rating-box">
                                                <span class="rating rating-active"></span>
                                                <span class="rating rating-active"></span>
                                                <span class="rating rating-active"></span>
                                                <span class="rating rating-active"></span>
                                                <span class="rating"></span>
                                            </div>
                                            <span class="date-fb text-r text-r-m">18 августа 2017</span>
                                        </div>
                                        <p class="item-row2 text-r text-r-m">Здесь указано , что тип подшипников:
                                            гидродинамический
                                            (FDB). На сайте
                                            производителя данного кулера указано, что на него
                                            установлен вентилятор ThermalRight TY-147A , у которого тип подшипника ни
                                            как не
                                            FDB, а Enhanced Hyper-Flow Bearing
                                            (EHFB). Исправьте пожалуйста.</p>
                                        <div class="item-row3">
                                            <button class="text-r text-r-m"
                                                    onclick="$('#exampleModal2').arcticmodal();">
                                                <i class="icon-answer"></i>
                                                <span>Ответить</span>
                                            </button>
                                            <span class="like-fb text-r text-r-m text-r-darckBlue">
											<span class="text-r text-r-m">Отзыв полезен?</span>
											<i class="icon-like"></i>
											1
										</span>
                                        </div>
                                    </li>
                                </ul>
                                <form class="feedback">
                                    <h5 class="text-sb text-sb-xxl">Написать отзыв</h5>
                                    <p class="text-r text-r-l">Спасибо, что делитесь опытом!</p>
                                    <p class="text-r text-r-l">Оцените этот товар</p>
                                    <div class="simple-rating">
                                        <div class="simple-rating-items">
                                            <input id="simple-rating-5" class="simple-rating-item" name="simple-rating"
                                                   type="radio" value="5" checked>
                                            <label class="simple-rating-label" for="simple-rating-5"></label>
                                            <input id="simple-rating-4" class="simple-rating-item" name="simple-rating"
                                                   type="radio" value="4">
                                            <label class="simple-rating-label" for="simple-rating-4"></label>
                                            <input id="simple-rating-3" class="simple-rating-item" name="simple-rating"
                                                   type="radio" value="3">
                                            <label class="simple-rating-label" for="simple-rating-3"></label>
                                            <input id="simple-rating-2" class="simple-rating-item" name="simple-rating"
                                                   type="radio" value="2">
                                            <label class="simple-rating-label" for="simple-rating-2"></label>
                                            <input id="simple-rating-1" class="simple-rating-item" name="simple-rating"
                                                   type="radio" value="1">
                                            <label class="simple-rating-label" for="simple-rating-1"></label>
                                        </div>
                                    </div>
                                    <input class="name" name="name" type="text" placeholder="Ваше имя!">
                                    <textarea class="" cols="30" rows="10" placeholder="Ваше отзыв"></textarea>
                                    <div class="feedback-checkbox">
                                        <label class="check option text-r">
                                            <input class="check__input" type="checkbox">
                                            <span class="check__box"></span>
                                            уведомлять об ответах по электронной почте
                                        </label>
                                    </div>
                                    <div class="feedback-text text-r">
                                        Важно! Чтобы Ваш вопрос прошел модерацию и был опубликован, ознакомьтесь,
                                        пожалуйста,
                                        <a class="" href="">с нашими правилами!</a>
                                    </div>
                                    <button class=" btn btn-xxl btn-orange">Оставить отзыв</button>
                                </form>
                            </div>
                            <div class="product-left-tabs4 tabs-item" id="tab-4">
                                <ul class="ask-question-list">
                                    <li class="ask-question-list-item">
                                        <div class="item-row1">
                                            <span class="text-r text-r-m">Игорь</span>
                                            <span class="text-r text-r-m">18 августа 2017</span>
                                        </div>
                                        <p class="item-row2 text-r text-r-m">Здесь указано , что тип подшипников:
                                            гидродинамический
                                            (FDB). На сайте
                                            производителя данного кулера указано, что на него
                                            установлен вентилятор ThermalRight TY-147A , у которого тип подшипника ни
                                            как не
                                            FDB, а Enhanced Hyper-Flow Bearing
                                            (EHFB). Исправьте пожалуйста.</p>
                                        <ul class="answer">
                                            <li class="answer-item">
                                                <p class="text-r text-r-m">Игорь, к сожалению мы не можем точно сказать
                                                    когда данный товар появится
                                                    в наличии. Да, модель устарела, и существует
                                                    вероятность того, что поставок больше не будет. Вы можете нажать
                                                    кнопку
                                                    "Сообщить когда появится" и мы сообщим вам.</p>
                                                <p class="text-r text-r-m text-r-greey">Ответ от Специалиста
                                                    Speedshop</p>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="ask-question-list-item">
                                        <div class="item-row1">
                                            <span class="text-r text-r-m">Игорь</span>
                                            <span class="text-r text-r-m">18 августа 2017</span>
                                        </div>
                                        <p class="item-row2 text-r text-r-m">Здесь указано , что тип подшипников:
                                            гидродинамический
                                            (FDB). На сайте
                                            производителя данного кулера указано, что на него
                                            установлен вентилятор ThermalRight TY-147A , у которого тип подшипника ни
                                            как не
                                            FDB, а Enhanced Hyper-Flow Bearing
                                            (EHFB). Исправьте пожалуйста.</p>
                                        <ul class="answer">
                                            <li class="answer-item">
                                                <p class="text-r text-r-m">Игорь, к сожалению мы не можем точно сказать
                                                    когда данный товар появится
                                                    в наличии. Да, модель устарела, и существует
                                                    вероятность того, что поставок больше не будет. Вы можете нажать
                                                    кнопку
                                                    "Сообщить когда появится" и мы сообщим вам.</p>
                                                <p class="text-r text-r-m text-r-greey">Ответ от Специалиста
                                                    Speedshop</p>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="ask-question-list-item">
                                        <div class="item-row1">
                                            <span class="text-r text-r-m">Игорь</span>
                                            <span class="text-r text-r-m">18 августа 2017</span>
                                        </div>
                                        <p class="item-row2 text-r text-r-m">Здесь указано , что тип подшипников:
                                            гидродинамический
                                            (FDB). На сайте
                                            производителя данного кулера указано, что на него
                                            установлен вентилятор ThermalRight TY-147A , у которого тип подшипника ни
                                            как не
                                            FDB, а Enhanced Hyper-Flow Bearing
                                            (EHFB). Исправьте пожалуйста.</p>
                                    </li>
                                </ul>
                                <form class="ask-question">
                                    <h5 class="text-sb text-sb-xxl">Задайте вопрос</h5>
                                    <p class="text-r text-r-l">А мы постараемся изучить товар и найти ответ</p>
                                    <input class="name" name="name" type="text" placeholder="Ваше имя!">
                                    <input class="email" name="email" type="email" placeholder="E-mail">
                                    <textarea class="" cols="30" rows="10" placeholder="Ваше сообщение"></textarea>
                                    <div class="ask-question-checkbox">
                                        <label class="check option text-r">
                                            <input class="check__input" type="checkbox">
                                            <span class="check__box"></span>
                                            уведомлять об ответах по электронной почте
                                        </label>
                                    </div>
                                    <div class="ask-question-text text-r">
                                        Важно! Чтобы Ваш вопрос прошел модерацию и был опубликован, ознакомьтесь,
                                        пожалуйста,
                                        <a class="" href="">с нашими правилами!</a>
                                    </div>
                                    <button class=" btn btn-xxl btn-orange">Задать вопрос</button>
                                </form>
                            </div>
                        </div>
                    </section>
                    <section class="product-right">
                        <h3 class="title-i">{{ucfirst($product->name)}}</h3>
                        <div class="product-right-box1">
                            <div class="product-right-box1-item1">
                                <span class="item1 label label-artikul">Артикул {{$product->SKU}}</span>

                                @if($product->stock_status == 'instock')
                                    <span class="item2 text-sb text-sb-m blue-t">
                                    <i class="icon-yes2 blue-tb"></i>
                                    В наличии
                                </span>
                                @else
                                    <span class="item2 text-sb text-sb-m vh-greey" style="display: none;">
                                    <i class="icon-none"></i> Нет в наличии	</span>
                                    <button class="item3 text-r text-r-l" onclick="$('#exampleModal').arcticmodal();">
                                        Сообщить о поступлении
                                    </button>
                                @endif

                                <div class="item4 rating-box">
                                    <span class="rating rating-active"></span>
                                    <span class="rating rating-active"></span>
                                    <span class="rating rating-active"></span>
                                    <span class="rating rating-active"></span>
                                    <span class="rating"></span>
                                </div>
                            </div>
                            <div class="product-right-box1-item2">
                                <div class="item1">
                                    <span class="label label-xl label-sale">-{{ round((1- ($product->sale_price/$product->regular_price))*100) }}%</span>
                                    <p class="text-r text-r-xl vh-greey">{{ number_format($product->regular_price,2,'.',' ')}}
                                        <span>грн</span></p>
                                </div>
                                <p class="text-sb text-sb-xxxl">{{ number_format($product->sale_price,2,'.',' ')}} <span
                                            class="text-sb-xxl">грн</span></p>
                            </div>

                            @if($product->stock_status == 'instock')
                                <div class="product-right-box1-item3">
                                    <a
                                            href="javascript:void(0);" role="button"
                                            class="item1 btn btn-xxl btn-blue add_to_cart"
                                            data-product-id="{{$product->id}}">Добавить в корзину</a>
                                    <button class="item2 btn btn-xxl btn-orange"
                                            onclick="$('#exampleModal0').arcticmodal();">Купить сейчас
                                    </button>
                                    <div class="item3"><i class="icon-favorite"></i>
                                        <!-- <i class="icon-libra"></i> --> <i class="icon-more-detail"></i></div>
                                </div>
                            @endif
                        </div>
                        <div class="product-right-box2">
                            <h5 class="text-sb text-sb-m spoiler-zagolovok">Доставка в
                                <span class="text-r text-r-l dark-blue">Днепр</span>
                                <span class="arrow-spoiler"></span>
                            </h5>
                            <ul class="product-right-box2-cont1 spoiler-body">
                                <li class="item">
                                    <picture>
                                        <source srcset="./img/10.svg" type="image/webp">
                                        <img src="./img/10.svg" alt=""></picture>
                                    <p class="text-r text-r-l">Самовывоз</p>
                                    <p class="text-sb text-sb-m">Можно забрать сегодня</p>
                                    <p class="text-r text-r-l green">Бесплатно</p>
                                    <i class="icon-info hovInfo hovP1"></i>
                                    <div class="popUp popUp1">
                                        <article class="popUp-TC">
                                            <h6 class="text-sb text-sb-a">Доставка курьером</h6>
                                            <p class="text-r">Курьеры доставляют товар в будние дни с 12:00 до 18:00.
                                                Обратите внимание, мы не оформляем
                                                доставку на строго
                                                определенное время. Минимальный диапазон времени доставки составляет 4
                                                часа.
                                                Обратите внимание, что курьеры доставляют товар только до подъезда. В
                                                целях
                                                личной безопасности им запрещено
                                                заходить
                                                непосредственно в здание, офис, квартиру.</p>
                                        </article>
                                    </div>
                                </li>
                                <li class="item">
                                    <picture>
                                        <source srcset="./img/11.svg" type="image/webp">
                                        <img src="./img/11.svg" alt=""></picture>
                                    <p class="text-r text-r-l">Служба доставки</p>
                                    <p class="text-sb text-sb-m">Отправка сегодня</p>
                                    <p class="text-r text-r-l green">Согласно тарифам службы доставки</p>
                                    <i class="icon-info hovInfo hovP2"></i>
                                    <div class="popUp popUp2">
                                        <article class="popUp-TC">
                                            <h6 class="text-sb text-sb-a">Служба доставки</h6>
                                            <p class="text-r">
                                                Обычно товар достигает места назначения в течение 24-48 часов после
                                                отправки. Получатель может забрать
                                                покупку после
                                                получения sms-уведомления от службы доставки. Время хранения и стоимость
                                                доставки зависит от выбранной вами
                                                службы
                                                доставки. Если вы не получили свой заказ в течении этого срока, он
                                                возвращается обратно в магазин и мы несём
                                                убытки.</p>
                                        </article>
                                    </div>
                                </li>
                                <li class="item">
                                    <picture>
                                        <source srcset="./img/2.svg" type="image/webp">
                                        <img src="./img/2.svg" alt=""></picture>
                                    <p class="text-r text-r-l">Доставка курьером</p>
                                    <p class="text-sb text-sb-m">Доставка <span>13.05.21</span></p>
                                    <p class="text-r text-r-l green">Бесплатно от 999 грн.</p>
                                    <i class="icon-info hovInfo hovP3"></i>
                                    <div class="popUp popUp3">
                                        <article class="popUp-TC">
                                            <h6 class="text-sb text-sb-a">Самовывоз в г. Днепр</h6>
                                            <p class="text-r">
                                                Вы можете самостоятельно забрать товар в нашей точке выдачи
                                                расположенной в
                                                центре города.
                                                Будем рады Вас видеть по адресу: г. Днепр, ул. Троицкая, 3Б.
                                            </p>
                                            <p class="text-r">
                                                Время работы: Пн-Пт: 10:00 — 19:00
                                                Сб: 10:00 — 18:00
                                            </p>
                                            <p class="text-r">Выходной: воскресенье.</p>
                                        </article>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="product-right-box3">
                            <h5 class="text-sb text-sb-m spoiler-zagolovok">Оплата <span class="arrow-spoiler"></span>
                            </h5>
                            <ul class="product-right-box3-item1 spoiler-body">
                                <li>
                                    <p class="text-r text-r-l">Наличными при получении</p>
                                    <i class="icon-info hovInfo hovP4"></i>
                                    <div class="popUp popUp4">
                                        <article class="popUp-TC">
                                            <h6 class="text-sb text-sb-a">Наличными при получении</h6>
                                            <p class="text-r">Оплачивайте товар при получении посылки.
                                                Проверяйте содержимое посылки перед оплатой товара.</p>
                                        </article>
                                    </div>
                                </li>
                                <li>
                                    <p class="text-r text-r-l">Наложеным платежом</p>
                                    <i class="icon-info hovInfo hovP5"></i>
                                    <div class="popUp popUp5">
                                        <article class="popUp-TC">
                                            <h6 class="text-sb text-sb-a">Наложеным платежом</h6>
                                            <p class="text-r">
                                                Оплачивайте товар при получении посылки в почтовом отделении.
                                                Проверяйте содержимое посылки перед оплатой товара.
                                            </p>
                                            <p class="text-r">Комиссия — 1% от суммы наложенного платежа.</p>
                                        </article>
                                    </div>
                                </li>
                                <li>
                                    <p class="text-r text-r-l">Безналичный расчет (только для юридических лиц)</p>
                                    <i class="icon-info hovInfo hovP6"></i>
                                    <div class="popUp popUp6">
                                        <article class="popUp-TC">
                                            <h6 class="text-sb text-sb-a">Безналичный расчет<span>(только для юридических
												лиц)</span>
                                            </h6>
                                            <p class="text-r">
                                                Вы можете положить наличные деньги на наш счет в любом отделении банка.
                                                Реквизиты нашего счета мы предоставим при
                                                запросе.
                                                За услугу по переводу денег с вас возьмут от 3 до 7% от стоимости
                                                заказа, в
                                                зависимости от региона. Перечисление денег
                                                займет порядка 2-5 дней. Счет будет выставлен на ваш электронный адрес
                                                после
                                                подтверждения заказа.</p>
                                        </article>
                                    </div>
                                </li>
                                <li>
                                    <div class="pz">
                                        <span class="text-r text-r-l">Оплата картой</span>
                                        <span class="pz">
										<picture><source srcset="./img/visa.webp" type="image/webp"><img
                                                    src="./img/visa.png" alt=""></picture>
										<picture><source srcset="./img/mastercard.webp" type="image/webp"><img
                                                    src="./img/mastercard.png" alt=""></picture>
										<picture><source srcset="./img/master.webp" type="image/webp"><img
                                                    src="./img/master.png" alt=""></picture>
									</span>
                                    </div>
                                    <i class="icon-info hovInfo hovP7"></i>
                                    <div class="popUp popUp7">
                                        <article class="popUp-TC">
                                            <h6 class="text-sb text-sb-a">Оплата картой</h6>
                                            <p class="text-r">
                                                При оплате заказа банковской картой, обработка платежа (включая ввод
                                                номера
                                                карты) происходит на защищенной странице
                                                процессинговой системы, которая прошла международную сертификацию. Это
                                                значит, что ваши конфиденциальные данные
                                                (реквизиты карты, регистрационные данные и др.) не поступают в
                                                интернет-магазин, их обработка полностью защищена и
                                                никто, в том числе наш интернет-магазин, не может получить персональные
                                                и
                                                банковские данные клиента.</p>
                                        </article>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="product-right-box4">
                            <h5 class="text-sb text-sb-m spoiler-zagolovok">Возврат <span class="arrow-spoiler"></span>
                            </h5>
                            <div class="product-right-box4-item1 spoiler-body">
                                <div class="product-right-box4-item1-text">
                                    <picture>
                                        <source srcset="./img/1.svg" type="image/webp">
                                        <img src="./img/1.svg" alt=""></picture>
                                    <p class="text-r text-r-l">Обмен и возврат в течение 14 дней</p>
                                </div>
                                <i class="icon-info hovInfo  hovP8"></i>
                                <div class="popUp popUp8">
                                    <article class="popUp-TC">
                                        <h6 class="text-sb text-sb-a">Возврат товара</h6>
                                        <p class="text-r">Согласност. 9 Закону України "Про захист прав споживачів",
                                            потребитель имеет право совершить обмен или возврат
                                            приобретенного товара на протяжении 14 дней после покупки при выполнении
                                            следующих условий:
                                        </p>
                                        <p class="text-r">1. Обмену или возврату подлежит только новый товар, который не
                                            был
                                            в эксплуатации и не имеет следов эксплуатации:
                                            царапин, сколов, потертостей, других повреждений.
                                        </p>
                                        <p class="text-r">2. Товар не собирался и не монтировался, а также сохранен его
                                            товарный вид.
                                        </p>
                                        <p class="text-r">3. Сохранена целостность упаковки товара и вся его
                                            комплектация.
                                        </p>
                                        <p class="text-r">4. Сохранены ярлыки, инструкции и производственная
                                            маркировка.</p>
                                        <p class="text-r">5. Предоставлен товарный чек, спецификация и/или накладная,
                                            квитанция об оплате, что подтверждает факт покупки товара в
                                            нашем интернет-магазине. Для возврата денежных средств потребитель должен
                                            иметь
                                            при себе и вернуть продавцу:
                                            приобретенный товар, чек, накладную, договор, бланк заказа.
                                        </p>
                                        <p class="text-r">Возврату не подлежат: уцененные товары, собранные или
                                            поврежденные
                                            после покупки товары (без упаковки/с нарушенной
                                            упаковкой или эксплуатированные).Товары, которые производились или были
                                            привезены под индивидуальный заказ.</p>
                                    </article>
                                </div>
                            </div>
                        </div>
                        <div class="product-right-box5">
                            <h5 class="text-sb text-sb-m spoiler-zagolovok ">Гарантия <span
                                        class="arrow-spoiler"></span>
                            </h5>
                            <div class="product-right-box5-item1 spoiler-body">
                                <picture>
                                    <source srcset="./img/9.svg" type="image/webp">
                                    <img src="./img/9.svg" alt=""></picture>
                                <p class="text-r text-r-l">Гарантия 6 месяцев</p>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
        <div class="bg-p bg-Cw">
            <div class="container">
                <h2 class="title-i">Похожие товары</h2>
                <ul class="promotions rowCart">
                    @each('frontend.product.components.similar_product',$similar_products,'item','frontend.product.components.empty')
                </ul>
            </div>
        </div>
        <div class="bg-Cber">
            <div class="mailing container">
                <figure class="mailing-item spase-b-c">
                    <picture>
                        <source srcset="./img/subscribe1.webp" type="image/webp">
                        <img src="./img/subscribe1.png" alt=""></picture>
                    <figcaption class="text-b text-b-m l-s">
                        <div>Подписаться</div>
                        на нашу рассылку
                    </figcaption>
                </figure>
                <form class="mailing-form spase-b-c form-s">
                    <input class="form-s-search" type="email" placeholder="Введите ваш e-mail">
                    <button class="btn btn-l btn-orange">Подписаться</button>
                </form>
            </div>
        </div>
        <div class="bg-p bg-Cw">
            <div class="container">
                <h2 class="title-i">Просмотренные товары</h2>
                <ul class="promotions rowCart">
                    <li class="rowCart-item">
                        <div class="rowCart-item-box">
                            <a>
                                <figure>
                                    <picture>
                                        <source srcset="./img/image7.webp" type="image/webp">
                                        <img src="./img/image7.png" alt=""></picture>
                                    <figcaption class="rowCart-item-link-box-text">
                                        Электросамокат Xiaomi Mi Scooter Pro 2 (Black)
                                    </figcaption>
                                </figure>
                            </a>
                            <div class="price">
							<span class="w45">
								<span class="label label-sale">-14%</span>
								<span class="text-r text-r-m text-r-greey t-d-t">28 999</span>
							</span>
                                <i class="icon-favorite"></i>
                            </div>
                            <p class="text-sb text-sb-xl">24 999<span class="text-sb text-sb-s"> грн</span></p>
                            <div class="rating-box">
                                <span class="rating rating-active"></span>
                                <span class="rating rating-active"></span>
                                <span class="rating rating-active"></span>
                                <span class="rating rating-active"></span>
                                <span class="rating"></span>
                            </div>
                            <a class=" text-r text-r-m">Электросамокат Xiaomi Mi Scooter Pro 2 (Black)
                            </a>
                            <span class="label label-new">Новинка</span>
                        </div>
                    </li>
                    <li class="rowCart-item">
                        <div class="rowCart-item-box">
                            <a>
                                <figure>
                                    <picture>
                                        <source srcset="./img/image7.webp" type="image/webp">
                                        <img src="./img/image7.png" alt=""></picture>
                                    <figcaption class="rowCart-item-link-box-text">
                                        Электросамокат Xiaomi Mi Scooter Pro 2 (Black)
                                    </figcaption>
                                </figure>
                            </a>
                            <div class="price">
							<span class="w45">
								<span class="label label-sale">-14%</span>
								<span class="text-r text-r-m text-r-greey t-d-t">28 999</span>
							</span>
                                <i class="icon-favorite"></i>
                            </div>
                            <p class="text-sb text-sb-xl">24 999<span class="text-sb text-sb-s"> грн</span></p>
                            <div class="rating-box">
                                <span class="rating rating-active"></span>
                                <span class="rating rating-active"></span>
                                <span class="rating rating-active"></span>
                                <span class="rating rating-active"></span>
                                <span class="rating"></span>
                            </div>
                            <a class=" text-r text-r-m">Электросамокат Xiaomi Mi Scooter Pro 2 (Black)
                            </a>
                            <span class="label label-new">Новинка</span>
                        </div>
                    </li>
                    <li class="rowCart-item">
                        <div class="rowCart-item-box">
                            <a>
                                <figure>
                                    <picture>
                                        <source srcset="./img/image7.webp" type="image/webp">
                                        <img src="./img/image7.png" alt=""></picture>
                                    <figcaption class="rowCart-item-link-box-text">
                                        Электросамокат Xiaomi Mi Scooter Pro 2 (Black)
                                    </figcaption>
                                </figure>
                            </a>
                            <div class="price">
							<span class="w45">
								<span class="label label-sale">-14%</span>
								<span class="text-r text-r-m text-r-greey t-d-t">28 999</span>
							</span>
                                <i class="icon-favorite"></i>
                            </div>
                            <p class="text-sb text-sb-xl">24 999<span class="text-sb text-sb-s"> грн</span></p>
                            <div class="rating-box">
                                <span class="rating rating-active"></span>
                                <span class="rating rating-active"></span>
                                <span class="rating rating-active"></span>
                                <span class="rating rating-active"></span>
                                <span class="rating"></span>
                            </div>
                            <a class=" text-r text-r-m">Электросамокат Xiaomi Mi Scooter Pro 2 (Black)
                            </a>
                            <span class="label label-new">Новинка</span>
                        </div>
                    </li>
                    <li class="rowCart-item">
                        <div class="rowCart-item-box">
                            <a>
                                <figure>
                                    <picture>
                                        <source srcset="./img/image7.webp" type="image/webp">
                                        <img src="./img/image7.png" alt=""></picture>
                                    <figcaption class="rowCart-item-link-box-text">
                                        Электросамокат Xiaomi Mi Scooter Pro 2 (Black)
                                    </figcaption>
                                </figure>
                            </a>
                            <div class="price">
							<span class="w45">
								<span class="label label-sale">-14%</span>
								<span class="text-r text-r-m text-r-greey t-d-t">28 999</span>
							</span>
                                <i class="icon-favorite"></i>
                            </div>
                            <p class="text-sb text-sb-xl">24 999<span class="text-sb text-sb-s"> грн</span></p>
                            <div class="rating-box">
                                <span class="rating rating-active"></span>
                                <span class="rating rating-active"></span>
                                <span class="rating rating-active"></span>
                                <span class="rating rating-active"></span>
                                <span class="rating"></span>
                            </div>
                            <a class=" text-r text-r-m">Электросамокат Xiaomi Mi Scooter Pro 2 (Black)
                            </a>
                            <span class="label label-new">Новинка</span>
                        </div>
                    </li>
                    <li class="rowCart-item">
                        <div class="rowCart-item-box">
                            <a>
                                <figure>
                                    <picture>
                                        <source srcset="./img/image7.webp" type="image/webp">
                                        <img src="./img/image7.png" alt=""></picture>
                                    <figcaption class="rowCart-item-link-box-text">
                                        Электросамокат Xiaomi Mi Scooter Pro 2 (Black)
                                    </figcaption>
                                </figure>
                            </a>
                            <div class="price">
							<span class="w45">
								<span class="label label-sale">-14%</span>
								<span class="text-r text-r-m text-r-greey t-d-t">28 999</span>
							</span>
                                <i class="icon-favorite"></i>
                            </div>
                            <p class="text-sb text-sb-xl">24 999<span class="text-sb text-sb-s"> грн</span></p>
                            <div class="rating-box">
                                <span class="rating rating-active"></span>
                                <span class="rating rating-active"></span>
                                <span class="rating rating-active"></span>
                                <span class="rating rating-active"></span>
                                <span class="rating"></span>
                            </div>
                            <a class=" text-r text-r-m">Электросамокат Xiaomi Mi Scooter Pro 2 (Black)
                            </a>
                            <span class="label label-new">Новинка</span>
                        </div>
                    </li>
                    <li class="rowCart-item">
                        <div class="rowCart-item-box">
                            <a>
                                <figure>
                                    <picture>
                                        <source srcset="./img/image7.webp" type="image/webp">
                                        <img src="./img/image7.png" alt=""></picture>
                                    <figcaption class="rowCart-item-link-box-text">
                                        Электросамокат Xiaomi Mi Scooter Pro 2 (Black)
                                    </figcaption>
                                </figure>
                            </a>
                            <div class="price">
							<span class="w45">
								<span class="label label-sale">-14%</span>
								<span class="text-r text-r-m text-r-greey t-d-t">28 999</span>
							</span>
                                <i class="icon-favorite"></i>
                            </div>
                            <p class="text-sb text-sb-xl">24 999<span class="text-sb text-sb-s"> грн</span></p>
                            <div class="rating-box">
                                <span class="rating rating-active"></span>
                                <span class="rating rating-active"></span>
                                <span class="rating rating-active"></span>
                                <span class="rating rating-active"></span>
                                <span class="rating"></span>
                            </div>
                            <a class=" text-r text-r-m">Электросамокат Xiaomi Mi Scooter Pro 2 (Black)
                            </a>
                            <span class="label label-new">Новинка</span>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </main>
    <div style="display: none;">
        <div class="box-modal" id="exampleModal">
            <!-- <div class="box-modal_close arcticmodal-close"><span class="castom-x"></span></div> -->
            <div class="emailBack-box">
                <h6 class="text-sb text-sb-l text-sb-blue">Когда товар появится
                    в наличии, мы вам сообщим</h6>
                <form class="emailBack-box-form">
                    <input type="text" placeholder="Ваше имя">
                    <input type="text" placeholder="E-mail">
                    <div class="box-modal_close arcticmodal-close">
                        <button class="btn btn-m btn-greey" type="button">Отменить</button>
                    </div>
                    <button class="btn btn-xs btn-orange">Сообщите мне!</button>
                </form>
            </div>
        </div>
    </div>
    <div style="display: none;">
        <div class="box-modal box-modal-qb" id="exampleModal3">
            <!-- <div class="box-modal_close arcticmodal-close"><span class="castom-x"></span></div> -->
            <div class="question-back">
                <h5 class="text-sb text-sb-xxl text-sb-blue">Если вы нашли ошибку, пожалуйста, сообщите нам</h5>
                <form class="question-back-form">
                    <input class="name" name="name" type="text" placeholder="Ваше имя!">
                    <input class="email" name="email" type="email" placeholder="E-mail">
                    <textarea class="" cols="30" rows="5" placeholder="Ваше сообщение"></textarea>
                    <label class="check option text-r">
                        <input class="check__input" type="checkbox">
                        <span class="check__box"></span>
                        уведомлять об ответах по электронной почте
                    </label>
                    <div class="question-back-form-text text-r">
                        Важно! Чтобы Ваш вопрос прошел модерацию и был опубликован, ознакомьтесь,
                        пожалуйста,
                        <a class="" href="">с нашими правилами!</a>
                    </div>
                    <div class="box-modal_close arcticmodal-close">
                        <button class="btn btn-m btn-greey" type="button">Отменить</button>
                    </div>
                    <button class="btn btn-xxl btn-orange">Ответить</button>
                </form>
            </div>
        </div>
    </div>
    <div style="display: none;">
        <div class="box-modal box-modal-qb" id="exampleModal2">
            <!-- <div class="box-modal_close arcticmodal-close"><span class="castom-x"></span></div> -->
            <div class="question-back">
                <h5 class="text-sb text-sb-xxl text-sb-blue">Напишите ответ</h5>
                <!-- <p class="text-r text-r-l"></p> -->
                <form class="question-back-form">
                    <input class="name" name="name" type="text" placeholder="Ваше имя!">
                    <input class="email" name="email" type="email" placeholder="E-mail">
                    <textarea class="" cols="30" rows="5" placeholder="Ваше сообщение"></textarea>
                    <label class="check option text-r">
                        <input class="check__input" type="checkbox">
                        <span class="check__box"></span>
                        уведомлять об ответах по электронной почте
                    </label>
                    <div class="question-back-form-text text-r">
                        Важно! Чтобы Ваш вопрос прошел модерацию и был опубликован, ознакомьтесь,
                        пожалуйста,
                        <a class="" href="">с нашими правилами!</a>
                    </div>
                    <div class="box-modal_close arcticmodal-close">
                        <button class="btn btn-m btn-greey" type="button">Отменить</button>
                    </div>
                    <button class="btn btn-xxl btn-orange">Ответить</button>
                </form>
            </div>
        </div>
    </div>
@endsection
