<div class="bg-p bg-Cw">
    <div class="container">
        <h2 class="title-i">Популярные категории</h2>
        <ul class="category">
            @each('components.galleries.popcat.item', $block, 'item','components.galleries.empty')
        </ul>
    </div>
</div>