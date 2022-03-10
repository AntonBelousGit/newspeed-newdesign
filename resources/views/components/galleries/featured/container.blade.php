<section class="section_category section">
    <div class="container">
        <div class="category_content">
            <h3>
                {{__('Рекомендуемые товары')}}
            </h3>
            <div class="list_product">
                @each('components.galleries.featured.item', $block, 'item', 'components.galleries.empty')
            </div>
        </div>
    </div>
</section>
