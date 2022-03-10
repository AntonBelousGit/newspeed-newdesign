<a href="{{ route("blog.show", $item->slug) }}" class="lr_item">
    <div class="wrap_img">
        <picture>
            <source srcset="{{asset('assets/uploads/blogs')}}/{{$item->image}}" type="image/webp">
            <img src="{{asset('assets/uploads/blogs')}}/{{$item->image}}" alt="img"></picture>
    </div>
    <div class="name_new">
        {{$item->title}}
    </div>
</a>
