<?php

namespace App\Providers;

//use Illuminate\Support\Facades\Gate;
use App\Models\Idea;
use App\Models\User;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        //Admin Role
        Gate::define('admin', function (User $user) : bool {
            return (bool) $user->is_admin;
        });

        //Permission to edit an idea
        Gate::define('idea.edit', function (User $user, Idea $idea) : bool {
            return ( (bool) $user->is_admin || $user->id === $idea->user_id );
        });

        //Permission to delete an idea
        Gate::define('idea.delete', function (User $user, Idea $idea) : bool {
            return ( (bool) $user->is_admin || $user->id === $idea->user_id);
        });
    }
}
