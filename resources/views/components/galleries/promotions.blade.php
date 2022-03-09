<div class="baners bg-Cw">
    <div class="container">
        <div class="box-title">
            <h2 class="title-i">{{ ucfirst($block->title) }}</h2>
            <a class="btn btn-xs btn-orange">Смотреть все</a>
        </div>
        <ul class="promotions rowCart">
            @each('components.galleries.promotions.item', $gallery_value, 'item')
        </ul>
    </div>
</div>
