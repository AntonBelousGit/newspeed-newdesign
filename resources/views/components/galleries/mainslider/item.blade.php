<div class="slider-item">
    <a class="js_main_gallery_slide_view_counter" href="{{ $item->url }}">
        <figure>
            <picture><source srcset="{{asset('storage/galleries/'.$item->img)}}" type="image/webp"><img src="{{asset('storage/galleries/'.$item->img)}}" alt=""></picture>
            <figcaption class="text-b text-b-xxxl text-b-black l-s">{!!$item->title ?? ''!!}</figcaption>
        </figure>
    </a>
</div>
