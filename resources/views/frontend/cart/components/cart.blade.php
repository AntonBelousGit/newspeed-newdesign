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
