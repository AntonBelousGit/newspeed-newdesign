<div class="baners-top">
    <div class="baners-slider slider">
        @if($mainsliders)
        @foreach($mainsliders as $slider)
        <div class="slider-item">
            <a>
                <figure>
                    <picture><source srcset="{{asset('dist/img/'.$slider->img)}}" type="image/webp"><img src="{{asset('dist/img/'.$slider->img)}}" alt=""></picture>
                    <figcaption class="text-b text-b-xxxl text-b-black l-s">{!!$slider->title!!}</figcaption>
                </figure>
            </a>
        </div>
       @endforeach
       @endif
    </div>
</div>