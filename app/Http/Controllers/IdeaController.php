<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function store()
    {
        $validated = request()->validate(['content' => 'required|min:5|max:255',]);

        $validated['user_id'] = auth()->id();

        Idea::create($validated);

        return redirect()->route('dashboard')->with('success', 'Idea created successfully!');
    }

    public function show(Idea $idea)
    {
        return view('ideas.show', compact('idea'));
    }

    public function edit(Idea $idea)
    {
        if (auth()->id() !== $idea->user_id) { // If the authenticated user is not the owner of the idea
            abort(403);
        }

        $editing = true;
        return view('ideas.show',compact('idea','editing'));
    }

    public function update(Idea $idea)
    {
        $validated = request()->validate([ 'content' => 'required|min:5|max:255', ]);

        $idea->update($validated);
        $idea->save();

        return redirect()->route('ideas.show', $idea->id)->with('success', 'Idea updated successfully!');
    }

    public function destroy(Idea $idea)
    {
        if (auth()->id() !== $idea->user_id) { // If the authenticated user is not the owner of the idea
            abort(403);
//            return back()->with('error', 'You are not allowed to delete this idea!');
        }

        $idea->delete();
        return redirect()->route('dashboard')->with('success', 'Idea deleted successfully!');
    }
}
