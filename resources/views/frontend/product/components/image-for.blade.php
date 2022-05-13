<div class="spf_item">
    <a href="{{asset('assets/uploads/products')}}/{{$item}}" class="spf_content" data-fancybox="modal">
        <div class="wrap_image">
            <picture>
                <source srcset="{{asset('assets/uploads/products')}}/{{$item}}" type="image/webp">
                <img src="{{asset('assets/uploads/products')}}/{{$item}}" alt="img">
            </picture>
        </div>
    </a>
</div>
