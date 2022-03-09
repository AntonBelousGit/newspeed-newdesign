<header class="menu-bg">
    <div class="menu">
        <div class="menu-top container">
            <div class="menu-top-cont callback">
                <a class="callback-link text-b text-b-xxs" href=""><i class="icon-phone"></i>
                    <span> +7 (000) 000-00-10</span></a>
                <button class="text-r text-r-m text-r-blue callback-btn"
                        onclick="$('#exampleModal6').arcticmodal();">Заказать звонок</button>
            </div>
            <a class="logo" href=""><picture><source srcset="./img/logo.webp" type="image/webp"><img src="./img/logo.png" alt=""></picture></a>
            <button class="phone-menu btn btn-s btn-orange clickBtn2">
	<span class="burger-wrap  menu-wrap">
		<span class="burger"></span>
	</span>
            </button>
            <form class="menu-top-cont form-s" method="GET" action="{{ route('search') }}">
                <input class="form-s-search" type="search" name="name" placeholder="Поиск">
                <button class="btn btn-orange">Найти</button>
            </form>
            <div class="menu-top-cont w15">
                <ul class="menu-top-cont-user center topmenu">
                    <li class="submenu-link text-r text-r-m">
                        <i class="icon-user2"></i>
                        <span>Мой кабинет</span>
                        <ul class="submenu">
                            <li class="submenu-i"><a class="text-r text-r-m text-r-blue" href="">Админ</a></li>
                            <li class="submenu-i"><button class="text-r text-r-m text-r-blue"
                                                          onclick="$('#exampleModal4').arcticmodal();">Регистрация</button>
                            </li>
                            <li class="submenu-i">
                                <button class="text-r text-r-m text-r-blue"
                                        onclick="$('#exampleModal5').arcticmodal();">Войти</button>
                            </li>
                            <li class="submenu-i"><a class="text-r text-r-m text-r-blue" href="">Выход</a></li>
                        </ul>
                    </li>
                </ul>
                <div class="menu-top-cont-c">
                    <a class="text-sb" href=""><i class="icon-favorite"></i><span>1</span></a>
                </div>
                <div class="menu-top-cont-c cart" id="header-ajax">
                    @php
                        $cart =\Gloudemans\Shoppingcart\Facades\Cart::instance('shopping');
                    @endphp
                    <button class="text-sb" onclick="$('#exampleModal0').arcticmodal();"><i
                            class="icon-shopping_cart"></i><span>{{$cart->count()}}</span></button>
                </div>
            </div>
        </div>
        <div class="border-bot"></div>
        <div class="menu-bot menu-b-t container">
            <div class="menu-bot-cont">
                <a class="logo" href=""><picture><source srcset="./img/logo.webp" type="image/webp"><img src="./img/logo.png" alt=""></picture></a>
                <button class="menu-bot-cont-catalog-item btn btn-m btn-cat-menu btn-orange clickBtn1"
                        onclick="onCatalog(this)">
						<span class="burger-wrap catalog-wrap">
							<span class="burger"></span>
						</span>
                    Каталог
                </button>
                <ul class="menu-bot-cont-catalog catalog top-menu">
                    @if(isset($categories))
                        @foreach($categories as $category)
                            <li class="catalog-link text-r" onclick="dropCatalog(this)">
                                <i class="icon-cricle center"></i>
                                <a class="text-r text-r-l"
                                   href="{{route('catalog.category',['category'=> $category->slug ])}}">{{$category->name}}</a>
                                <ul class="sub-menu" style="display: none;">
                                    @foreach ($category->childrenCategories as $childCategory)
                                        @include('components.child_category', ['child_category' => $childCategory])
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>
            <nav class="menu-bot-cont w50">
                <ul class="menu-bot-cont-menu">
                    <li class="menu-bot-cont-menu-i"><a class="text-sb text-sb-m" href="">Акции</a></li>
                    <li class="menu-bot-cont-menu-i"><a class="text-sb text-sb-m" href="">Как купить</a></li>
                    <li class="menu-bot-cont-menu-i"><a class="text-sb text-sb-m" href="./page-blog.html">Блог</a>
                    </li>
                    <li class="menu-bot-cont-menu-i"><a class="text-sb text-sb-m" href="">Услуги</a></li>
                    <li class="menu-bot-cont-menu-i"><a class="text-sb text-sb-m" href="">О компании</a></li>
                    <li class="menu-bot-cont-menu-i"><a class="text-sb text-sb-m" href="">Контакты</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>
