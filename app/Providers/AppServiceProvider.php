<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;

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
          // Specified key was too long error, Laravel News post:
            Schema::defaultStringLength(191);

            
        Paginator::useBootstrap();
        
        Paginator::useBootstrap();

        Paginator::useBootstrap();
     
    }
}
