<div class="bg-p bg-Cw">
    <div class="container">
        <h2 class="title-i">Популярные категории</h2>
        <ul class="category">
            @isset($catpop)
                @foreach($catpop as $cat)
                    <li class="bg-Cw center category-item">
                        <a href="{{route('catalog.category',['category'=>$cat->slug])}}">
                            <figure>
                                <picture>
{{--                                    <source srcset="{{asset('dist/img/image1.webp')}}" type="image/webp">--}}
                                    <img src="{{asset('assets/uploads/category/')}}/{{$cat->image}}" alt="">
                                </picture>
                                <figcaption class="text-r text-r-xl text-b-black">{{$cat->name}}</figcaption>
                            </figure>
                        </a>
                    </li>
                @endforeach
            @endisset

        </ul>
    </div>
</div>
