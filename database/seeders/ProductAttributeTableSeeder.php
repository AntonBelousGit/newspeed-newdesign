<?php

namespace Database\Seeders;

use App\Models\ProductAttribute;
use Illuminate\Database\Seeder;

class ProductAttributeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductAttribute::create([
//            'value' => 'Лимон',
//            'quantity' => 10,
//            'price_prefix' => '-',
//            'price' => 100,
            'product_id' => 1,
            'attribute_id' => 1,
            'attribute_value_id' => 1,
        ]);

        ProductAttribute::create([
//            'value' => '15cм',
//            'quantity' => 15,
//            'price_prefix' => '+',
//            'price' => 10,
            'product_id' => 1,
            'attribute_id' => 2,
            'attribute_value_id' => 2,
        ]);
    }
}

