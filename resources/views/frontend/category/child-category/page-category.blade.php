@extends('layouts.app')


@section('content')
    <main>
        <div class="baners bg-Cw">
            <div class="container">
                <ul class="bread-dots">
                    <li>
                        <a class="text-r" href="/"><i class="text-r icon-home"></i></a>
                    </li>
                    <li>
                        <i class="text-r icon-arrow"></i>
                        <a class="text-r" href="{{route('catalog.category',['category'=>$category->slug])}}">{{$category->name}}</a>
                    </li>
                </ul>
            </div>
            <div class="container">
                <h2 class="title-i">Подкатегории {{$category->name}}</h2>
                <ul class="category">
                    @foreach($category->childrenCategories as $item)
                        <li class="bg-Cw  category-item">
                            <a class="category-img" href="{{route('catalog.category',['category'=>$item->slug])}}">
                                <figure>
                                    <picture>
                                        <img src="{{asset('assets/uploads/category/')}}/{{$item->image}}" alt="">
                                    </picture>
                                    <figcaption class="category-text">{{$item->name}}</figcaption>
                                </figure>

                            </a>
                            <a class="text-r text-r-xl text-b-black" href="{{route('catalog.category',['category'=>$item->slug])}}">{{$item->name}}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="bg-p bg-Cw">
            <div class="fd-c new center container">
                <h2 class="title-i">Новинки</h2>
                <ul class=" rowCart">
                    <li class="rowCart-item">
                        <div class="rowCart-item-box">
                            <a>
                                <figure>
                                    <picture><source srcset="./img/image7.webp" type="image/webp"><img src="./img/image7.png" alt=""></picture>
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
                                    <picture><source srcset="./img/image7.webp" type="image/webp"><img src="./img/image7.png" alt=""></picture>
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
                                    <picture><source srcset="./img/image7.webp" type="image/webp"><img src="./img/image7.png" alt=""></picture>
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
                                    <picture><source srcset="./img/image7.webp" type="image/webp"><img src="./img/image7.png" alt=""></picture>
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
                                    <picture><source srcset="./img/image7.webp" type="image/webp"><img src="./img/image7.png" alt=""></picture>
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
                                    <picture><source srcset="./img/image7.webp" type="image/webp"><img src="./img/image7.png" alt=""></picture>
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
                <button class="btn btn-xs btn-greey">Показать еще</button>
            </div>
        </div>
        <div class="bg-p bg-Cw">
            <div class="container">
                <div class="reviews-item box-title box-title-box">
                    <h2 class="title-i">Рюкзаки</h2>
                    <div class="box-title-box-bot">
                        <ul class="center">
                            <li class="philter philter-active"><a>Все</a></li>
                            <li class="philter"><a>Amalfi</a></li>
                            <li class="philter"><a>Amalfi</a></li>
                            <li class="philter"><a>Amalfi</a></li>
                            <li class="philter"><a>Amalfi</a></li>
                            <li class="philter"><a>Amalfi</a></li>
                        </ul>
                    </div>
                </div>
                <div class="backpacks">
                    <ul class="backpacks-item1 rowCart">
                        <li class="rowCart-item">
                            <div class="rowCart-item-box">
                                <a>
                                    <figure>
                                        <picture><source srcset="./img/image7.webp" type="image/webp"><img src="./img/image7.png" alt=""></picture>
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
                                        <picture><source srcset="./img/image7.webp" type="image/webp"><img src="./img/image7.png" alt=""></picture>
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
                                        <picture><source srcset="./img/image7.webp" type="image/webp"><img src="./img/image7.png" alt=""></picture>
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
                                        <picture><source srcset="./img/image7.webp" type="image/webp"><img src="./img/image7.png" alt=""></picture>
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
                                        <picture><source srcset="./img/image7.webp" type="image/webp"><img src="./img/image7.png" alt=""></picture>
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
                                        <picture><source srcset="./img/image7.webp" type="image/webp"><img src="./img/image7.png" alt=""></picture>
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
                    <ul class="backpacks-item2">
                        <li class="baners-xs">
                            <a class="baners-xs-cont pinck-baner" href="">
                                <figure>
                                    <picture><source srcset="./img/baner3.webp" type="image/webp"><img src="./img/baner3.png" alt=""></picture>
                                    <figcaption>
                                        Для него
                                    </figcaption>
                                </figure>
                                <p class="text-b text-b-m text-b-white l-s">Для него</p>
                            </a>
                        </li>
                        <li class="baners-xs">
                            <a class="baners-xs-cont blue-baner" href="">
                                <figure>
                                    <picture><source srcset="./img/baner2.webp" type="image/webp"><img src="./img/baner2.png" alt=""></picture>
                                    <figcaption>
                                        Для нее
                                    </figcaption>
                                </figure>
                                <p class="text-b text-b-m text-b-white l-s">Для нее</p>
                            </a>
                        </li>
                        <li class="baners-xs">
                            <a class="baners-xs-cont yealow-baner" href="">
                                <figure>
                                    <picture><source srcset="./img/baner3.webp" type="image/webp"><img src="./img/baner3.png" alt=""></picture>
                                    <figcaption>
                                        Для туризма
                                    </figcaption>
                                </figure>
                                <p class="text-b text-b-m text-b-white l-s">Для туризма</p>
                            </a>
                        </li>
                        <li class="baners-xs">
                            <a class="baners-xs-cont purple-baner" href="">
                                <figure>
                                    <picture><source srcset="./img/baner2.webp" type="image/webp"><img src="./img/baner2.png" alt=""></picture>
                                    <figcaption>
                                        Студентам
                                    </figcaption>
                                </figure>
                                <p class="text-b text-b-m text-b-white l-s">Студентам</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="bg-p bg-Cw">
            <div class="reviews container">
                <div class="reviews-item box-title box-title-box">
                    <h2 class="title-i">Обзоры</h2>
                    <div class="box-title-box-bot">
                        <ul class="center">
                            <li class="philter philter-active"><a>Все</a></li>
                            <li class="philter"><a>Amalfi</a></li>
                            <li class="philter"><a>Amalfi</a></li>
                            <li class="philter"><a>Amalfi</a></li>
                            <li class="philter"><a>Amalfi</a></li>
                            <li class="philter"><a>Amalfi</a></li>
                        </ul>
                        <a class="btn btn-xs btn-orange">Смотреть все</a>
                    </div>
                </div>
                <ul class="reviews-item-box">
                    <li class="reviews-item-box-i">
                        <a class="" href="">
                            <figure class="reviews-item-box-img">
                                <picture><source srcset="./img/baner5.webp" type="image/webp"><img src="./img/baner5.png" alt=""></picture>
                                <figcaption class="">
                                    Выбираем духовой шкаф
                                </figcaption>
                            </figure>
                            <i class="icon-add"></i>
                            <p class="reviews-item-box-text text-b text-b-m text-b-white l-s">Выбираем духовой шкаф</p>
                        </a>
                    </li>
                    <li class="reviews-item-box-i">
                        <a class="" href="">
                            <figure class="reviews-item-box-img">
                                <picture><source srcset="./img/baner5.webp" type="image/webp"><img src="./img/baner5.png" alt=""></picture>
                                <figcaption class="">
                                    Выбираем духовой шкаф
                                </figcaption>
                            </figure>
                            <i class="icon-add"></i>
                            <p class="reviews-item-box-text text-b text-b-m text-b-white l-s">Выбираем духовой шкаф</p>
                        </a>
                    </li>
                    <li class="reviews-item-box-i">
                        <a class="" href="">
                            <figure class="reviews-item-box-img">
                                <picture><source srcset="./img/baner5.webp" type="image/webp"><img src="./img/baner5.png" alt=""></picture>
                                <figcaption class="">
                                    Выбираем духовой шкаф
                                </figcaption>
                            </figure>
                            <i class="icon-add"></i>
                            <p class="reviews-item-box-text text-b text-b-m text-b-white l-s">Выбираем духовой шкаф</p>
                        </a>
                    </li>
                </ul>
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
                                    <picture><source srcset="./img/image7.webp" type="image/webp"><img src="./img/image7.png" alt=""></picture>
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
                                    <picture><source srcset="./img/image7.webp" type="image/webp"><img src="./img/image7.png" alt=""></picture>
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
                                    <picture><source srcset="./img/image7.webp" type="image/webp"><img src="./img/image7.png" alt=""></picture>
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
                                    <picture><source srcset="./img/image7.webp" type="image/webp"><img src="./img/image7.png" alt=""></picture>
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
                                    <picture><source srcset="./img/image7.webp" type="image/webp"><img src="./img/image7.png" alt=""></picture>
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
                                    <picture><source srcset="./img/image7.webp" type="image/webp"><img src="./img/image7.png" alt=""></picture>
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
@endsection
