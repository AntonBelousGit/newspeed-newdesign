<div class="bg-p bg-Cw">
    <div class="hit center container">
        <div class="box-title">
            <h2 class="title-i">Хиты продаж</h2>
            <a class="btn btn-xs btn-orange">Смотреть все</a>
        </div>
        <ul class="rowCart">

            @each('components.galleries.bestsellers.item', $item, 'item', 'components.galleries.empty')

        </ul>
        <button class="btn btn-xs btn-greey">Показать еще</button>
    </div>
</div>
