<div class="item_product">
    <a href="{{ route("product", $item->slug) }}" class="wrap_img">
        <picture>
            <source srcset="{{asset('assets/uploads/products')}}/{{$item->image}}" type="image/webp">
            <img src="{{asset('assets/uploads/products')}}/{{$item->image}}" alt="img"></picture>
    </a>
    <a href="{{ route("product", $item->slug) }}" class="name_product">
        {{ $item->name }}
    </a>
    <div class="wrap_compare">
        <a href="#" class="icon icon_scales2"></a>
        @guest
            <a href="#" class="icon icon_heart2" data-toggle="modal" data-target="#LoginModal"></a>
        @else
            <a href="#" class="icon icon_heart2 add_to_wishlist add_to_wishlist{{$item->id}}" data-id="{{$item->id}}"></a>
        @endguest
    </div>
    <div class="wrap_basket">

        <div class="price_product">
            @if ($item->sale_price != $item->regular_price)
                <div class="old_price">
                    <p>{{ $item->regular_price }} грн.</p>
                    <span>-{{ round((1- ($item->sale_price/$item->regular_price))*100) }}%</span>
                </div>
            @endif
            <div class="new_price">
                {{ $item->sale_price  }} грн.
            </div>
        </div>
        <button class="my_btn btn_basket">
            <div class="icon icon_basket2"></div>
        </button>
    </div>
</div>

