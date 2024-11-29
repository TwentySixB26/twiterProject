<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */




    //menganti default dari pagination yang awalnya tailwind menjadi bootsrap
    public function boot(): void
    {
        paginator::useBootstrapFive();
    }
}
