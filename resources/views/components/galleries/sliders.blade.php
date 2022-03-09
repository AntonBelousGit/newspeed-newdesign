<div class="baners bg-Cw">
    <div class="container">
<div class="baners-bottom">
{{--        @dd($gallery_value)--}}
                <ul class="baners-bottom-str">
                    @isset($gallery_value[0])
                    <li class="baners-xs">
                        <a class="baners-xs-cont pinck-baner" href="{{ url($gallery_value[0]['url']) }}">
                            <figure>
                                <picture><source srcset="{{asset('storage/galleries/sliders_gallery/'.$gallery_value[0]['img'])}}" type="image/webp"><img src="{{asset('storage/galleries/sliders_gallery/'.$gallery_value[0]['img'])}}" alt=""></picture>
                                <figcaption>
                                     {{ $gallery_value[0]['title1'] ?? '' }}
                                </figcaption>
                            </figure>
                            <p class="text-b text-b-m text-b-white l-s">{{ $gallery_value[0]['title1'] ?? '' }}</p>
                        </a>
                    </li>
                    @endisset
                    @isset($gallery_value[1])
                    <li class="baners-xs">
                        <a class="baners-xs-cont blue-baner" href="{{ url($gallery_value[1]['url']) ?? '' }}">
                            <figure>
                                <picture><source srcset="{{asset('storage/galleries/sliders_gallery/'.$gallery_value[1]['img'])}}" type="image/webp"><img src="{{asset('storage/galleries/sliders_gallery/'.$gallery_value[1]['img'])}}" alt=""></picture>
                                <figcaption>
                                    {{ $gallery_value[1]['title1'] ?? '' }}
                                </figcaption>
                            </figure>
                            <p class="text-b text-b-m text-b-white l-s">{{ $gallery_value[1]['title1'] ?? '' }}</p>
                        </a>
                    </li>
                    @endisset
                    @isset($gallery_value[2])
                    <li class="baners-xl">
                        <a class="baners-xl-cont yealow-baner2" href="{{ url($gallery_value[2]['url']) ?? '' }}">
                            <figure>
                                <picture><source srcset="{{asset('storage/galleries/sliders_gallery/'.$gallery_value[2]['img'])}}" type="image/webp"><img src="{{asset('storage/galleries/sliders_gallery/'.$gallery_value[2]['img'])}}" alt=""></picture>
                                <figcaption>
                                    {{ $gallery_value[2]['title1'] ?? '' }}
                                </figcaption>
                            </figure>
                            <p class="textB1 text-b text-b-xl text-b-black l-s">
                                {{ $gallery_value[2]['title1'] ?? '' }}
                            </p>
                            <p class="textB2 text-b text-b-xxl text-b-red l-s">{{ $gallery_value[2]['title2'] ?? '' }}</p>
                        </a>
                    </li>
                    @endisset
                </ul>
            </div>
        </div>
    </div>