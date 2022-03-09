<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $product_name = $this->faker->unique()->words(4,true);
        $slug  = Str::slug($product_name);
        return [
            'name'=>$product_name,
            'slug'=>$slug,
            'short_description'=>$this->faker->text(200),
            'description'=>$this->faker->text(500),
            'seo_description'=>$this->faker->text(500),
            'regular_price'=>$this->faker->numberBetween(10,500),
            'SKU'=>$this->faker->unique()->numberBetween(100000,999999),
            'stock_status'=>'instock',
            'quantity'=> $this->faker->unique()->numberBetween(1,100),
            'image'=>'image'.$this->faker->unique()->numberBetween(1,10).'.png',
            'category_id'=>$this->faker->numberBetween(285,287)
        ];
    }
}
