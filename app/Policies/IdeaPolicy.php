<?php

namespace App\Policies;

use App\Models\Idea;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class IdeaPolicy
{
    /**
     * Admin or the idea owner can update and delete an idea.
     */
    public function update(User $user, Idea $idea): bool
    {
        return ($user->is_admin || $user->is( $idea->user));
    }

    public function delete(User $user, Idea $idea): bool
    {
        return ($user->is_admin || $user->is( $idea->user_id));
    }

}
