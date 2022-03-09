<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    public function run()
    {
        Brand::create(
            [
                'name' => 'Brand №1',
            ]
        );
        Brand::create(
            [
                'name' => 'Brand №2',
            ]
        );
        Brand::create(
            [
                'name' => 'Brand №3',
            ]
        );
    }
}
