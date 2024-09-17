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

        return redirect()->route('ideas.show',$idea->id)
            ->with('success','Comment created successfully!');
    }


    //code fix needed
    public function edit($id)
    {
        $comment = Comment::find($id);
        return view('comments.edit', compact('comment'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'content' => 'required',
        ]);

        $comment = Comment::find($id);
        $comment->content = $request->get('content');
        $comment->save();

        return redirect()->route('ideas.show', $comment->idea_id)->with('success', 'Comment updated successfully');
    }


    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment->delete();

        return back()->with('success', 'Comment deleted successfully');
    }
}
