<div class="bg-p bg-Cw">
    <div class="hit center container">
        <div class="box-title">
            <h2 class="title-i">{{ ucfirst($block->title) }}</h2>
            <a class="btn btn-xs btn-orange">Смотреть все</a>
        </div>
        <ul class="rowCart">
            @each('components.galleries.featured.item', $gallery_value, 'item')
        </ul>
        <button class="btn btn-xs btn-greey">Показать еще</button>
    </div>
</div>

