<?php

namespace App\Observers;

use Illuminate\Support\Facades\Cache;

class ProductObserver
{
    public function created(){
        Cache::forget('featured-product');
        Cache::forget('promotions-product');
        Cache::forget('new_product');
    }

    public function updated()
    {
        Cache::forget('featured-product');
        Cache::forget('promotions-product');
        Cache::forget('new_product');
    }

    public function deleted()
    {
        Cache::forget('featured-product');
        Cache::forget('promotions-product');
        Cache::forget('new_product');
    }
}
