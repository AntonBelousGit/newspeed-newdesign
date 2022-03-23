<?php

namespace App\Providers;

use App\Http\ViewComposers\NavigationComposer;
use App\Models\Category;
use App\Repositories\MenuRepository;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('components.popcat', function ($view){
            $view->with(['catpop'=> Category::related()]);
        });

        View::composer(
            'layouts.components.menu-catalog', NavigationComposer::class
        );


    }

}
