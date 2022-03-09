<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(
            [
                'name' => 'Category №1',
                'slug' => 'cat_slug',
                'popular'=>'on',
                'recomend'=>'on'
            ]
        );
    }
}
