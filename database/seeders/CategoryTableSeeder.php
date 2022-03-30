<?php

namespace Database\Seeders;

use App\Models\Category;
use Database\Factories\CategoryFactory;
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
//        $this->call(CategoryFactory::class);
        Category::factory(2)->create()
            ->each(function ($category) {
                Category::factory(3)->create(['category_id' => $category->id])
                    ->each(function ($child_cat) {
                        Category::factory(3)->create(['category_id' => $child_cat->id]);
                    });
            });
    }
}
