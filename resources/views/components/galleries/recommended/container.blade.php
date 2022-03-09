<div class="bg-p bg-Cw">
    <div class="container">
        <div class="box-title">
            <h2 class="title-i">Рекомендуемые товары</h2>
            <a class="btn btn-xs btn-orange">Смотреть все</a>
        </div>
        <ul class="promotions rowCart">
            @each('components.galleries.mainslider.item', $features, 'feature', '')
        </ul>
    </div>
</div>
