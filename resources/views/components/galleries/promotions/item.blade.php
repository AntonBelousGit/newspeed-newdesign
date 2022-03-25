<li class="rowCart-item">
    <div class="rowCart-item-box">
        <a>
            <figure>
                <picture>
                    <source srcset="{{asset('assets/uploads/products')}}/{{$item->image}}" type="image/webp">
                    <img src="{{asset('assets/uploads/products')}}/{{$item->image}}" alt=""></picture>
                <figcaption class="rowCart-item-link-box-text">
                    {{ $item->name }}
                </figcaption>
            </figure>
        </a>
        <div class="price">
            <span class="w45">
                <span class="label label-sale">-{{ round((1- ($item->sale_price/$item->regular_price))*100) }}%</span>
                <span class="text-r text-r-m text-r-greey t-d-t">{{ $item->regular_price }}</span>
            </span>
            <i class="icon-favorite"></i>
        </div>
        <p class="text-sb text-sb-xl">{{ $item->sale_price }}<span class="text-sb text-sb-s"> грн</span></p>
        <div class="rating-box">
            <span class="rating rating-active"></span>
            <span class="rating rating-active"></span>
            <span class="rating rating-active"></span>
            <span class="rating rating-active"></span>
            <span class="rating"></span>
        </div>
        <a href="{{ route("product", $item->slug) }}" class=" text-r text-r-m">{{ $item->name }}
        </a>
        <span class="label label-new">Новинка</span>
    </div>
</li>


