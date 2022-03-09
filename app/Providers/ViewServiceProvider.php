<?php

namespace App\Providers;

use App\Http\Views\Composers\AsideComposer;
use App\Http\Views\Composers\CategoryComposer;
use App\Models\Contact;
use App\Models\JsonCountry;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
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
//        view()->composer('*', function ($view)
//        {
//            $auth_user = Auth::user();
//            $contacts = Contact::where('slug', '=', 'contacts');
//            $contacts = $contacts->exists() ? $contacts->first() : null;
//            $contacts = $contacts !== null ? $contacts->value : null;
//            $view->with(['auth_user'=> $auth_user, 'auth_user_id' => Auth::id(), 'contacts' =>$contacts ] );
//        });

//        view()->composer(['layouts.includes.offers.flag', 'includes.one_advertiser.offers.flag', 'layouts.includes.index.aside.offers_item.flags.item'], function ($view)
//        {
//            $json_countries = JsonCountry::select('countries')->first()->countries;
//            $json_countries = json_decode($json_countries, true);
//            //dd($json_countries);
//            $view->with(['json_countries'=> $json_countries, ] );
//        });
//        View::composer(['layouts.header', 'layouts.includes.advertisers.filter', 'layouts.includes.offers.filter', 'admin/*', 'home/*'], CategoryComposer::class);
//        View::composer(['layouts.includes/index/aside/*', 'layouts.includes/index/aside',], AsideComposer::class);
    }
}
