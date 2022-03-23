@extends('layouts.app')


@section('content')
    <main class="PCO-main">
        <div class="baners bg-Cw">
            <div class="container">
                <ul class="bread-dots">
                    <li>
                        <a class="text-r" href="/"><i class="text-r icon-home"></i></a>
                    </li>
                    @if (isset($category->categoriesParent))
                        <li>
                            <i class="text-r icon-arrow"></i>
                            <a class="text-r" href="{{route('category',['slug'=>$category->categoriesParent->slug])}}">{{$category->categoriesParent->name}}</a>
                        </li>
                    @endif
                    <li>
                        <i class="text-r icon-arrow"></i>
                        <a class="text-r" href="{{route('category',['slug'=>$category->slug])}}">{{$category->name}}</a>
                    </li>

                </ul>
            </div>
        </div>
        <div class="container">
            <h2 class="title-i">Электросамокаты</h2>
        </div>
        <div class="container">
            <button class="filter-C text-sb text-sb-xl">Фильтр</button>
        </div>
        <div class="container phil">
            <div class="philters">

                <div class="philters-box">
                    <h5 class="text-r text-r-xl blue-t">Цена</h5>
                    <div class="polzunok-container-5">
                        <label for="ot" class="text-r text-r-m">от</label>
                        <input id="ot" type="text" class="polzunok-input-5-left">
                        <label for="do" class="text-r text-r-m">до</label>
                        <input id="do" type="text" class="polzunok-input-5-right ">
                        <div class="polzunok-5 ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"><div class="ui-slider-range ui-corner-all ui-widget-header" style="left: 0%; width: 100%;"></div><span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 0%;"></span><span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" style="left: 100%;"></span></div>
                    </div>
                </div>
{{--                @foreach($brands as $item)--}}
{{--                    @php--}}
{{--                        $item['type'] = 'brand_id';--}}
{{--                    @endphp--}}
{{--                    <div class="philters-box">--}}
{{--                        <h5 class="text-r text-r-xl blue-t">Бренды</h5>--}}
{{--                        <div class="philters-check-box">--}}
{{--                            @each('frontend.category.components.filterStatic', $item, 'item', 'components.galleries.empty')--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @endforeach--}}

                @foreach($filter_attribute as $item)
                    <div class="philters-box">
                        <h5 class="text-r text-r-xl blue-t">{{$item->name}}</h5>
                        <div class="philters-check-box">
                            @each('frontend.category.components.filter', $item->values, 'item', 'components.galleries.empty')
                        </div>
                    </div>
                @endforeach

            </div>
            <div class="philters-tovar">
                <ul class="rowCart">
                    @foreach($products as $product)
                        <li class="rowCart-item">
                            <div class="rowCart-item-box">
                                <a>
                                    <figure>
                                        <picture>
                                            <img src="{{asset('assets/uploads/products/')}}/{{$product->image}}" alt="">
                                        </picture>
                                        <figcaption class="rowCart-item-link-box-text">
                                            {{$product->name}}
                                        </figcaption>
                                    </figure>
                                </a>
                                <div class="price">
                                <span class="w45">
                                    <span class="label label-sale">
                                        -{{ round((($product->regular_price - $product->sale_price) * 100) / $product->regular_price,1)}}%
                                    </span>
                                    <span class="text-r text-r-m text-r-greey t-d-t">{{$product->regular_price}}</span>
                                </span>
                                    <i class="icon-favorite"></i>
                                </div>
                                <p class="text-sb text-sb-xl">{{$product->sale_price}}<span class="text-sb text-sb-s"> грн</span></p>
                                <div class="rating-box">
                                    <span class="rating rating-active"></span>
                                    <span class="rating rating-active"></span>
                                    <span class="rating rating-active"></span>
                                    <span class="rating rating-active"></span>
                                    <span class="rating"></span>
                                </div>
                                <a class=" text-r text-r-m">
                                    {{$product->name}}
                                </a>
                                <span class="label label-new">Новинка</span>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="bg-p bg-Cw">
            <div class="container">
                <h2 class="title-i">Похожие товары</h2>
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
        <div class="container">
            <div class="baners-bottom">
                <ul class="baners-bottom-str">
                    <li class="baners-xl">
                        <a class="baners-xl-cont yealow-baner2" href="">
                            <figure>
                                <picture><source srcset="./img/baner4.webp" type="image/webp"><img src="./img/baner4.png" alt=""></picture>
                                <figcaption>
                                    Скидка 45% на гироборд Like Bike!
                                </figcaption>
                            </figure>
                            <p class="textB1 text-b text-b-xl text-b-black l-s">
                                Скидка 45% на гироборд Like Bike!
                            </p>
                            <p class="textB2 text-b text-b-xxl text-b-red l-s">-45%</p>
                        </a>
                    </li>
                    <li class="baners-xl">
                        <a class="baners-xl-cont yealow-baner2" href="">
                            <figure>
                                <picture><source srcset="./img/baner4.webp" type="image/webp"><img src="./img/baner4.png" alt=""></picture>
                                <figcaption>
                                    Скидка 45% на гироборд Like Bike!
                                </figcaption>
                            </figure>
                            <p class="textB1 text-b text-b-xl text-b-black l-s">
                                Скидка 45% на гироборд Like Bike!
                            </p>
                            <p class="textB2 text-b text-b-xxl text-b-red l-s">-45%</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </main>
@endsection
