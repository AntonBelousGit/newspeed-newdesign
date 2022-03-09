<div class="bg-p bg-Cw">
    <div class="container">
        <h2 class="title-i">{{ $block->title }}</h2>
        <ul class="category">
            @each('components.galleries.popcat.item', $gallery_value, 'item')
        </ul>
    </div>
</div>
