<li class="bg-Cw  category-item">
    <a class="category-img" href="{{route('catalog.category',['category'=>$item->slug])}}">
        <figure>
            <picture>
                <source srcset="{{asset('assets/uploads/category/'.$item->image)}}" type="image/webp">
                <img src="{{asset('assets/uploads/category/'.$item->image)}}" alt="{{$item->name}}">
            </picture>
            <figcaption class="category-text">{{$item->name}}</figcaption>
        </figure>
    </a>
    <a class="text-r text-r-xl text-b-black" href="{{route('catalog.category',['category'=>$item->slug])}}">{{$item->name}}</a>
</li>
