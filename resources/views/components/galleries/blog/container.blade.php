<section class="section section_reviews">
    <div class="container">
        <div class="wrap_title">
            <h3>
                Обзоры
            </h3>
            <a href="{{ route('blogs.index') }}">Смотреть все обзоры</a>
        </div>
        <div class="list_reviews">
            @each('components.galleries.blog.item', $block, 'item', 'components.galleries.empty')
        </div>
    </div>
</section>


