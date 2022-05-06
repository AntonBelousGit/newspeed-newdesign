<div class="box-modalBusket" id="exampleBusket">
    <div class="box_modal_head">
        Корзина
        <div class="box-modal_close arcticmodal-close">
            <svg viewBox="0 0 24 24" fill="currentColor" class="icon-0-2-33">
                <path
                    d="M10.5858 11.9999L4.66667 6.08079C4.27615 5.69027 4.27615 5.0571 4.66667 4.66658C5.0572 4.27606 5.69036 4.27605 6.08088 4.66658L12 10.5857L17.9191 4.66658C18.3096 4.27606 18.9428 4.27606 19.3333 4.66658C19.7239 5.0571 19.7239 5.69027 19.3333 6.08079L13.4142 11.9999L19.3333 17.919C19.7239 18.3096 19.7239 18.9427 19.3333 19.3332C18.9428 19.7238 18.3096 19.7238 17.9191 19.3332L12 13.4141L6.08088 19.3332C5.69036 19.7238 5.0572 19.7238 4.66667 19.3332C4.27615 18.9427 4.27615 18.3096 4.66667 17.919L10.5858 11.9999Z"></path>
            </svg>
        </div>
    </div>
    <div class="box_modal_body">
        <div class="wrap_list_cart">
            <div class="list_cart">
                @foreach($cart->content() as $item)
                    <div class="lc_item">
                        <div class="wrap_img">
                            <picture>
                                <source srcset="{{asset('assets/uploads/products')}}/{{$item->model->image}}"
                                        type="image/webp">
                                <img src="{{asset('assets/uploads/products')}}/{{$item->model->image}}"
                                     alt="{{$item->name}}">
                            </picture>
                        </div>
                        <div class="lc_wrap_name">
                            <div class="lc_name">
                                {{$item->name}}
                            </div>
                            <div class="wrap_numeric">
                                <div class="numeric_minus change-qty" data-id="{{$item->rowId}}"
                                     data-type="decrease" onclick="minusNum(this)">
                                    <svg class="svg-minus">
                                        <use xlink:href="#svg-minus"></use>
                                    </svg>
                                </div>
                                <div class="wrap_number_input">
                                    <input type="number" value="{{$item->qty}}" id="qty-input-{{$item->rowId}}"
                                           class="number_input" disabled>
                                </div>
                                <div class="numeric_plus change-qty" data-id="{{$item->rowId}}"
                                     data-type="increase" onclick="plusNum(this)">
                                    <svg class="svg-plus">
                                        <use xlink:href="#svg-plus"></use>
                                    </svg>
                                </div>
                                <input type="hidden" data-id="{{$item->rowId}}"
                                       data-product-quantity="{{$item->model->stock}}"
                                       id="update-cart-{{$item->rowId}}">
                            </div>
                        </div>
                        <div class="lc_wrap_price">
                            <div class="lwp_top">
                                <div class="wrap_svg_border" onclick="addFavorite(this)">
                                    <svg class="svg-heart">
                                        <use xlink:href="#svg-heart"></use>
                                    </svg>
                                </div>
                                <div class="wrap_svg_border deleteItem" data-id="{{$item->rowId}}"
                                     onclick="removeProductBusked(this)">
                                    <svg class="svg-busket">
                                        <use xlink:href="#svg-busket"></use>
                                    </svg>
                                </div>
                            </div>
                            <div class="lwp_price">
{{--                                {{number_format($item->subtotal(),2,'.',' ')}} ₴--}}
                                {{$item->subtotal()}} ₴
                            </div>
                            <!--нужно для цены за 1 товар-->
                            <div class="single_price d-none">{{$item->price}}</div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="general_price">
            <a href="/" class="my_btn btn_continue">
                Продолжить покупки
            </a>
            <div class="gp_price">

                {{$cart->subtotal()}} ₴
            </div>
        </div>
        <a href="{{route('checkout.index')}}" class="my_btn btn_order">Оформить заказ</a>
    </div>
</div>
