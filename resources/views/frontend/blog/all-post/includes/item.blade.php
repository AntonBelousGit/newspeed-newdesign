<li class="p-blog-item">
    <a class="p-blog-link" href="{{ route('blogs.show', $item->slug ) }}">
        <picture><source srcset="{{asset('storage/blogs'.$item->image) }}" type="image/webp"><img src="{{asset('storage/blogs'.$item->image) }}" alt=""></picture>
        <div class="p-blog-link-date text-b text-b-white">{{ $item->created_at->format('d.m.Y') }}</div>
        <h6 class="p-blog-link-title text-b text-b-m text-b-white l-s">{{ $item->title }}</h6>
        <p class="p-blog-link-text text-sb text-sb-l text-sb-white">
            {{ $item->intro }}
        </p>
    </a>
</li>