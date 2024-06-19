<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Schema;
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
//        Cache::flush();
        // Get the top users from the cache

        if (Schema::hasTable('users')) {
            $topUsers = Cache::remember('topUsers', 3, function () {
                return User::withCount('ideas')
                    ->orderBy('ideas_count', 'DESC')
                    ->limit(10)->get();
            });
            View::share('topUsers', $topUsers); // Share the top users with all views at one place
        }

//        Cache::forget('topUsers'); // Clear the cache

    }
}
