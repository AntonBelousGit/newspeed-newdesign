<div class="menu_catalog">
    @foreach($catalog as $catalog_item)
        <div class="mc_link">
            <a href="{{route( 'category',['slug'=>$catalog_item->slug])}}">
                <div class="text_catalog">
                    <div class="icon icon_mobile"></div>
                    {{$catalog_item->name}}
                </div>
                <span class="icon icon_arr_right"></span>
            </a>
            <div class="un_list">
                <div class="wrap_list_un_menu">
                    @foreach($catalog_item->children as $item)
                        <h3 class="title_un_menu">
                            <a href="{{route('category',['slug'=>$item->slug])}}">{{$item->name}}</a>
                        </h3>
                        @foreach($item->children as $child)
                            <div class="un_menu">
                                <a href="{{route('category',['slug'=>$child->slug])}}">{{$child->name}}</a>
                            </div>
                        @endforeach
                    @endforeach
                </div>
            </div>
        </div>
    @endforeach
</div>
