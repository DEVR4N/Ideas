<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Idea;
use App\Models\Comment;

class CommentPolicy
{
    /**
     * - Admin or Comment owner can delete a comment.
     */
    public function delete(User $user, Comment $comment)
    {
        return $user->id === $comment->user_id || $user->is_admin;
    }
}
