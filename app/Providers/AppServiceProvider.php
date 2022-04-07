<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// add here 1
use Illuminate\Support\Facades\Schema;


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
    // 2
    {
        Schema::defaultStringLength(191); 
    }
}
