<?php

namespace Database\Seeders;

use App\Models\Payment;
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Payment::truncate();
        Payment::create(['payment_name'=>'Наличными при получение']);
        Payment::create(['payment_name'=>'Наложеным платежом']);
        Payment::create(['payment_name'=>'Безналичный расчет (только для юридических лиц)']);
        Payment::create(['payment_name'=>'Оплата картой']);
    }
}
