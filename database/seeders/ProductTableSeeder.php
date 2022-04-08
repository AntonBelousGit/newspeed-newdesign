<?php

    namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create(
            [
                'name'=> 'name',
                'slug'=>'slug',
                'description'=>'description',
                'seo_description'=>'seo_description',
                'regular_price'=> 15.0,
                'sale_price'=> 10,
                'stock_status' => 'instock',
                'featured' => true,
                'quantity' => 10,
                'category_id' => 1,
                'attribute' => ['size' => 'medium', 'color' => 'blue'],
                'SKU'=> 'SKU'
            ]
        );
    }
}
