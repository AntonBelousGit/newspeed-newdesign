<div class="sl_item">
    <div class="sl_content">
        <div class="wrap_image">
            <picture>
                <source srcset="{{asset('storage/galleries/'.$item->img)}}" type="image/webp">
                <img src="{{asset('storage/galleries/'.$item->img)}}" alt="img">
            </picture>
        </div>
        <h1>
            {!!$item->title ?? ''!!}
        </h1>
    </div>
</div>
