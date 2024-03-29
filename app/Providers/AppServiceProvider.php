<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;


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
    public function boot(): void
    {
        Paginator::useBootstrapFive();

        App::setLocale('tr');

        // Share the top users with all views at one place
        View::share('topUsers', User::withCount('ideas')
            ->orderBy('ideas_count', 'DESC')
            ->limit(5)->get());


    }
}
