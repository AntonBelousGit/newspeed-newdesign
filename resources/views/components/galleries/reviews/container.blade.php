<div class="bg-p bg-Cw">
    <div class="fd-c new center container">
        <h2 class="title-i">Новинки</h2>
        <ul class=" rowCart">
            @each('components.galleries.new_product.item', $item, 'item', 'components.galleries.empty')
        </ul>
        <button class="btn btn-xs btn-greey">Показать еще</button>
    </div>
</div>
