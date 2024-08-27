<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCommentRequest;
use App\Models\Idea;
use App\Models\Comment;
use Illuminate\Support\Facades\Log;

class CommentController extends Controller
{
    public function store(CreateCommentRequest $request, Idea $idea)
    {
        $validated = $request->validated();
        $validated['user_id'] = auth()->id();
        $validated['idea_id'] = $idea->id;
        Comment::create($validated);

        return redirect()->route('ideas.show', $idea->id)
            ->with('success', 'Comment created successfully!');
    }

    public function update(CreateCommentRequest $request, Comment $comment)
    {
        try {
            $this->authorize('update', $comment);
            $validated = $request->validated();
            $comment->update($validated);
            return redirect()->route('ideas.show', $comment->idea_id)
                ->with('success', 'Comment updated successfully!');
        } catch (\Exception $e) {
            Log::error('An error occurred while updating the comment! : ' . $e->getMessage());
            return back()->withErrors(['error' => 'An error occurred while updating the comment!']);
        }
    }

    public function destroy(Idea $idea, Comment $comment)
    {
        $this->authorize('delete', [$comment, $idea]);
        $comment->delete();
        return back()->with('success', 'Comment deleted successfully!');
    }
}
