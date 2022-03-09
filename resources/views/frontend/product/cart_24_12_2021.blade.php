@extends('layouts.app')
@section('style')
    <link rel="stylesheet" href="{{ asset('/css/style.css')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.14/css/intlTelInput.css" rel="stylesheet" />

    {{--	<link rel="preload" href="{{ asset('/js/script.min.js')}}" as="script">--}}

    <link rel="stylesheet" href="{{ asset('/css/select2.min.css')}}">
    <link rel="preload" href="{{ asset('/css/style.min.css')}}" as="style">
    <link rel="stylesheet" href="{{ asset('/css/order.css')}}">
@endsection
@section('script')
{{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>--}}
    <script src="{{ asset('/js/select2.min.js')}}"></script>
    <script type="text/javascript">

        $(".update-cart").on('click', function (e) {
            e.preventDefault();
            var ele = $(this);
            let id = ele.attr("data-id");
            let summ_element = document.getElementById('summ_in_cart-' + id);
            let total_summ_element = document.getElementById('total_summ_in_cart');
            let quantity = document.getElementById('input_in_cart-' + id).value;

            $.ajax({
                url: '{{ route('catalog.update.cart') }}',
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: id,
                    quantity: quantity
                },
                success: function (response) {
                    let summ = response.summ;
                    let total_summ = response.total_summ;
                    summ_element.innerHTML = new Intl.NumberFormat("ru", {style: "decimal", minimumFractionDigits: 2}).format(summ);
                    total_summ_element.innerHTML = new Intl.NumberFormat("ru", {style: "decimal", minimumFractionDigits: 2}).format(total_summ);
                }
            });
        });

        $(".remove-from-cart").click(function (e) {
            e.preventDefault();

            var ele = $(this);
            let id = ele.attr("data-id");
            let total_summ_element = document.getElementById('total_summ_in_cart');
            if(confirm("Are you sure want to remove?")) {
                $.ajax({
                    url: '{{ route('catalog.remove.from.cart') }}',
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: id
                    },
                    success: function (response) {
                        console.log(response);
                        let li = document.getElementById('li_in_cart-' + id);
                        if(li) {
                            li.remove();
                        }
                        let total_summ = response.total_summ;
                        total_summ_element.innerHTML = new Intl.NumberFormat("ru", {style: "decimal", minimumFractionDigits: 2}).format(total_summ);
                    }
                });
            }
        });

    </script>
