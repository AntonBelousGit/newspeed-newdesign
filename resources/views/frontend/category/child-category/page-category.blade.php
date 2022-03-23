@extends('layouts.app')


@section('content')
<section class="transport-section section">
    <div class="container">
        <h3>
            {{$category->name}}
        </h3>
        <div class="list_type_product">
            @foreach($category->childrenCategories as $item)
            <a href="{{route('catalog.category',['category'=>$item->slug])}}" class="ltp_item">
                <div class="wrap_img">
                    <picture>
                        <source srcset="{{asset('assets/uploads/category/')}}/{{$item->image}}" type="image/webp">
                        <img src="{{asset('assets/uploads/category/')}}/{{$item->image}}" alt="img"></picture>
                </div>
                <div class="ltp_name">
                    {{$item->name}}
                </div>
            </a>
            @endforeach
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
                        <a href="#" class="icon icon_scales2"></a>
                        <a href="#" class="icon icon_heart2"></a>
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
                        <button class="my_btn btn_basket">
                            <div class="icon icon_basket2"></div>
                        </button>
                    </div>
                </div>
                <div class="item_product">
                    <a href="#" class="wrap_img">
                        <picture>
                            <source srcset="./img/product2.webp" type="image/webp">
                            <img src="./img/product2.jpg" alt="img"></picture>
                    </a>
                    <a href="#" class="name_product">
                        Телевизор Gazer 43" Full HD Smart TV (TV43-FS2)
                    </a>
                    <div class="wrap_compare">
                        <a href="#" class="icon icon_scales2"></a>
                        <a href="#" class="icon icon_heart2"></a>
                    </div>
                    <div class="wrap_basket">
                        <div class="price_product">
                            <div class="new_price">
                                12 699 грн.
                            </div>
                        </div>
                        <button class="my_btn btn_basket">
                            <div class="icon icon_basket2"></div>
                        </button>
                    </div>
                </div>
                <div class="item_product">
                    <a href="#" class="wrap_img">
                        <picture>
                            <source srcset="./img/product2.webp" type="image/webp">
                            <img src="./img/product2.jpg" alt="img"></picture>
                    </a>
                    <a href="#" class="name_product">
                        Телевизор Gazer 43" Full HD Smart TV (TV43-FS2)
                    </a>
                    <div class="wrap_compare">
                        <a href="#" class="icon icon_scales2"></a>
                        <a href="#" class="icon icon_heart2"></a>
                    </div>
                    <div class="wrap_basket">

                        <div class="price_product">
                            <div class="old_price">
                                <p>29 499 грн.</p>
                                <span>-27%</span>
                            </div>
                            <div class="new_price">
                                12 699 грн.
                            </div>
                        </div>
                        <button class="my_btn btn_basket">
                            <div class="icon icon_basket2"></div>
                        </button>
                    </div>
                </div>
                <div class="item_product">
                    <a href="#" class="wrap_img">
                        <picture>
                            <source srcset="./img/product2.webp" type="image/webp">
                            <img src="./img/product2.jpg" alt="img"></picture>
                    </a>
                    <a href="#" class="name_product">
                        Телевизор Gazer 43" Full HD Smart TV (TV43-FS2)
                    </a>
                    <div class="wrap_compare">
                        <a href="#" class="icon icon_scales2"></a>
                        <a href="#" class="icon icon_heart2"></a>
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
                        <button class="my_btn btn_basket">
                            <div class="icon icon_basket2"></div>
                        </button>
                    </div>
                </div>
                <div class="item_product">
                    <a href="#" class="wrap_img">
                        <picture>
                            <source srcset="./img/product2.webp" type="image/webp">
                            <img src="./img/product2.jpg" alt="img"></picture>
                    </a>
                    <a href="#" class="name_product">
                        Телевизор Gazer 43" Full HD Smart TV (TV43-FS2)
                    </a>
                    <div class="wrap_compare">
                        <a href="#" class="icon icon_scales2"></a>
                        <a href="#" class="icon icon_heart2"></a>
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
                        <button class="my_btn btn_basket">
                            <div class="icon icon_basket2"></div>
                        </button>
                    </div>
                </div>
                <div class="item_product">
                    <a href="#" class="wrap_img">
                        <picture>
                            <source srcset="./img/product2.webp" type="image/webp">
                            <img src="./img/product2.jpg" alt="img"></picture>
                    </a>
                    <a href="#" class="name_product">
                        Телевизор Gazer 43" Full HD Smart TV (TV43-FS2)
                    </a>
                    <div class="wrap_compare">
                        <a href="#" class="icon icon_scales2"></a>
                        <a href="#" class="icon icon_heart2"></a>
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
                        <button class="my_btn btn_basket">
                            <div class="icon icon_basket2"></div>
                        </button>
                    </div>
                </div>
                <div class="item_product">
                    <a href="#" class="wrap_img">
                        <picture>
                            <source srcset="./img/product2.webp" type="image/webp">
                            <img src="./img/product2.jpg" alt="img"></picture>
                    </a>
                    <a href="#" class="name_product">
                        Телевизор Gazer 43" Full HD Smart TV (TV43-FS2)
                    </a>
                    <div class="wrap_compare">
                        <a href="#" class="icon icon_scales2"></a>
                        <a href="#" class="icon icon_heart2"></a>
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
                        <button class="my_btn btn_basket">
                            <div class="icon icon_basket2"></div>
                        </button>
                    </div>
                </div>
                <div class="item_product">
                    <a href="#" class="wrap_img">
                        <picture>
                            <source srcset="./img/product2.webp" type="image/webp">
                            <img src="./img/product2.jpg" alt="img"></picture>
                    </a>
                    <a href="#" class="name_product">
                        Телевизор Gazer 43" Full HD Smart TV (TV43-FS2)
                    </a>
                    <div class="wrap_compare">
                        <a href="#" class="icon icon_scales2"></a>
                        <a href="#" class="icon icon_heart2"></a>
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
                        <button class="my_btn btn_basket">
                            <div class="icon icon_basket2"></div>
                        </button>
                    </div>
                </div>
                <div class="item_product">
                    <a href="#" class="wrap_img">
                        <picture>
                            <source srcset="./img/product2.webp" type="image/webp">
                            <img src="./img/product2.jpg" alt="img"></picture>
                    </a>
                    <a href="#" class="name_product">
                        Телевизор Gazer 43" Full HD Smart TV (TV43-FS2)
                    </a>
                    <div class="wrap_compare">
                        <a href="#" class="icon icon_scales2"></a>
                        <a href="#" class="icon icon_heart2"></a>
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
                        <button class="my_btn btn_basket">
                            <div class="icon icon_basket2"></div>
                        </button>
                    </div>
                </div>
                <div class="item_product">
                    <a href="#" class="wrap_img">
                        <picture>
                            <source srcset="./img/product2.webp" type="image/webp">
                            <img src="./img/product2.jpg" alt="img"></picture>
                    </a>
                    <a href="#" class="name_product">
                        Телевизор Gazer 43" Full HD Smart TV (TV43-FS2)
                    </a>
                    <div class="wrap_compare">
                        <a href="#" class="icon icon_scales2"></a>
                        <a href="#" class="icon icon_heart2"></a>
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
                        <button class="my_btn btn_basket">
                            <div class="icon icon_basket2"></div>
                        </button>
                    </div>
                </div>
                <div class="item_product">
                    <a href="#" class="wrap_img">
                        <picture>
                            <source srcset="./img/product2.webp" type="image/webp">
                            <img src="./img/product2.jpg" alt="img"></picture>
                    </a>
                    <a href="#" class="name_product">
                        Телевизор Gazer 43" Full HD Smart TV (TV43-FS2)
                    </a>
                    <div class="wrap_compare">
                        <a href="#" class="icon icon_scales2"></a>
                        <a href="#" class="icon icon_heart2"></a>
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
                        <button class="my_btn btn_basket">
                            <div class="icon icon_basket2"></div>
                        </button>
                    </div>
                </div>
                <div class="item_product">
                    <a href="#" class="wrap_img">
                        <picture>
                            <source srcset="./img/product2.webp" type="image/webp">
                            <img src="./img/product2.jpg" alt="img"></picture>
                    </a>
                    <a href="#" class="name_product">
                        Телевизор Gazer 43" Full HD Smart TV (TV43-FS2)
                    </a>
                    <div class="wrap_compare">
                        <a href="#" class="icon icon_scales2"></a>
                        <a href="#" class="icon icon_heart2"></a>
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
                        <button class="my_btn btn_basket">
                            <div class="icon icon_basket2"></div>
                        </button>
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
                Просмотренные товары
            </h3>
            <div class="list_product">
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
                        <a href="#" class="icon icon_scales2"></a>
                        <a href="#" class="icon icon_heart2"></a>
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
                        <button class="my_btn btn_basket">
                            <div class="icon icon_basket2"></div>
                        </button>
                    </div>
                </div>
                <div class="item_product">
                    <a href="#" class="wrap_img">
                        <picture>
                            <source srcset="./img/product2.webp" type="image/webp">
                            <img src="./img/product2.jpg" alt="img"></picture>
                    </a>
                    <a href="#" class="name_product">
                        Телевизор Gazer 43" Full HD Smart TV (TV43-FS2)
                    </a>
                    <div class="wrap_compare">
                        <a href="#" class="icon icon_scales2"></a>
                        <a href="#" class="icon icon_heart2"></a>
                    </div>
                    <div class="wrap_basket">
                        <div class="price_product">
                            <div class="new_price">
                                12 699 грн.
                            </div>
                        </div>
                        <button class="my_btn btn_basket">
                            <div class="icon icon_basket2"></div>
                        </button>
                    </div>
                </div>
                <div class="item_product">
                    <a href="#" class="wrap_img">
                        <picture>
                            <source srcset="./img/product2.webp" type="image/webp">
                            <img src="./img/product2.jpg" alt="img"></picture>
                    </a>
                    <a href="#" class="name_product">
                        Телевизор Gazer 43" Full HD Smart TV (TV43-FS2)
                    </a>
                    <div class="wrap_compare">
                        <a href="#" class="icon icon_scales2"></a>
                        <a href="#" class="icon icon_heart2"></a>
                    </div>
                    <div class="wrap_basket">

                        <div class="price_product">
                            <div class="old_price">
                                <p>29 499 грн.</p>
                                <span>-27%</span>
                            </div>
                            <div class="new_price">
                                12 699 грн.
                            </div>
                        </div>
                        <button class="my_btn btn_basket">
                            <div class="icon icon_basket2"></div>
                        </button>
                    </div>
                </div>
                <div class="item_product">
                    <a href="#" class="wrap_img">
                        <picture>
                            <source srcset="./img/product2.webp" type="image/webp">
                            <img src="./img/product2.jpg" alt="img"></picture>
                    </a>
                    <a href="#" class="name_product">
                        Телевизор Gazer 43" Full HD Smart TV (TV43-FS2)
                    </a>
                    <div class="wrap_compare">
                        <a href="#" class="icon icon_scales2"></a>
                        <a href="#" class="icon icon_heart2"></a>
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
                        <button class="my_btn btn_basket">
                            <div class="icon icon_basket2"></div>
                        </button>
                    </div>
                </div>
                <div class="item_product">
                    <a href="#" class="wrap_img">
                        <picture>
                            <source srcset="./img/product2.webp" type="image/webp">
                            <img src="./img/product2.jpg" alt="img"></picture>
                    </a>
                    <a href="#" class="name_product">
                        Телевизор Gazer 43" Full HD Smart TV (TV43-FS2)
                    </a>
                    <div class="wrap_compare">
                        <a href="#" class="icon icon_scales2"></a>
                        <a href="#" class="icon icon_heart2"></a>
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
                        <button class="my_btn btn_basket">
                            <div class="icon icon_basket2"></div>
                        </button>
                    </div>
                </div>
                <div class="item_product">
                    <a href="#" class="wrap_img">
                        <picture>
                            <source srcset="./img/product2.webp" type="image/webp">
                            <img src="./img/product2.jpg" alt="img"></picture>
                    </a>
                    <a href="#" class="name_product">
                        Телевизор Gazer 43" Full HD Smart TV (TV43-FS2)
                    </a>
                    <div class="wrap_compare">
                        <a href="#" class="icon icon_scales2"></a>
                        <a href="#" class="icon icon_heart2"></a>
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
                        <button class="my_btn btn_basket">
                            <div class="icon icon_basket2"></div>
                        </button>
                    </div>
                </div>
                <div class="item_product">
                    <a href="#" class="wrap_img">
                        <picture>
                            <source srcset="./img/product2.webp" type="image/webp">
                            <img src="./img/product2.jpg" alt="img"></picture>
                    </a>
                    <a href="#" class="name_product">
                        Телевизор Gazer 43" Full HD Smart TV (TV43-FS2)
                    </a>
                    <div class="wrap_compare">
                        <a href="#" class="icon icon_scales2"></a>
                        <a href="#" class="icon icon_heart2"></a>
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
                        <button class="my_btn btn_basket">
                            <div class="icon icon_basket2"></div>
                        </button>
                    </div>
                </div>
                <div class="item_product">
                    <a href="#" class="wrap_img">
                        <picture>
                            <source srcset="./img/product2.webp" type="image/webp">
                            <img src="./img/product2.jpg" alt="img"></picture>
                    </a>
                    <a href="#" class="name_product">
                        Телевизор Gazer 43" Full HD Smart TV (TV43-FS2)
                    </a>
                    <div class="wrap_compare">
                        <a href="#" class="icon icon_scales2"></a>
                        <a href="#" class="icon icon_heart2"></a>
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
                        <button class="my_btn btn_basket">
                            <div class="icon icon_basket2"></div>
                        </button>
                    </div>
                </div>
                <div class="item_product">
                    <a href="#" class="wrap_img">
                        <picture>
                            <source srcset="./img/product2.webp" type="image/webp">
                            <img src="./img/product2.jpg" alt="img"></picture>
                    </a>
                    <a href="#" class="name_product">
                        Телевизор Gazer 43" Full HD Smart TV (TV43-FS2)
                    </a>
                    <div class="wrap_compare">
                        <a href="#" class="icon icon_scales2"></a>
                        <a href="#" class="icon icon_heart2"></a>
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
                        <button class="my_btn btn_basket">
                            <div class="icon icon_basket2"></div>
                        </button>
                    </div>
                </div>
                <div class="item_product">
                    <a href="#" class="wrap_img">
                        <picture>
                            <source srcset="./img/product2.webp" type="image/webp">
                            <img src="./img/product2.jpg" alt="img"></picture>
                    </a>
                    <a href="#" class="name_product">
                        Телевизор Gazer 43" Full HD Smart TV (TV43-FS2)
                    </a>
                    <div class="wrap_compare">
                        <a href="#" class="icon icon_scales2"></a>
                        <a href="#" class="icon icon_heart2"></a>
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
                        <button class="my_btn btn_basket">
                            <div class="icon icon_basket2"></div>
                        </button>
                    </div>
                </div>
                <div class="item_product">
                    <a href="#" class="wrap_img">
                        <picture>
                            <source srcset="./img/product2.webp" type="image/webp">
                            <img src="./img/product2.jpg" alt="img"></picture>
                    </a>
                    <a href="#" class="name_product">
                        Телевизор Gazer 43" Full HD Smart TV (TV43-FS2)
                    </a>
                    <div class="wrap_compare">
                        <a href="#" class="icon icon_scales2"></a>
                        <a href="#" class="icon icon_heart2"></a>
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
                        <button class="my_btn btn_basket">
                            <div class="icon icon_basket2"></div>
                        </button>
                    </div>
                </div>
                <div class="item_product">
                    <a href="#" class="wrap_img">
                        <picture>
                            <source srcset="./img/product2.webp" type="image/webp">
                            <img src="./img/product2.jpg" alt="img"></picture>
                    </a>
                    <a href="#" class="name_product">
                        Телевизор Gazer 43" Full HD Smart TV (TV43-FS2)
                    </a>
                    <div class="wrap_compare">
                        <a href="#" class="icon icon_scales2"></a>
                        <a href="#" class="icon icon_heart2"></a>
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
                        <button class="my_btn btn_basket">
                            <div class="icon icon_basket2"></div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section section-text">
    <div class="container">
        <h3>
            О магазине
        </h3>
        <div class="content_text js-block-open">
            <p class="js-block-open1">
                Маркетплейс не нуждается в каких-то "космических"
                визуальных эффектах, сюда приходят покупатели
                чтоб как можно быстрее найти товар,
                а значит главным требованием к дизайну,
                будет - простота и лаконичность.
                Любая задача, которую будет преследовать пользователь,
                должна выполняться как можно быстрее и проще.
                Любой "лишний" клик или "заумная" форма поиска,
                подачи объявления, может привести к вызову
                негативного отношения к проекту, что не есть хорошо.
                Приходя в Ваш маркетплейс за каким либо товаром,
                пользователь рассчитывает, что получит качественный товар,
                который ничем не будет отличаться от заявленного в описании,
                а значит механизм контроля поставщиков должен
                работать без сбоев, включая в себя рейтинг от
                пользователей, контрольные закупки,
                скорость решения спорных ситуаций, юридические
                верификации (при необходимости) и многие другое.
            </p>
            <div class="open_text js-open-btn" onclick="openBlock(this)">
                Развернуть
                <span class="icon icon_arr_bottom2"></span>
            </div>
        </div>
    </div>
</section>
@endsection


