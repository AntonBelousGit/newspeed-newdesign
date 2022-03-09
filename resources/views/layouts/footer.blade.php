<footer>
    <div class="bg-p bg-Cb">
        <div class="footer container">
            <div class="footer-box-search">
                <picture>
                    <source srcset="./img/logo-fut.webp" type="image/webp">
                    <img src="./img/logo-fut.png" alt=""></picture>
                <p class="footer-text footer-text-top">Подписаться
                    на нашу рассылку</p>
                <form class="spase-b-c form-s">
                    <input class="form-s-search form-s-search-max" type="email" placeholder="Введите ваш e-mail">
                    <button class="btn btn-m btn-orange">Подписаться</button>
                </form>
                <div class="spase-b-c">
                    <p class="text-r text-r-white">©Marketplace.com/2021</p>
                    <p class="text-r text-r-white">Разработка <a class="text-b text-b-white" href="">WG-Studio</a></p>
                </div>
            </div>
            <nav class="footer-box-nav spase-b-c">
                <ul>
                    <li class="footer-text footer-text-top">Товары</li>
                    <li><a class="footer-text">Акции</a></li>
                    <li><a class="footer-text">Бренды</a></li>
                    <li><a class="footer-text">Обзоры</a></li>
                    <li><a class="footer-text">Услуги</a></li>
                    <li><a class="footer-text">Premium</a></li>
                    <li><a class="footer-text">Подарочные сертификаты</a></li>
                </ul>
                <ul>
                    <li class="footer-text footer-text-top">Поддержка</li>
                    <li><a class="footer-text">Оплата</a></li>
                    <li><a class="footer-text">Доставка</a></li>
                    <li><a class="footer-text">Гарантия</a></li>
                    <li><a class="footer-text">Кредит</a></li>
                    <li><a class="footer-text">Возврат товара</a></li>
                    <li><a class="footer-text">Сервисные центры</a></li>
                </ul>
                <ul class="phone-two-coll">
                    <li class="footer-text footer-text-top">Компания</li>
                    <li><a class="footer-text">О нас</a></li>
                    <li><a class="footer-text">Контакты</a></li>
                    <li><a class="footer-text">Вакансии</a></li>
                    <li><a class="footer-text">Сотрудничество</a></li>
                    <li><a class="footer-text">Партнеры</a></li>
                    <li><a class="footer-text">Пользование сайтом</a></li>
                </ul>
            </nav>
            <div class="footer-box-social">
                <div class="footer-box-social-box1">
                    <p class="footer-text footer-text-top">Устанавливайте наши приложения</p>
                    <div>
                        <picture>
                            <source srcset="./img/google.webp" type="image/webp">
                            <img src="./img/google.png" alt=""></picture>
                        <picture>
                            <source srcset="./img/app.webp" type="image/webp">
                            <img src="./img/app.png" alt=""></picture>
                    </div>
                </div>
                <div class="footer-box-social-box2">
                    <p class="footer-text footer-text-top">Мы в соцсетях</p>
                    <ul>
                        <li><a><i class="icon-instagram"></i></a></li>
                        <li><a><i class="icon-yotobe"></i></a></li>
                        <li><a><i class="icon-facebooc"></i></a></li>
                        <li><a><i class="icon-viber"></i></a></li>
                        <li><a><i class="icon-telegram"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="on-phone spase-b-c">
                <p class="text-r text-r-white">©Marketplace.com/2021</p>
                <p class="text-r text-r-white">Разработка <a class="text-b text-b-white" href="">WG-Studio</a></p>
            </div>
        </div>
    </div>
