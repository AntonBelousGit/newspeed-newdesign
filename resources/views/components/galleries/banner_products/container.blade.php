<div class="bg-p bg-Cw">
    <div class="collsTwoCart container">
        <figure class="collsTwoCart-img ">
            <picture>
                <source srcset="./img/baner7.webp" type="image/webp">
                <img src="./img/baner7.png" alt=""></picture>
            <figcaption class="text-baner">
                <h4 class="title-i">Слоган про катание на самокатах</h4>
                <p class="text-sb text-sb-xxl text-sb-black">Будь активным!</p>
            </figcaption>
        </figure>
        <div class="interesting collsTwoCart-cont">
            <h2 class="title-i">Интересное</h2>
            <ul class="collsTwoCart-cont-box">
                @dd($item)
                @each('components.galleries.banner_products.item', $item, 'item', 'components.galleries.empty')
            </ul>
        </div>
    </div>
</div>
