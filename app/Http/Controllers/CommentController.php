<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCommentRequest;
use App\Models\Idea;
use App\Models\Comment;

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

    // edit and update methods need fix
    public function edit(Comment $comment)
    {
        $this->authorize('update', $comment);
        $editing = true;
        return view('comments.edit', compact('comment', 'editing'));

    }

    public function update(CreateCommentRequest $request, Comment $comment)
    {
        $this->authorize('update', $comment);
        $validated = $request->validated();
        $comment->update($validated);
        return redirect()->route('ideas.show', $comment->idea_id)
            ->with('success', 'Comment updated successfully!');
    }

    public function destroy(Comment $comment)
    {
        $this->authorize('delete', $comment);
        $comment->delete();
        return back()->with('success', 'Comment deleted successfully!');
    }
}
