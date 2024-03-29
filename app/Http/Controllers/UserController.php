<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Idea;
use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function show(User $user)
    {
        $ideas = $user->ideas()->paginate(5);


        return view('users.show',compact('user','ideas'));
    }

    public function edit(User $user)
    {
        $this->authorize('update',$user);
        $ideas = $user->ideas()->paginate(5);

        $editing = true;
        return view('users.edit',compact('user','editing','ideas'));
    }

    /**
     * @throws AuthorizationException
     */
    public function update(User $user)
    {
        $this->authorize('update',$user);
        $validated = request()->validate([
            'name' => 'required|min:3|max:50',
            'bio' => 'nullable|min:3|max:100',
            'image' => 'image',
        ]);

        if(request()->has('image')){
            $imagePath = request()->file('image')->store('profile','public');
            $validated['image'] = $imagePath;

            Storage::disk('public')->delete($user->image ?? '');
        }



        $user->update($validated);
        return redirect()->route('profile');
    }

    public function profile()
    {
        return $this->show(auth()->user());
    }

}
