<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateIdeaRequest;
use App\Http\Requests\UpdateIdeaRequest;
use App\Models\Idea;
use App\Models\User;
use Illuminate\Http\Request;


/*
 * Validation request classes are used to validate incoming requests before they reach the controller.
 * They are used to validate the request data and return the validated data.
 */
class IdeaController extends Controller
{
    public function store(CreateIdeaRequest $request)
    {
        $validated = $request->validated();

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
//        if (auth()->id() !== $idea->user_id) { // If the authenticated user is not the owner of the idea
//            abort(404);
//        }

        $this->authorize('update', $idea);

        $editing = true;
        return view('ideas.show',compact('idea','editing'));
    }

    public function update(UpdateIdeaRequest $request,Idea $idea)
    {
        $this->authorize('update', $idea);
        $validated = $request->validated();

        $idea->update($validated);
        $idea->save();

        return redirect()->route('ideas.show', $idea->id)->with('success', 'Idea updated successfully!');
    }

    public function destroy(Idea $idea)
    {
//        if (auth()->id() !== $idea->user_id) { // If the authenticated user is not the owner of the idea
//            abort(404);
////            return back()->with('error', 'You are not allowed to delete this idea!');
//        }

        $this->authorize('delete', $idea);

        $idea->delete();
        return redirect()->route('dashboard')->with('success', 'Idea deleted successfully!');
    }
}
