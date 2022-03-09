<header class="menu-bg">
    <div class="menu">
        <div class="menu-top container">
            <div class="menu-top-cont callback">
                <a class="callback-link text-b text-b-xxs" href=""><i class="icon-phone"></i>
                    <span>{{ $contacts['phone'] ?? '' }}</span></a>
                <button class="text-r text-r-m text-r-blue callback-btn"
                        onclick="$('#exampleModal6').arcticmodal();">Заказать звонок</button>
            </div>
            <a class="logo" href=""><picture><source srcset="{{ asset('dist/img/logo.webp')}}" type="image/webp"><img src="{{ asset('dist/img/logo.png')}}" alt=""></picture></a>
            <button class="phone-menu btn btn-s btn-orange clickBtn2">
	<span class="burger-wrap  menu-wrap">
		<span class="burger"></span>
	</span>
            </button>
            <form class="menu-top-cont form-s">
                <input class="form-s-search" type="search" placeholder="Поиск">
                <button class="btn btn-orange">Найти</button>
            </form>
            <div class="menu-top-cont w15">
                <ul class="menu-top-cont-user center topmenu">
                    <li class="submenu-link text-r text-r-m">
                        <i class="icon-user2"></i>
                        <span>Мой кабинет</span>
                        <ul class="submenu">
                            @guest
                                <li class="submenu-i"><button class="text-r text-r-m text-r-blue"
                                                              onclick="$('#exampleModal4').arcticmodal();">Регистрация</button>
                                </li>
                                <li class="submenu-i">
                                    <button class="text-r text-r-m text-r-blue"
                                            onclick="$('#exampleModal5').arcticmodal();">Войти</button>
                                </li>
                            @else
                                <li class="submenu-i"><a class="text-r text-r-m text-r-blue" href="{{ route('admin.index')}}">Админ</a></li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <li class="submenu-i">
                                        <a class="text-r text-r-m text-r-blue" href="route('logout')"
                                           onclick="event.preventDefault();
                                            this.closest('form').submit();"
                                        >{{ __('Log Out') }}</a>
                                    </li>
                                </form>
                            @endguest
                        </ul>
                    </li>
                </ul>
                <div class="menu-top-cont-c">
                    <a class="text-sb" href=""><i class="icon-favorite"></i><span>1</span></a>
                </div>
                <div class="menu-top-cont-c cart">
                    <button class="text-sb" onclick="$('#exampleModal0').arcticmodal();"><i
                         class="icon-shopping_cart"></i>{!! session('cart') ? '<span>'.(count((array) session('cart')) - 1).'</span>': '' !!}</button>
                </div>
            </div>
        </div>
        <div class="border-bot"></div>
        <div class="menu-bot menu-b-t container">
            <div class="menu-bot-cont">
                <a class="logo" href="{{ route('index') }}"><picture><source srcset="{{ asset('/img/logo.webp')}}" type="image/webp"><img src="{{ asset('/img/logo.png')}}" alt=""></picture></a>
                <button class="menu-bot-cont-catalog-item btn btn-m btn-cat-menu btn-orange clickBtn1"
                        onclick="onCatalog(this)">
						<span class="burger-wrap catalog-wrap">
							<span class="burger"></span>
						</span>
                    Каталог
                </button>
                <ul class="menu-bot-cont-catalog catalog top-menu" style="display: none;">
                    <li class="catalog-link text-r" onclick="dropCatalog(this)">
                        <i class="icon-cricle center"></i>
                        <a class="text-r text-r-l" href="">Конфигуратор ПК</a>
                        <ul class="sub-menu" style="display: none;">
                            <li class="sub-menu-link">
                                <a class="text-r text-r-l" href="">
                                    Конфигуратор ПК1
                                </a>
                            </li>
                            <li class="sub-menu-link">
                                <a class="text-r text-r-l" href="">
                                    Конфигуратор ПК2
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="catalog-link text-r" onclick="dropCatalog(this)">
                        <i class="icon-cricle center"></i>
                        <a class="text-r text-r-l" href="">Конфигуратор ПК</a>
                        <ul class="sub-menu" style="display: none;">
                            <li class="sub-menu-link">
                                <a class="text-r text-r-l" href="">
                                    Конфигуратор ПК
                                </a>
                            </li>
                            <li class="sub-menu-link">
                                <a class="text-r text-r-l" href="">
                                    Конфигуратор ПК
                                </a>
                            </li>
                            <li class="sub-menu-link">
                                <a class="text-r text-r-l" href="">
                                    Конфигуратор ПК
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="catalog-link text-r" onclick="dropCatalog(this)">
                        <i class="icon-cricle center"></i>
                        <a class="text-r text-r-l" href="">Конфигуратор ПК</a>
                        <ul class="sub-menu" style="display: none;">
                            <li class="sub-menu-link">
                                <a class="text-r text-r-l" href="">
                                    Конфигуратор ПК1
                                </a>
                            </li>
                            <li class="sub-menu-link">
                                <a class="text-r text-r-l" href="">
                                    Конфигуратор ПК2
                                </a>
                            </li>
                            <li class="sub-menu-link">
                                <a class="text-r text-r-l" href="">
                                    Конфигуратор ПК3
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <nav class="menu-bot-cont w50">
                <ul class="menu-bot-cont-menu">
                    <li class="menu-bot-cont-menu-i"><a class="text-sb text-sb-m" href="">Акции</a></li>
                    <li class="menu-bot-cont-menu-i"><a class="text-sb text-sb-m" href="">Как купить</a></li>
                    <li class="menu-bot-cont-menu-i"><a class="text-sb text-sb-m" href="{{ route('blogs.index') }}">Блог</a>
                    </li>
                    <li class="menu-bot-cont-menu-i"><a class="text-sb text-sb-m" href="">Услуги</a></li>
                    <li class="menu-bot-cont-menu-i"><a class="text-sb text-sb-m" href="">О компании</a></li>
                    <li class="menu-bot-cont-menu-i"><a class="text-sb text-sb-m" href="">Контакты</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>
<div class="popup-fade"></div>