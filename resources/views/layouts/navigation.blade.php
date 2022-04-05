<header class="header">
    <div class="container">
        <div class="top_header">
            <div class="left_width">
                <a href="/" class="link_logo">
                    <span class="icon_logo"></span>
                </a>
            </div>
            <div class="right_width">
                <div class="menu_head">
                    <a href="#">
                        Акции
                    </a>
                    <a href="#">
                        Блог
                    </a>
                    <a href="#">
                        О компании
                    </a>
                    <a href="#">
                        Контакты
                    </a>
                </div>
                <div class="wrap_select_tel">
                    <span class="icon icon_tel"></span>
                    <a href="#">+7 (000) 000-00-10</a>
                    <span class="icon icon_arr_bottom"></span>
                    <div class="wrap_tel_absolute">
                        <a href="#">+7 (000) 000-00-10</a>
                        <a href="#">+7 (000) 000-00-10</a>
                        <a href="#">+7 (000) 000-00-10</a>
                    </div>
                </div>
                <div class="wrap_lang">
                    <a href="#">Ua</a>
                    <span>|</span>
                    <a href="#" class="active">Ru</a>
                    <span>|</span>
                    <a href="#">En</a>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom_header">
        <div class="container">
            <div class="bh_content">
                <div class="left_width">
                    <div class="menu_burger">
                        <div class="burger">
                            <span></span>
                        </div>
                        Каталог
                    </div>
                </div>

                <div class="right_width">
                    <div class="wrap_search">
                        <input type="text" placeholder="Поиск">
                        <button class="my_btn">Найти</button>
                    </div>
                    <div class="wrap_panel_icons">
                        <a href="#" class="icon icon_user"></a>
                        <a href="#" class="icon icon_scales"><span>28</span></a>
                        <a href="{{ route('wishlist') }}" class="icon icon_heart"><span>28</span></a>
                        <a href="#" class="icon icon_basket"><span>28</span></a>
                    </div>
                    <div class="wrap_panel_icons_mobile">
                        <a href="#" class="icon icon_basket4">
                            <span>12</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="menu_catalog_wrap">
        <div class="container">
            @include('layouts.components.menu-catalog')
        </div>
    </div>
</header>
