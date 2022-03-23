<div class="baners bg-Cw">
    <div class="container">
        <div class="baners-top">
            <div class="baners-slider slider">

            </div>
        </div>
    </div>
</div>

<section class="section_slider">
    <div class="container">
        <div class="content_slider">
            <div class="left_width">
                @include('layouts.components.menu-catalog')
            </div>
            <div class="right_width">
                <div class="slider_list">
                    @each('components.galleries.mainslider.item', $block, 'item', 'components.galleries.empty')
                </div>
            </div>
        </div>
    </div>

</section>
