<?php

namespace App\Providers;

use App\Models\Category;
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

        $catalog = Category::orderBy('sort','asc')->whereNull('category_id')->where('status',"true")->with('childrenCategories',function ($q) {
            $q->orderBy('sort','asc')->with('childrenCategories',function ($j) {
                $j->orderBy('sort','asc');
            });
        })->get();
        View::share(['catalog' => $catalog]);
    }
}
