<div class="menu_catalog">
    @foreach($catalog as $catalog_item)
    <div class="mc_link">
        <a href="{{route( 'category',['slug'=>$catalog_item->slug])}}">
            <div class="text_catalog">
                <div class="icon">
                    <img src="{{asset('assets/uploads/category/')}}/{{$catalog_item->icon}}" alt="img">
                </div>
                {{$catalog_item->name}}
            </div>
            <span class="icon icon_arr_right"></span>
        </a>
        <div class="wrap_un_list">
            <div class="un_list">
                @foreach($catalog_item->childrenCategories as $item)
                <div class="wrap_list_un_menu">
                    <a class="title_un_menu" href="{{route('category',['slug'=>$item->slug])}}">{{$item->name}}</a>

                    <div class="un_menu">
                    @foreach($item->childrenCategories as $child)
                        <a href="{{route('category',['slug'=>$child->slug])}}">{{$child->name}}</a>
                    @endforeach
                    </div>

                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endforeach
</div>
