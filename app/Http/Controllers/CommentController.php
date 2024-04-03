<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCommentRequest;
use App\Models\Idea;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(CreateCommentRequest $request,Idea $idea) {
        $validated = $request->validated();
        $validated['user_id'] = auth()->id();
        $validated['idea_id'] = $idea->id;
        Comment::create($validated);

        return redirect()->route('ideas.show',$idea->id)->with('success','Comment created successfully!');
    }


    //code fix needed
    public function edit(Comment $comment)
    {
        $this->authorize('update',$comment);
        $editing = true;
        return view('comments.edit',compact('comment','editing'));

    }

    //code fix needed
    public function destroy(Comment $comment) {
        $this->authorize('delete',$comment);
        $comment->delete();
        return back()->with('success','Comment deleted successfully!');
    }
}
