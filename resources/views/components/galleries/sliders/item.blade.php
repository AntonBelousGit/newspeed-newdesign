<li class="baners-xs">
    <a class="baners-xs-cont pinck-baner" href="{{ $item->url }}">
        <figure>
            <picture><source srcset="{{asset('storage/galleries/sliders_gallery/'.$item->img)}}" type="image/webp"><img src="{{asset('storage/galleries/sliders_gallery/'.$item->img)}}" alt=""></picture>
            <figcaption>
                {!!$item->title1 ?? ''!!} {!!$item->title2 ?? ''!!}
            </figcaption>
        </figure>
        <p class="text-b text-b-m text-b-white l-s">{!!$item->title1 ?? ''!!} {!!$item->title2 ?? ''!!}</p>
    </a>
</li>
