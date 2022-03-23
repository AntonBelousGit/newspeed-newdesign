<div class="menu_catalog">
    @foreach($catalog as $catalog_item)
        <div class="mc_link">
            <a href="{{route($catalog_item->type,['slug'=>$catalog_item->slug])}}">
                <div class="text_catalog">
                    <div class="icon icon_mobile"></div>
                    {{$catalog_item->name}}
                </div>
                <span class="icon icon_arr_right"></span>
            </a>
            <div class="un_list">
                <div class="wrap_list_un_menu">
                    <h3 class="title_un_menu">
                        Заголовок
                    </h3>
                    <div class="un_menu">
                        @foreach($catalog_item->children as $item)
                            <a href="{{route($item->type,['slug'=>$item->slug])}}">{{$item->name}}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