</footer>
<div style="display: none;">
    <div class="cart-bg box-modal box-modal-qb" id="exampleModal0">
        <div class="cart">
            <div class="cart-title text-sb text-sb-xxl text-sb-blue"><i class="icon-shopping_cart"></i> Корзина</div>
            <p class="text-r text-r-l"></p>
            <form class="cart-form">
                <div class="cart-form-header">
                    <p class="h-t1 text-r text-r-m text-r-vh-greey">Товары</p>
                    <p class="h-t2 text-r text-r-m text-r-vh-greey">Количество</p>
                    <p class="h-t3 text-r text-r-m text-r-vh-greey">Сумма</p>
                </div>
                @php
                    $cart =\Gloudemans\Shoppingcart\Facades\Cart::instance('shopping');
                @endphp
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
                <div class="cart-form-footer">
                    <div class="cart-form-footer-box">
						<span class="text-sb text-sb-xxl text-sb-blue">
							Итого
						</span>
                        <span class="text-r text-r-m">
							без учета доставки
						</span>
                    </div>
                    <span class="text-sb text-sb-xxl text-sb-blue">
						{{$cart->subtotal()}}
					</span>
                </div>
                <div class="bot-btn">
                    <div class="box-modal_close arcticmodal-close">
                        <button class="btn btn-xxm btn-greey" type="button">Продолжить покупки</button>
                    </div>
                    <a href="{{route('checkout.index')}}" class="btn btn-xxl btn-orange">Оформить заказ
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
<div style="display: none;">
    <div class="box-modal" id="exampleModal4">
        <div class="box-modal_close arcticmodal-close"><span class="castom-x"></span></div>
        <div class="registration">
            <h6 class="text-sb text-sb-xxl text-sb-blue">Регистрация</h6>
            <form class="registration-form">
                <input type="tel" placeholder="Номер телефона">
                <input type="password" placeholder="Пароль">
                <input type="text" placeholder="Имя">
                <input type="text" placeholder="Фамилия">
                <input type="text" placeholder="E-mail">
                <button class="btn btn-xs btn-orange">Создать аккаунт</button>
                <div class="agreement">
                    <p>Продолжая, вы соглашаетесь с.</p>
                    <a href="">Пользовательским соглашением</a>
                </div>
                <div class="or text-r text-r-l">
                    <span>или</span>
                </div>
                <p class="text-r text-r-l">Зарегистрироваться с помощью</p>
                <div class="google-facebook">
                    <button>G</button>
                    <button>F</button>
                </div>
                <p class="text-r">Мы не передаем социальных сетям ваших данных</p>
                <button type="button" class="text-b text-b-darck-blue" onclick="closeOpen2();">Уже есть
                    аккаунт?
                    Войди
                </button>
            </form>
        </div>
        <div class="box-modal_close arcticmodal-close"><span class="castom-x"></span></div>
    </div>
</div>
<div style="display: none;">
    <div class="box-modal" id="exampleModal5">
        <div class="box-modal_close arcticmodal-close"><span class="castom-x"></span></div>
        <div class="registration">
            <h6 class="text-sb text-sb-xxl text-sb-blue">Авторизация</h6>
            <form class="registration-form">
                <input type="password" placeholder="Пароль">
                <input type="text" placeholder="E-mail">
                <button class="btn btn-xs btn-orange">Войти в аккаунт</button>
                <div class="agreement">
                    <p>Продолжая, вы соглашаетесь с.</p>
                    <a href="">Пользовательским соглашением</a>
                </div>
                <div class="or text-r text-r-l">
                    <span>или</span>
                </div>
                <p class="text-r text-r-l">Зарегистрироваться с помощью</p>
                <div class="google-facebook">
                    <button>G</button>
                    <button>F</button>
                </div>
                <p class="text-r">Мы не передаем социальных сетям ваших данных</p>
                <button type="button" class="text-b text-b-darck-blue" onclick="closeOpen1();">Нет
                    аккаунта?
                    Зарегистрируйся
                </button>
            </form>
        </div>
        <div class="box-modal_close arcticmodal-close"><span class="castom-x"></span></div>
    </div>
</div>
<div style="display: none;">
    <div class="box-modal" id="exampleModal6">
        <!-- <div class="box-modal_close arcticmodal-close"><span class="castom-x"></span></div> -->
        <div class="emailBack-box call">
            <h6 class="text-sb text-sb-l text-sb-blue call-h6"><i class="icon-phone"></i> Заказать обратный звонок</h6>
            <form class="emailBack-box-form call-f">
                <input type="text" placeholder="Ваше имя">
                <input id="phoneA" type="tel" name="tel" placeholder=''>
                <div class="box-modal_close arcticmodal-close">
                    <button class="btn btn-m btn-greey" type="button">Отменить</button>
                </div>
                <button class="btn btn-xs btn-orange" id="phoneAbtn" onclick="closeOpen3();">Перезвоните мне</button>
            </form>
        </div>
    </div>
</div>
<div style="display: none;">
    <div class="box-modal" id="exampleModal7">
        <div class="box-modal_close arcticmodal-close"><span class="castom-x"></span></div>
        <div class="thank-you">
            <h6 class="text-sb text-sb-l text-sb-blue">Ожидайте звонок</h6>
            <div>

            </div>
            <p class="text-r text-r-l">Сейчас вам с номера <span class="text-b text-b-xxs"> +7 (000) 000-00-10 </span>
                позвонит наш менеджер</p>
        </div>
    </div>
</div>
