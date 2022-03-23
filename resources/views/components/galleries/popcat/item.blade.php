<a href="{{route('category',['slug'=>$item->slug])}}" class="ltp_item">
    <div class="wrap_img">
        <picture>
            <source srcset="{{asset('assets/uploads/category/')}}/{{$item->image}}" type="image/webp">
            <img src="{{asset('assets/uploads/category/')}}/{{$item->image}}" alt="img"></picture>
    </div>
    <div class="ltp_name">
        {{$item->name}}
    </div>
</a>
