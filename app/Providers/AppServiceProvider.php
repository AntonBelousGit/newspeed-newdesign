<?php

namespace App\Providers;

use App\Models\Menu;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Model::preventLazyLoading(!app()->isProduction());
        Schema::defaultStringLength(191);

        $catalog = Menu::orderBy('sort','desc')->whereNull('menu_id')->where('status',1)->with('children.children')->get();
        View::share(['catalog' => $catalog]);
    }
}
