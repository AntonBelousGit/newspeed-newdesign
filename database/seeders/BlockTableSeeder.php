<?php

namespace Database\Seeders;

use App\Models\Block;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BlockTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blocks')->insert([
            [
                'title' => 'Mainslider Template',
                'slug' => 'mainslider_template',
                'status' => '1', 'model' => 'galleriesRepositories',
                'themplate' => 'mainslider',
                'position' => '1',
                'ids' => '["1"]',
            ],
        ]);
        DB::table('blocks')->insert([
            [
                'title' => 'Sliders Themplate',
                'slug' => 'sliders_template',
                'status' => '1', 'model' => 'galleriesRepositories',
                'themplate' => 'sliders',
                'position' => '2',
                'ids' => '["1"]',
            ],
        ]);
        DB::table('blocks')->insert([
            [
                'title' => 'Popular Categories Themplate',
                'slug' => 'pop_cat',
                'status' => '0', 'model' => 'categoryRepositories',
                'themplate' => 'popcat',
                'position' => '3',
                'ids' => '["1"]',
            ],
        ]);
        DB::table('blocks')->insert([
            [
                'title' => 'Promotions Themplate',
                'slug' => 'promotion',
                'status' => '0', 'model' => 'productRepositories',
                'themplate' => 'promotions',
                'position' => '4',
                'ids' => '["1"]',
            ],
        ]);
        DB::table('blocks')->insert([
            [
                'title' => 'Services Themplate',
                'slug' => 'services_template',
                'status' => '0', 'model' => 'productRepositories',
                'themplate' => 'services',
                'position' => '6',
                'ids' => '["1"]',
            ],
        ]);
        DB::table('blocks')->insert([
            [
                'title' => 'Banner & Product Themplate',
                'slug' => 'banner_product_template',
                'status' => '0', 'model' => 'galleriesRepositories',
                'themplate' => 'banner_products',
                'position' => '8',
                'ids' => '["1"]',
            ],
        ]);
        DB::table('blocks')->insert([
            [
                'title' => 'Featured Themplate',
                'slug' => 'featured_template',
                'status' => '0', 'model' => 'productRepositories',
                'themplate' => 'featured',
                'position' => '9',
                'ids' => '["1"]',
            ],
        ]);
        DB::table('blocks')->insert([
            [
                'title' => 'New Themplate',
                'slug' => 'new_product',
                'status' => '0', 'model' => 'productRepositories',
                'themplate' => 'new_product',
                'position' => '18',
                'ids' => '["1"]',
            ],
        ]);
        DB::table('blocks')->insert([
            [
                'title' => 'Two Banners Themplate',
                'slug' => 'two_banners_template_template',
                'status' => '0', 'model' => 'galleriesRepositories',
                'themplate' => 'two_banners',
                'position' => '11',
                'ids' => '["1"]',
            ],
        ]);
        DB::table('blocks')->insert([
            [
                'title' => 'Promotion Banner Template',
                'slug' => 'promotion_banner_template',
                'status' => '0', 'model' => 'galleriesRepositories',
                'themplate' => 'promotion_banner',
                'position' => '12',
                'ids' => '["1"]',
            ],
        ]);
        DB::table('blocks')->insert([
            [
                'title' => 'Gallery Tabs',
                'slug' => 'gallery_tabs_template',
                'status' => '0', 'model' => 'productRepositories',
                'themplate' => 'gallery_tabs',
                'position' => '13',
                'ids' => '["1"]',
            ],
        ]);
        DB::table('blocks')->insert([
            [
                'title' => 'Subscribe Mail Template',
                'slug' => 'subscribe_template',
                'status' => '0', 'model' => 'subscribeRepositories',
                'themplate' => 'subscribe',
                'position' => '14',
                'ids' => '["1"]',
            ],
        ]);
        DB::table('blocks')->insert([
            [
                'title' => 'Product Gallery Tabs Template',
                'slug' => 'product_gallery_tabs_template',
                'status' => '0', 'model' => 'galleriesRepositories',
                'themplate' => 'themplate',
                'position' => '15',
                'ids' => '["1"]',
            ],
        ]);
        DB::table('blocks')->insert([
            [
                'title' => 'Product Tabs Template',
                'slug' => 'product_tabs_template',
                'status' => '0', 'model' => 'productRepositories',
                'themplate' => 'product_tabs',
                'position' => '16',
                'ids' => '["1"]',
            ],
        ]);
        DB::table('blocks')->insert([
            [
                'title' => 'Blog Template',
                'slug' => 'blog_template',
                'status' => '0', 'model' => 'blogRepositories',
                'themplate' => 'blog',
                'position' => '17',
                'ids' => '["1"]',
            ],
        ]);
    }
}
