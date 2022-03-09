<li class="rowCart-item">
    <div class="rowCart-item-box">
        <a>
            <figure>
                <picture>
                    <img src="{{asset('assets/uploads/products/')}}/{{$feature->image}}"
                         alt="image">
                </picture>

                <figcaption class="rowCart-item-link-box-text">
                    {{$feature->name}}
                </figcaption>
            </figure>
        </a>
        <div class="price">
        <span class="w45">
            @if ($feature->regular_price > $feature->sale_price)
                <span
                    class="label label-sale">-@php echo round((($feature->regular_price - $feature->sale_price) * 100) / $feature->regular_price, 2)  @endphp%</span>
                <span
                    class="text-r text-r-m text-r-greey t-d-t">{{$feature->regular_price}}</span>
            @endif
        </span>
            <i class="icon-favorite"></i>
        </div>
        <p class="text-sb text-sb-xl">{{$feature->sale_price}}<span
                class="text-sb text-sb-s"> грн</span></p>
        <div class="rating-box">
            <span class="rating rating-active"></span>
            <span class="rating rating-active"></span>
            <span class="rating rating-active"></span>
            <span class="rating rating-active"></span>
            <span class="rating"></span>
        </div>
        <a class=" text-r text-r-m">{{$feature->name}}
        </a>
        <span class="label label-new">Новинка</span>
    </div>
</li>
