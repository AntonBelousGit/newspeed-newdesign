<li class="sub-menu-link">
<a class="text-r text-r-l" href="{{route('catalog.category',['category'=>$child_category->slug])}}">
 {{ $child_category->name ?? '' }}</a>
</li>
@if ($child_category->categories ?? '')
    <ul>
        @foreach ($child_category->categories as $childCategory)
            @include('components.child_category', ['child_category' => $childCategory])
        @endforeach
    </ul>
@endif
