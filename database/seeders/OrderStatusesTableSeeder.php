<?php

namespace Database\Seeders;

use App\Models\OrderStatus;
use Illuminate\Database\Seeder;

class OrderStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OrderStatus::truncate();
        OrderStatus::create(['name' =>'new']);
        OrderStatus::create(['name' =>'accepted']);
        OrderStatus::create(['name' =>'shipped']);
        OrderStatus::create(['name' =>'paid']);
        OrderStatus::create(['name' =>'completed']);
        OrderStatus::create(['name' =>'canceled']);
        OrderStatus::create(['name' =>'declined']);
    }
}