@endsection
@section('content')
<main>
    <div class="baners bg-Cw">
        <div class="container">
            <div class="order-head" id="p-b-l">
                <div class="progress-box progress accept">
                    <div class="order-head-up">
                        <i class="icon-card"></i>
                        <span class="text-sb text-sb-xxl text-sb-blue">Ваш заказ</span>
                    </div>
                    <div class="line-box">
                        <span class="circle"></span>
                        <span class="line"></span>
                    </div>
                </div>
                <div class="progress-box progress">
                    <div class="order-head-up">
                        <i class="icon-user3"></i>
                        <span class="text-sb text-sb-xxl text-sb-blue">Данные покупателя</span>
                    </div>
                    <div class="line-box">
                        <span class="circle"></span>
                        <span class="line"></span>
                    </div>
                </div>
                <div class="progress-box">
                    <div class="order-head-up">
                        <i class="icon-delivers"></i>
                        <span class="text-sb text-sb-xxl text-sb-blue">Доставка и оплата</span>
                    </div>
                    <div class="line-box">
                        <span class="circle"></span>
                        <span class="line small"></span>
                    </div>
                </div>
                <div class="progress-box">
                    <div class="order-head-up">
                        <i class="icon-likes"></i>
                        <span class="text-sb text-sb-xxl text-sb-blue">Подтверждение заказа</span>
                    </div>
                    <div class="line-box">
                        <span class="circle"></span>
                        <span class="line small"></span>
                    </div>
                </div>
            </div>
            <div class="order-body">
                <div  style="display: none" class="order-left"  id="tabs-list">
                    <ul class="order-left-tabList">
                        <li class="tab active tab-left text-sb text-sb-l text-sb-m">Я впервые покупаю здесь</li>
                        <li class="tab tab-right text-sb text-sb-l text-sb-m">Я уже совершал покупки</li>
                    </ul>
                    <div class="order-left-box content-tab active">
                        <form class="order-left-form" action="#">
                            <input class="" id="phoneC" type="tel" name="tel" placeholder=''>
                            <input class="" type="text" placeholder="Пароль">
                            <input class="" type="text" placeholder="Имя">
                            <input class="" type="text" placeholder="Фамилия">
                            <input class="" type="email" placeholder="E-mail">
                            <button class="btn btn-xxxl btn-orange">
                                Продолжить оформление заказа
                            </button>
                        </form>
                        <p class="text-r text-r-m">Продолжая, вы соглашаетесь
                            с <a class="text-r-blue" href="#">Пользовательским соглашением</a></p>
                        <div class="or text-r text-r-l">
                            <span>или</span>
                        </div>
                        <span class="text-r text-r-l">
							Войти как пользователь
						</span>
                        <div class="login-G-F">
                            <button>G</button>
                            <button>F</button>
                        </div>
                        <span class="text-r">
							Мы не передаем социальных сетям
						</span>
                    </div>
                    <div class="order-left-box content-tab">

                    </div>
                </div>
                <div  class="order-left">
                    <form class="deliver-pay" action="#">
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
									<img src="{{ asset('/img/visa.png')}}" alt="">
									<img src="{{ asset('/img/mastercard.png')}}" alt="">
									<img src="{{ asset('/img/master.png')}}" alt="">
								</span>
                            </label>
                        </div>
                        <h2 class="text-sb text-sb-xxl">Доставка</h2>
                        <p class="text-sb text-sb-m">Доставка в  <span class="text-r text-r-l text-r-darckBlue und">Днепр</span></p>
                        <div class="deliver-box">
                            <label class="deliver-box-label" for="pickupStore">
                                <input type="radio" id="pickupStore" name="delivery" checked>
                                <span class="label-up">
									<span class=label-up-l">
										<span  class="text-r text-r-l"><i class="icon-"></i>  Самовывоз из нашего магазина</span>
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
										<img src="{{ asset('/img/map.jpg')}}" alt="">
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
										<img src="{{ asset('/img/map.jpg')}}" alt="">
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
										<select  class="js-example-basic-single">
											<option value="1" selected>--</option>
											<option value="2">Днепр, пр-кт Д.Яворницкого, 123</option>
										</select>
									</span>
									<span class="label-down-map">
										<img src="{{ asset('/img/map.jpg')}}" alt="">
									</span>
								</span>
                            </label>
                        </div>
                    </form>
                </div>
                <div  style="display: none" class="order-right" >
                    <h2 class="text-sb text-sb-xxl">Мой заказ</h2>
                    <div>
                        <form class="cart-form">
                            <div class="cart-form-header">
                                <p class="h-t1 text-r text-r-m text-r-vh-greey">Товары</p>
                                <p class="h-t2 text-r text-r-m text-r-vh-greey">Количество</p>
                                <p class="h-t3 text-r text-r-m text-r-vh-greey">Сумма</p>
                            </div>
                            <ul class="cart-form-body">



                                <li class="cart-form-body-item"  >
                                    <button class="icon-close deleteItem" type="button" ></button>
                                    <picture>
                                        <source srcset="{{ asset('/img/1.webp')}}" type="image/webp">
                                        <img src="{{ asset('/img/1.png')}}" alt=""></picture>
                                    <p class="text-r text-r-m">Name Product</p>
                                    <div class="item-current">
                                        <button class="btn-decrement text-r text-r-m"  type="button">-</button>
                                        <input class="iterator text-r text-r-m" type="text" disabled="">
                                        <button class="btn-increment text-r text-r-m" type="button">+</button>
                                    </div>
                                    <span class="price text-r text-r-m"   >24 999,00</span>
                                </li>


                                <li class="cart-form-body-item">
                                    <button class="icon-close deleteItem" type="button"></button>
                                    <picture>
                                        <source srcset="{{ asset('/img/1.webp')}}" type="image/webp">
                                        <img src="{{ asset('/img/1.png')}}" alt=""></picture>
                                    <p class="text-r text-r-m">Электросамокат Название длинное-предлинное</p>
                                    <div class="item-current">
                                        <button class="btn-decrement text-r text-r-m" type="button">-</button>
                                        <input class="iterator text-r text-r-m" type="text" value="1" disabled="">
                                        <button class="btn-increment text-r text-r-m" type="button">+</button>
                                    </div>
                                    <span class="price text-r text-r-m">24 999,00</span>
                                </li>
                                <li class="cart-form-body-item">
                                    <button class="icon-close deleteItem" type="button"></button>
                                    <picture>
                                        <source srcset="{{ asset('/img/1.webp')}}" type="image/webp">
                                        <img src="{{ asset('/img/1.png')}}" alt=""></picture>
                                    <p class="text-r text-r-m">Электросамокат Название длинное-предлинное</p>
                                    <div class="item-current">
                                        <button class="btn-decrement text-r text-r-m" type="button">-</button>
                                        <input class="iterator text-r text-r-m" type="text" value="1" disabled="">
                                        <button class="btn-increment text-r text-r-m" type="button">+</button>
                                    </div>
                                    <span class="price text-r text-r-m">24 999,00</span>
                                </li>
                                <li class="cart-form-body-item">
                                    <button class="icon-close deleteItem" type="button"></button>
                                    <picture>
                                        <source srcset="{{ asset('/img/1.webp')}}" type="image/webp">
                                        <img src="{{ asset('/img/1.png')}}" alt=""></picture>
                                    <p class="text-r text-r-m">Электросамокат Название длинное-предлинное</p>
                                    <div class="item-current">
                                        <button class="btn-decrement text-r text-r-m" type="button">-</button>
                                        <input class="iterator text-r text-r-m" type="text" value="1" disabled>
                                        <button class="btn-increment text-r text-r-m" type="button">+</button>
                                    </div>
                                    <span class="price text-r text-r-m">24 999,00</span>
                                </li>
                            </ul>
                            <div class="cart-form-deliver">
                                <span class="cart-form-deliver-i text-r text-r-m">Доставка</span>
                                <span class="cart-form-pickup-i text-r text-r-m">Самовывоз</span>
                                <span class="cart-form-price-i text-r text-r-m">0,00</span>
                            </div>
                            <div class="cart-form-promo">
                                <div class="sum-price">
                                    <div class="sum-price-box">
                                        <span class="text-sb text-sb-s">Общая сумма</span>
                                        <span class="text-r text-r-m"   >24 999,00</span>
                                    </div>
                                </div>
                                <div class="promo-box">
                                    <span class="text-r text-r-m text-r-greey">У меня есть промокод</span>
                                    <button class="btn btn-xxm btn-blue">Применить</button>
                                </div>
                            </div>
                            <div class="total-amount">
                                <span class="text-sb text-sb-xxl text-sb-blue">К оплате</span>
                                <span class="text-sb text-sb-xxl text-sb-blue">24 999,00</span>
                            </div>
                        </form>

                    </div>
                </div>


                <div  class="order-right">
                    <h2 class="text-sb text-sb-xxl">Мой заказ</h2>
                    <div>
                        <form id="save_cart" method="POST" action="{{route('catalog.order.store')}}" class="cart-form">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ auth()->id() }}" >
                            <div class="cart-form-header">
                                <p class="h-t1 text-r text-r-m text-r-vh-greey">Товары</p>
                                <p class="h-t2 text-r text-r-m text-r-vh-greey">Количество</p>
                                <p class="h-t3 text-r text-r-m text-r-vh-greey">Сумма</p>
                            </div>
                            <ul class="cart-form-body">

                                @php $summ = 0 @endphp
                                @foreach($session_cart = session('cart') as $id => $details)
                                    @if($id !== 'total_summ')
                                        @php $summ = $details['summ'] @endphp
                                        <li class="cart-form-body-item"  id="li_in_cart-{{ $id }}" >
                                            <button class="icon-close deleteItem remove-from-cart" type="button" data-id="{{ $id }}" ></button>
                                            <picture>
                                                <source srcset="{{ asset('/img/1.webp')}}" type="image/webp">
                                                <img src="{{ asset('/img/1.png')}}" alt=""></picture>
                                            <p class="text-r text-r-m">{{ $details['name'] }}</p>
                                            <div class="item-current">
                                                <button class="btn-decrement text-r text-r-m update-cart" type="button" data-id="{{ $id }}" >-</button>
                                                <input class="iterator text-r text-r-m" type="text" id="input_in_cart-{{ $id }}" name="products[{{ $id }}]['quantity']" value="{{ $details['quantity'] ?? 1 }}"  >
                                                <button class="btn-increment text-r text-r-m update-cart" data-id="{{ $id }}"  type="button">+</button>
                                            </div>
                                            <span class="price text-r text-r-m"  id="summ_in_cart-{{ $id }}" >{{ number_format($summ,2,","," ") }}</span>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                            <div class="cart-form-promo">
                                <div class="sum-price">
                                    <div class="sum-price-box">
                                        <span class="text-sb text-sb-s">Общая сумма</span>
                                        <span class="text-r text-r-m"  id="total_summ_in_cart" >{{ number_format($session_cart['total_summ'],2,","," ") }}</span>
                                    </div>
                                    <div class="sum-price-box">
                                        <span class="text-sb text-sb-s">Доставка</span>
                                        <span class="text-r text-r-m">0,00</span>
                                    </div>
                                </div>
                                <div class="total-amount">
                                    <span class="text-sb text-sb-xxl text-sb-blue">К оплате</span>
                                    <span class="text-sb text-sb-xxl text-sb-blue">24 999,00</span>
                                </div>
                                <div class="promo-box">
                                    <button type="submit" class="btn btn-xxxm btn-h53 btn-orange">Заказ подтверждаю
                                    </button>
                                </div>
                                <div class="user-agreement">
                                    <p class="text-r text-r-m">
                                        Продолжая, вы соглашаетесь
                                        с <a class="text-r-blue" href="#">Пользовательским соглашением</a></p>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>


            </div>
            <div class="order-mid">
                <p class="text-sb text-sb-xxl">Спасибо, вы подтвердили свой заказ!</p>
            </div>
        </div>
    </div>
</main>
@endsection
