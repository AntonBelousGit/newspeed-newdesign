<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        // \App\Models\User::factory(10)->create();
        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(OrderStatusesTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
//        Category::factory(20)->create();
        $this->call(BrandSeeder::class);
        $this->call(ProductTableSeeder::class);
        $this->call(BlockTableSeeder::class);
        $this->call(GallerySeeder::class);
        $this->call(AttributesTableSeeder::class);
        $this->call(AttributeValuesTableSeeder::class);
//        $this->call(ProductAttributeTableSeeder::class);
        $this->call(PaymentSeeder::class);
        $this->call(DeliverySeeder::class);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
