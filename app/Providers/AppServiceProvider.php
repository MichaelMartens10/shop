<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Auth;
use App\Nav;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        view()->composer('layouts.navbar', function(){
          if(Auth::guard('admin')->check()){
            Auth::shouldUse('admin');
          }


        });

        $nav = Nav::all();
        View::share('nav', $nav);


    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }
}
