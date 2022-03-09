<div class="bg-p bg-Cw">
    <div class="container">
        <div class="box-title">
            <h2 class="title-i">Акции недели</h2>
            <a class="btn btn-xs btn-orange">Смотреть все</a>
        </div>
        <ul class="promotions rowCart">
            @each('components.galleries.promotions.item', $block, 'item', 'components.galleries.empty')
        </ul>
    </div>
</div>
