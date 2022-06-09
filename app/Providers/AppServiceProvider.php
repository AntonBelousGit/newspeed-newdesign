<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Menu;
use Gloudemans\Shoppingcart\Facades\Cart;
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
//        Model::preventLazyLoading(!app()->isProduction());
        Schema::defaultStringLength(191);

        $catalog = Category::whereNull('category_id')->where('status', "true")->orderBy('sort', 'asc')
            ->with('childrenCategories', function ($q) {
                $q->orderBy('sort', 'asc')->where('status', "true")
                    ->with('childrenCategories', function ($j) {
                        $j->orderBy('sort', 'asc')->where('status', "true");
                    });
            })->get();

        $cart = Cart::instance('shopping');

        View::share(['catalog' => $catalog,'cart' => $cart]);
    }
}
