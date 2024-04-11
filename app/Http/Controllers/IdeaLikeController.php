<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Exception;
use Illuminate\Support\Facades\Log;

class IdeaLikeController extends Controller
{
    public function like(Idea $idea)
    {
        try {
            $liker = auth()->user();
            $liker->likes()->attach($idea);

            return redirect()->route('dashboard')
                ->with('success', 'Liked successfully ');
        }
        catch (Exception $e) {
            Log::error('Error while liking the idea: ' . $e->getMessage());
            return redirect()->route('dashboard')
                ->with('error', 'Error while liking the idea');
        }

    }

    public function unlike(Idea $idea)
    {
        try {
            $liker = auth()->user();
            $liker->likes()->detach($idea);

            return redirect()->route('dashboard')
                ->with('success', 'Liked successfully ');
        }
        catch (Exception $e) {
            Log::error('Error while unliking the idea: ' . $e->getMessage());
            return redirect()->route('dashboard')
                ->with('error', 'Error while unliking the idea');
        }
    }
}
