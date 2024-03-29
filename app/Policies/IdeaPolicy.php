<?php

namespace App\Policies;

use App\Models\Idea;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class IdeaPolicy
{
    /**
     * Admins or the idea owner can update an idea.
     */
    public function update(User $user, Idea $idea): bool
    {
        return ($user->is_admin || $user->is( $idea->user));
    }

    /**
     * Admins or the idea owner can delete an idea.
     */
    public function delete(User $user, Idea $idea): bool
    {
        return ($user->is_admin || $user->is( $idea->user_id));
    }

}
