@extends('layouts.app')


@section('content')
{{--    <main class="PCO-main">--}}
{{--        <div class="container phil">--}}
{{--            <div class="philters">--}}

{{--                <div class="philters-box">--}}
{{--                    <h5 class="text-r text-r-xl blue-t">Цена</h5>--}}
{{--                    <div class="polzunok-container-5">--}}
{{--                        <label for="ot" class="text-r text-r-m">от</label>--}}
{{--                        <input id="ot" type="text" class="polzunok-input-5-left">--}}
{{--                        <label for="do" class="text-r text-r-m">до</label>--}}
{{--                        <input id="do" type="text" class="polzunok-input-5-right ">--}}
{{--                        <div--}}
{{--                            class="polzunok-5 ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content">--}}
{{--                            <div class="ui-slider-range ui-corner-all ui-widget-header"--}}
{{--                                 style="left: 0%; width: 100%;"></div>--}}
{{--                            <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"--}}
{{--                                  style="left: 0%;"></span><span tabindex="0"--}}
{{--                                                                 class="ui-slider-handle ui-corner-all ui-state-default"--}}
{{--                                                                 style="left: 100%;"></span></div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                --}}{{--                @foreach($brands as $item)--}}
{{--                --}}{{--                    @php--}}
{{--                --}}{{--                        $item['type'] = 'brand_id';--}}
{{--                --}}{{--                    @endphp--}}
{{--                --}}{{--                    <div class="philters-box">--}}
{{--                --}}{{--                        <h5 class="text-r text-r-xl blue-t">Бренды</h5>--}}
{{--                --}}{{--                        <div class="philters-check-box">--}}
{{--                --}}{{--                            @each('frontend.category.components.filterStatic', $item, 'item', 'components.galleries.empty')--}}
{{--                --}}{{--                        </div>--}}
{{--                --}}{{--                    </div>--}}
{{--                --}}{{--                @endforeach--}}

{{--                @foreach($filter_attribute as $item)--}}
{{--                    <div class="philters-box">--}}
{{--                        <h5 class="text-r text-r-xl blue-t">{{$item->name}}</h5>--}}
{{--                        <div class="philters-check-box">--}}
{{--                            @each('frontend.category.components.filter', $item->values, 'item', 'components.galleries.empty')--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @endforeach--}}

{{--            </div>--}}
{{--            <div class="philters-tovar">--}}
{{--                <ul class="rowCart">--}}
{{--                    @foreach($products as $product)--}}
{{--                        <li class="rowCart-item">--}}
{{--                            <div class="rowCart-item-box">--}}
{{--                                <a>--}}
{{--                                    <figure>--}}
{{--                                        <picture>--}}
{{--                                            <img src="{{asset('assets/uploads/products/')}}/{{$product->image}}" alt="">--}}
{{--                                        </picture>--}}
{{--                                        <figcaption class="rowCart-item-link-box-text">--}}
{{--                                            {{$product->name}}--}}
{{--                                        </figcaption>--}}
{{--                                    </figure>--}}
{{--                                </a>--}}
{{--                                <div class="price">--}}
{{--                                <span class="w45">--}}
{{--                                    <span class="label label-sale">--}}
{{--                                        -{{ round((($product->regular_price - $product->sale_price) * 100) / $product->regular_price,1)}}%--}}
{{--                                    </span>--}}
{{--                                    <span class="text-r text-r-m text-r-greey t-d-t">{{$product->regular_price}}</span>--}}
{{--                                </span>--}}
{{--                                    <i class="icon-favorite"></i>--}}
{{--                                </div>--}}
{{--                                <p class="text-sb text-sb-xl">{{$product->sale_price}}<span class="text-sb text-sb-s"> грн</span>--}}
{{--                                </p>--}}
{{--                                <div class="rating-box">--}}
{{--                                    <span class="rating rating-active"></span>--}}
{{--                                    <span class="rating rating-active"></span>--}}
{{--                                    <span class="rating rating-active"></span>--}}
{{--                                    <span class="rating rating-active"></span>--}}
{{--                                    <span class="rating"></span>--}}
{{--                                </div>--}}
{{--                                <a class=" text-r text-r-m">--}}
{{--                                    {{$product->name}}--}}
{{--                                </a>--}}
{{--                                <span class="label label-new">Новинка</span>--}}
{{--                            </div>--}}
{{--                        </li>--}}
{{--                    @endforeach--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </main>--}}

    <div class="container">
        <div class="container">
            <div class="breadcrumbs">
                <a href="" class="home_link"></a>
                @if (isset($category->categoriesParent))
                    <span class="icon icon_arr_right"></span>
                    <a href="{{route('category',['slug'=>$category->categoriesParent->slug])}}">{{$category->categoriesParent->name}}</a>
                @endif
                <span class="icon icon_arr_right"></span>
                <a href="{{route('category',['slug'=>$category->slug])}}">{{$category->name}}</a>
            </div>
        </div>


        <h2 class="title_page">{{$category->name}}</h2>
        <div class="wrap_syngle_category">
            <div class="filter_mobile_left">
                <div class="fml_Head">
                    Фильтры
                    <div class="close_filter" onclick="closeFilter(this)">
                        <svg viewBox="0 0 24 24" fill="currentColor" class="icon-0-2-33">
                            <path
                                d="M10.5858 11.9999L4.66667 6.08079C4.27615 5.69027 4.27615 5.0571 4.66667 4.66658C5.0572 4.27606 5.69036 4.27605 6.08088 4.66658L12 10.5857L17.9191 4.66658C18.3096 4.27606 18.9428 4.27606 19.3333 4.66658C19.7239 5.0571 19.7239 5.69027 19.3333 6.08079L13.4142 11.9999L19.3333 17.919C19.7239 18.3096 19.7239 18.9427 19.3333 19.3332C18.9428 19.7238 18.3096 19.7238 17.9191 19.3332L12 13.4141L6.08088 19.3332C5.69036 19.7238 5.0572 19.7238 4.66667 19.3332C4.27615 18.9427 4.27615 18.3096 4.66667 17.919L10.5858 11.9999Z"></path>
                        </svg>
                    </div>
                </div>
                <div class="flm_item">
                    <span class="flm_text" onclick="openSubFilter(this)">
                        Цена
                    </span>
                    <div class="flm_submenu">
                        <div class="flms_head">
                            Цена
                            <div class="close_filter" onclick="closeSubFilter(this)">
                                <svg viewBox="0 0 24 24" fill="currentColor" class="icon-0-2-33">
                                    <path
                                        d="M10.5858 11.9999L4.66667 6.08079C4.27615 5.69027 4.27615 5.0571 4.66667 4.66658C5.0572 4.27606 5.69036 4.27605 6.08088 4.66658L12 10.5857L17.9191 4.66658C18.3096 4.27606 18.9428 4.27606 19.3333 4.66658C19.7239 5.0571 19.7239 5.69027 19.3333 6.08079L13.4142 11.9999L19.3333 17.919C19.7239 18.3096 19.7239 18.9427 19.3333 19.3332C18.9428 19.7238 18.3096 19.7238 17.9191 19.3332L12 13.4141L6.08088 19.3332C5.69036 19.7238 5.0572 19.7238 4.66667 19.3332C4.27615 18.9427 4.27615 18.3096 4.66667 17.919L10.5858 11.9999Z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="flms_block flms_block--slider">
                            <div class="filter__cost table">

                                <div class="table-cell">
                                    <input id="priceMin" type="text" value="5000" class="form-control">
                                </div>
                                <span class="tire">&mdash;</span>
                                <div class="table-cell">
                                    <input id="priceMax" type="text" value="15000" class="form-control">
                                </div>
                                <button class="my_btn btn_filter">ok</button>
                            </div>
                            <div class="filter__slider">
                                <div class="range__zero">0</div>
                                <div id="filter__range2"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flm_item">
                    <span class="flm_text" onclick="openSubFilter(this)">
                        Бренд
                    </span>
                        <div class="flm_submenu">
                            <div class="flms_head">
                                Бренд
                                <div class="close_filter" onclick="closeSubFilter(this)">
                                    <svg viewBox="0 0 24 24" fill="currentColor" class="icon-0-2-33">
                                        <path
                                            d="M10.5858 11.9999L4.66667 6.08079C4.27615 5.69027 4.27615 5.0571 4.66667 4.66658C5.0572 4.27606 5.69036 4.27605 6.08088 4.66658L12 10.5857L17.9191 4.66658C18.3096 4.27606 18.9428 4.27606 19.3333 4.66658C19.7239 5.0571 19.7239 5.69027 19.3333 6.08079L13.4142 11.9999L19.3333 17.919C19.7239 18.3096 19.7239 18.9427 19.3333 19.3332C18.9428 19.7238 18.3096 19.7238 17.9191 19.3332L12 13.4141L6.08088 19.3332C5.69036 19.7238 5.0572 19.7238 4.66667 19.3332C4.27615 18.9427 4.27615 18.3096 4.66667 17.919L10.5858 11.9999Z"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="flms_block">
                                <div class="under_list_properties">
                                    <label for="Samsung" class="lp_item">
                                        <div class="custom_checkbox">
                                            <input type="checkbox" id="Samsung">
                                            <label for="Samsung"></label>
                                        </div>
                                        <div class="label_name">Samsung <span>(5)</span></div>
                                    </label>
                                    <label for="c2" class="lp_item">
                                        <div class="custom_checkbox">
                                            <input type="checkbox" id="c2">
                                            <label for="c2"></label>
                                        </div>
                                        <div class="label_name">LG <span>(5)</span></div>
                                    </label>
                                    <label for="c3" class="lp_item">
                                        <div class="custom_checkbox">
                                            <input type="checkbox" id="c3">
                                            <label for="c3"></label>
                                        </div>
                                        <div class="label_name">Kivi <span>(5)</span></div>
                                    </label>
                                    <label for="c4" class="lp_item">
                                        <div class="custom_checkbox">
                                            <input type="checkbox" id="c4">
                                            <label for="c4"></label>
                                        </div>
                                        <div class="label_name">Kivi <span>(5)</span></div>
                                    </label>
                                    <label for="c5" class="lp_item">
                                        <div class="custom_checkbox">
                                            <input type="checkbox" id="c5">
                                            <label for="c5"></label>
                                        </div>
                                        <div class="label_name">Kivi <span>(5)</span></div>
                                    </label>
                                    <label for="c6" class="lp_item">
                                        <div class="custom_checkbox">
                                            <input type="checkbox" id="c6">
                                            <label for="c6"></label>
                                        </div>
                                        <div class="label_name">Kivi <span>(5)</span></div>
                                    </label>
                                    <label for="c7" class="lp_item">
                                        <div class="custom_checkbox">
                                            <input type="checkbox" id="c7">
                                            <label for="c7"></label>
                                        </div>
                                        <div class="label_name">Kivi <span>(5)</span></div>
                                    </label>
                                    <label for="c8" class="lp_item">
                                        <div class="custom_checkbox">
                                            <input type="checkbox" id="c8">
                                            <label for="c8"></label>
                                        </div>
                                        <div class="label_name">Kivi <span>(5)</span></div>
                                    </label>
                                    <label for="c9" class="lp_item">
                                        <div class="custom_checkbox">
                                            <input type="checkbox" id="c9">
                                            <label for="c9"></label>
                                        </div>
                                        <div class="label_name">Kivi <span>(5)</span></div>
                                    </label>
                                    <label for="c10" class="lp_item">
                                        <div class="custom_checkbox">
                                            <input type="checkbox" id="c10">
                                            <label for="c10"></label>
                                        </div>
                                        <div class="label_name">Kivi <span>(5)</span></div>
                                    </label>
                                    <label for="c11" class="lp_item">
                                        <div class="custom_checkbox">
                                            <input type="checkbox" id="c11">
                                            <label for="c11"></label>
                                        </div>
                                        <div class="label_name">Kivi <span>(5)</span></div>
                                    </label>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="flm_item">
                    <span class="flm_text" onclick="openSubFilter(this)">
                    Размер
                </span>
                    <div class="flm_submenu">
                        <div class="flms_head">
                            Размер
                            <div class="close_filter" onclick="closeSubFilter(this)">
                                <svg viewBox="0 0 24 24" fill="currentColor" class="icon-0-2-33">
                                    <path
                                        d="M10.5858 11.9999L4.66667 6.08079C4.27615 5.69027 4.27615 5.0571 4.66667 4.66658C5.0572 4.27606 5.69036 4.27605 6.08088 4.66658L12 10.5857L17.9191 4.66658C18.3096 4.27606 18.9428 4.27606 19.3333 4.66658C19.7239 5.0571 19.7239 5.69027 19.3333 6.08079L13.4142 11.9999L19.3333 17.919C19.7239 18.3096 19.7239 18.9427 19.3333 19.3332C18.9428 19.7238 18.3096 19.7238 17.9191 19.3332L12 13.4141L6.08088 19.3332C5.69036 19.7238 5.0572 19.7238 4.66667 19.3332C4.27615 18.9427 4.27615 18.3096 4.66667 17.919L10.5858 11.9999Z"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="flms_block">
                            <div class="under_list_properties">
                                <label for="c2_1" class="lp_item">
                                    <div class="custom_checkbox">
                                        <input type="checkbox" id="c2_1">
                                        <label for="c2_1"></label>
                                    </div>
                                    <div class="label_name">22"-29” <span>(5)</span></div>
                                </label>
                                <label for="c2_2" class="lp_item">
                                    <div class="custom_checkbox">
                                        <input type="checkbox" id="c2_2">
                                        <label for="c2_2"></label>
                                    </div>
                                    <div class="label_name">32"-42” <span>(5)</span></div>
                                </label>
                                <label for="c2_3" class="lp_item">
                                    <div class="custom_checkbox">
                                        <input type="checkbox" id="c2_3">
                                        <label for="c2_3"></label>
                                    </div>
                                    <div class="label_name">22"-29” <span>(5)</span></div>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="wrap_filter">
                <div class="selected_attribute">
                    <div class="title_atr">
                        Вы выбрали:
                    </div>
                    <div class="list_sel_atr">
                        <div class="lsa_item">
                <span class="lsa_name">
                    Бренд:
                </span>
                            <span class="lsa_meaning">
                    Samsung
                </span>
                            <a href="#" class="lsa_close"></a>
                        </div>
                        <div class="lsa_item">
                <span class="lsa_name">
                    Диагональ экрана:
                </span>
                            <span class="lsa_meaning">
                    32"-42”
                </span>
                            <a href="#" class="lsa_close"></a>
                        </div>
                        <div class="lsa_item">
                <span class="lsa_name">
                    Цена от:
                </span>
                            <span class="lsa_meaning">
                    100
                </span>
                            <a href="#" class="lsa_close"></a>
                        </div>
                        <div class="lsa_item">
                <span class="lsa_name">
                    Цена до:
                </span>
                            <span class="lsa_meaning">
                    59999
                </span>
                            <a href="#" class="lsa_close"></a>
                        </div>
                    </div>
                    <div class="atr_text">
                        Подобрано 28 товаров из 235
                    </div>
                    <a href="#" class="atr_clear">
                        Очистить все
                    </a>
                </div>
                <form class="filter_container">
                    <div class="filter_title">
                        Фильтр
                    </div>
                    <div class="wrap_properties">
                        <div class="title_properties open" onclick="openProperties(this)">
                            Бренд
                        </div>
                        <div class="list_properties list_properties_scroll open">
                            <div class="filter__block filter__block--slider">
                                <div class="filter__cost table">

                                    <div class="table-cell">
                                        <input id="priceMin" type="text" value="5000" class="form-control">
                                    </div>
                                    <span class="tire">&mdash;</span>
                                    <div class="table-cell">
                                        <input id="priceMax" type="text" value="15000" class="form-control">
                                    </div>
                                    <button class="my_btn btn_filter2">ok</button>
                                </div>
                                <div class="filter__slider">
                                    <div class="range__zero">0</div>
                                    <div id="filter__range"></div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="wrap_properties">
                        <div class="title_properties" onclick="openProperties(this)">
                            Диагональ эрана
                        </div>
                        <div class="list_properties ">
                            <div class="under_list_properties">
                                <label for="Samsung" class="lp_item">
                                    <div class="custom_checkbox">
                                        <input type="checkbox" id="Samsung">
                                        <label for="Samsung"></label>
                                    </div>
                                    <div class="label_name">Samsung <span>(5)</span></div>
                                </label>
                                <label for="c2" class="lp_item">
                                    <div class="custom_checkbox">
                                        <input type="checkbox" id="c2">
                                        <label for="c2"></label>
                                    </div>
                                    <div class="label_name">LG <span>(5)</span></div>
                                </label>
                                <label for="c3" class="lp_item">
                                    <div class="custom_checkbox">
                                        <input type="checkbox" id="c3">
                                        <label for="c3"></label>
                                    </div>
                                    <div class="label_name">Kivi <span>(5)</span></div>
                                </label>
                                <label for="c4" class="lp_item">
                                    <div class="custom_checkbox">
                                        <input type="checkbox" id="c4">
                                        <label for="c4"></label>
                                    </div>
                                    <div class="label_name">Kivi <span>(5)</span></div>
                                </label>
                                <label for="c5" class="lp_item">
                                    <div class="custom_checkbox">
                                        <input type="checkbox" id="c5">
                                        <label for="c5"></label>
                                    </div>
                                    <div class="label_name">Kivi <span>(5)</span></div>
                                </label>
                                <label for="c6" class="lp_item">
                                    <div class="custom_checkbox">
                                        <input type="checkbox" id="c6">
                                        <label for="c6"></label>
                                    </div>
                                    <div class="label_name">Kivi <span>(5)</span></div>
                                </label>
                                <label for="c7" class="lp_item">
                                    <div class="custom_checkbox">
                                        <input type="checkbox" id="c7">
                                        <label for="c7"></label>
                                    </div>
                                    <div class="label_name">Kivi <span>(5)</span></div>
                                </label>
                                <label for="c8" class="lp_item">
                                    <div class="custom_checkbox">
                                        <input type="checkbox" id="c8">
                                        <label for="c8"></label>
                                    </div>
                                    <div class="label_name">Kivi <span>(5)</span></div>
                                </label>
                                <label for="c9" class="lp_item">
                                    <div class="custom_checkbox">
                                        <input type="checkbox" id="c9">
                                        <label for="c9"></label>
                                    </div>
                                    <div class="label_name">Kivi <span>(5)</span></div>
                                </label>
                                <label for="c10" class="lp_item">
                                    <div class="custom_checkbox">
                                        <input type="checkbox" id="c10">
                                        <label for="c10"></label>
                                    </div>
                                    <div class="label_name">Kivi <span>(5)</span></div>
                                </label>
                                <label for="c11" class="lp_item">
                                    <div class="custom_checkbox">
                                        <input type="checkbox" id="c11">
                                        <label for="c11"></label>
                                    </div>
                                    <div class="label_name">Kivi <span>(5)</span></div>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="wrap_properties">
                        <div class="title_properties" onclick="openProperties(this)">
                            Диагональ эрана
                        </div>
                        <div class="list_properties">
                            <div class="under_list_properties">
                                <label for="c2_1" class="lp_item">
                                    <div class="custom_checkbox">
                                        <input type="checkbox" id="c2_1">
                                        <label for="c2_1"></label>
                                    </div>
                                    <div class="label_name">22"-29” <span>(5)</span></div>
                                </label>
                                <label for="c2_2" class="lp_item">
                                    <div class="custom_checkbox">
                                        <input type="checkbox" id="c2_2">
                                        <label for="c2_2"></label>
                                    </div>
                                    <div class="label_name">32"-42” <span>(5)</span></div>
                                </label>
                                <label for="c2_3" class="lp_item">
                                    <div class="custom_checkbox">
                                        <input type="checkbox" id="c2_3">
                                        <label for="c2_3"></label>
                                    </div>
                                    <div class="label_name">22"-29” <span>(5)</span></div>
                                </label>
                            </div>

                        </div>
                    </div>
                </form>
            </div>

            <div class="section_category syngle_category">
                <div class="wrap_select-sort">
                    <button class="my_btn btn_filter">Фильтр</button>
                    <select id="select-sort">
                        <option value="1">По имени</option>
                        <option value="1">По имени</option>
                        <option value="1">По имени</option>
                    </select>
                </div>

                <div class="list_product">

                    @forelse($products as $product)
                        <div class="item_product">
                            <a href="{{ route("product", $product->slug) }}" class="wrap_img">
                                <picture>
                                    <source srcset="{{asset('assets/uploads/products/')}}/{{$product->image}}" type="image/webp">
                                    <img src="{{asset('assets/uploads/products/')}}/{{$product->image}}" alt="img">
                                </picture>
                            </a>
                            <a href="{{ route("product", $product->slug) }}" class="name_product">
                                {{$product->name}}
                            </a>
                            <div class="wrap_compare">
                                <div class="icon" onclick="addFavorite(this)">
                                    <svg class="svg-scales">
                                        <use xlink:href="#svg-scales"></use>
                                    </svg>
                                </div>
                                <div class="icon" onclick="addFavorite(this)">
                                    <svg class="svg-heart">
                                        <use xlink:href="#svg-heart"></use>
                                    </svg>
                                </div>
                            </div>
                            <div class="wrap_basket">
                                <div class="price_product">
                                    <div class="new_price">
                                        {{$product->sale_price}} грн.
                                    </div>
                                </div>
                                <button class="my_btn btn_basket" onclick="addBusked(this)">
                                    <div class="icon icon_basket2"></div>
                                </button>
                            </div>
                            <div class="сharacteristic">
                                <div class="ch_title">
                                    Характеристики
                                </div>
                                <div class="ch_list">
                                    @forelse($product->attribute as $key=>$attribute)
                                        <div class="ch_item">
                                            {{$key}} <span>{{$attribute[0]}}</span>
                                        </div>
                                    @empty

                                    @endforelse
                                </div>
                            </div>
                        </div>
                    @empty

                    @endforelse
                </div>
                <div class="more_load">
                    <div class="more_text">
                        <span class="icon_load icon"></span> Показать еще
                    </div>
                </div>
                <div class="wrap_pagination">
                    <div class="btn_arr_left disabled"></div>
                    <div class="list_pagination">
                        <a href="#" class="lp_item active">
                            1
                        </a>
                        <a href="#" class="lp_item">
                            2
                        </a>
                        <a href="#" class="lp_item">
                            3
                        </a>
                        <a href="#" class="lp_item">
                            4
                        </a>
                        <div class="lp_point">...</div>
                        <a href="#" class="lp_item">
                            19
                        </a>
                    </div>
                    <div class="btn_arr_right"></div>
                </div>
            </div>


        </div>
    </div>

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
                            <div class="icon" onclick="addFavorite(this)">
                                <svg class="svg-scales">
                                    <use xlink:href="#svg-scales"></use>
                                </svg>
                            </div>
                            <div class="icon" onclick="addFavorite(this)">
                                <svg class="svg-heart">
                                    <use xlink:href="#svg-heart"></use>
                                </svg>
                            </div>
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
                            <button class="my_btn btn_basket" onclick="addBusked(this)">
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
                            <div class="icon" onclick="addFavorite(this)">
                                <svg class="svg-scales">
                                    <use xlink:href="#svg-scales"></use>
                                </svg>
                            </div>
                            <div class="icon" onclick="addFavorite(this)">
                                <svg class="svg-heart">
                                    <use xlink:href="#svg-heart"></use>
                                </svg>
                            </div>
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
                            <button class="my_btn btn_basket" onclick="addBusked(this)">
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
                            <div class="icon" onclick="addFavorite(this)">
                                <svg class="svg-scales">
                                    <use xlink:href="#svg-scales"></use>
                                </svg>
                            </div>
                            <div class="icon" onclick="addFavorite(this)">
                                <svg class="svg-heart">
                                    <use xlink:href="#svg-heart"></use>
                                </svg>
                            </div>
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
                            <button class="my_btn btn_basket" onclick="addBusked(this)">
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
                            <div class="icon" onclick="addFavorite(this)">
                                <svg class="svg-scales">
                                    <use xlink:href="#svg-scales"></use>
                                </svg>
                            </div>
                            <div class="icon" onclick="addFavorite(this)">
                                <svg class="svg-heart">
                                    <use xlink:href="#svg-heart"></use>
                                </svg>
                            </div>
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
                            <button class="my_btn btn_basket" onclick="addBusked(this)">
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
                            <div class="icon" onclick="addFavorite(this)">
                                <svg class="svg-scales">
                                    <use xlink:href="#svg-scales"></use>
                                </svg>
                            </div>
                            <div class="icon" onclick="addFavorite(this)">
                                <svg class="svg-heart">
                                    <use xlink:href="#svg-heart"></use>
                                </svg>
                            </div>
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
                            <button class="my_btn btn_basket" onclick="addBusked(this)">
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
                            <div class="icon" onclick="addFavorite(this)">
                                <svg class="svg-scales">
                                    <use xlink:href="#svg-scales"></use>
                                </svg>
                            </div>
                            <div class="icon" onclick="addFavorite(this)">
                                <svg class="svg-heart">
                                    <use xlink:href="#svg-heart"></use>
                                </svg>
                            </div>
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
                            <button class="my_btn btn_basket" onclick="addBusked(this)">
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
                            <div class="icon" onclick="addFavorite(this)">
                                <svg class="svg-scales">
                                    <use xlink:href="#svg-scales"></use>
                                </svg>
                            </div>
                            <div class="icon" onclick="addFavorite(this)">
                                <svg class="svg-heart">
                                    <use xlink:href="#svg-heart"></use>
                                </svg>
                            </div>
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
                            <button class="my_btn btn_basket" onclick="addBusked(this)">
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
                            <div class="icon" onclick="addFavorite(this)">
                                <svg class="svg-scales">
                                    <use xlink:href="#svg-scales"></use>
                                </svg>
                            </div>
                            <div class="icon" onclick="addFavorite(this)">
                                <svg class="svg-heart">
                                    <use xlink:href="#svg-heart"></use>
                                </svg>
                            </div>
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
                            <button class="my_btn btn_basket" onclick="addBusked(this)">
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
                            <div class="icon" onclick="addFavorite(this)">
                                <svg class="svg-scales">
                                    <use xlink:href="#svg-scales"></use>
                                </svg>
                            </div>
                            <div class="icon" onclick="addFavorite(this)">
                                <svg class="svg-heart">
                                    <use xlink:href="#svg-heart"></use>
                                </svg>
                            </div>
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
                            <button class="my_btn btn_basket" onclick="addBusked(this)">
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
                            <div class="icon" onclick="addFavorite(this)">
                                <svg class="svg-scales">
                                    <use xlink:href="#svg-scales"></use>
                                </svg>
                            </div>
                            <div class="icon" onclick="addFavorite(this)">
                                <svg class="svg-heart">
                                    <use xlink:href="#svg-heart"></use>
                                </svg>
                            </div>
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
                            <button class="my_btn btn_basket" onclick="addBusked(this)">
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

    <script>
        function openSubFilter(elem) {
            $(elem).siblings('.flm_submenu').addClass('open_filter')
        }

        function closeSubFilter(elem) {
            $(elem).parent('.flms_head').parent('.flm_submenu').removeClass('open_filter')
        }

        function closeFilter(elem) {
            $(elem).parent('.fml_Head').parent('.filter_mobile_left').removeClass('open_menu')
            $('body').removeClass('catalog_open');
        }
    </script>
@endsection
