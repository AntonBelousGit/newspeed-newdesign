<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $image_main_slider = [
            [
                "url" => "/",
                "title" => "title",
                "img" => "main_gallery/34577-kosmos_nebo_derevya_1643285542.jpg"
            ],
            [
                "url" => "/",
                "title" => "title",
                "img" => "main_gallery/34775-kosmos_galaktika_priroda_1643285542.jpg"
            ]
        ];
        $image_slider = [
            [
                "url" => "/",
                "title2" => "title2",
                "title1" => "title1",
                "img" => "34577-kosmos_nebo_derevya_1643285581.jpg"
            ],
            [
                "url" => "/",
                "title2" => "title2",
                "title1" => "title1",
                "img" => "35166-kosmos_tumannost_1643285581.jpg"
            ],
            [
                "url" => "/",
                "title2" => "title2",
                "title1" => "title1",
                "img" => "35441-kosmos_holst_mertsanie_1643285581.jpg"
            ],
            [
                "url" => "/",
                "title2" => "title2",
                "title1" => "title1",
                "img" => "51211-krasnyj_tumannost_oblaka_1643285581.jpg"
            ]
        ];

        Gallery::create(
            [
                'name' => 'mainslider_template',
                'value' => $image_main_slider,
            ],
        );
        Gallery::create(
            [
                'name' => 'sliders_template',
                'value' => $image_slider,
            ],
        );
        Gallery::create(
            [
                'name' => 'pop_cat',
            ],
        );
        Gallery::create(
            [
                'name' => 'promotion',

            ],
        );
        Gallery::create(
            [
                'name' => 'services_template',
            ],
        );
        Gallery::create(
            [
                'name' => 'banner_gallery_template',
            ],
        );
        Gallery::create(
            [
                'name' => 'featured_template',
            ],
        );
        Gallery::create(
            [
                'name' => 'two_banners_template_template',
            ],
        );
        Gallery::create(
            [
                'name' => 'promotion_banner_template',

            ],
        );
        Gallery::create(
            [
                'name' => 'gallery_tabs_template',
            ],
        );
        Gallery::create(
            [
                'name' => 'subscribe_template',
            ],
        );
        Gallery::create(
            [
                'name' => 'gallery_gallery_tabs_template',
            ],
        );
        Gallery::create(
            [
                'name' => 'gallery_tabs_template',
            ],
        );
        Gallery::create(
            [
                'name' => 'blog_template',
            ],
        );
    }
}
