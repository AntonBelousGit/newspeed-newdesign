<?php

namespace App\Observers;

use Illuminate\Support\Facades\Cache;

class GalleriesObserver
{

    public function created(){
        Cache::forget('mainslider');
        Cache::forget('sliders');
    }

    public function updated()
    {
        Cache::forget('mainslider');
        Cache::forget('sliders');
    }

    public function deleted()
    {
        Cache::forget('mainslider');
        Cache::forget('sliders');
    }
}
