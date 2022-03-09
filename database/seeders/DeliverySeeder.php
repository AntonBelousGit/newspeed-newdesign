<?php

namespace Database\Seeders;

use App\Models\Delivery;
use Illuminate\Database\Seeder;

class DeliverySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Delivery::truncate();
        Delivery::create(
            [
                'delivery_name' => 'Самовывоз из нашего магазина',
                'description' => 'Бесплатно'
            ]);
        Delivery::create(
            [
                'delivery_name' => 'Служба доставки',
                'description' => 'Согласно тарифам службы доставки'
            ]);
        Delivery::create(
            [
                'delivery_name' => 'Доставка курьером',
                'description' => 'Бесплатно от 999 грн.'
            ]);
    }
}
