<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\App;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
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
        // app()->setLocale('es') ;
        // App::setLocale('fr') ;
        paginator::useBootstrapFive();


        // \DebugBar::enable();

        cache()->forget('topUsers') ;

        $topUsers = Cache::remember('topUsers', 60 * 2 , function () {
            return  User::withCount('ideas')->orderBy('ideas_count','DESC')->limit(5)->get() ;
        });

        View::share('top_users' , $topUsers) ;
    }
}
