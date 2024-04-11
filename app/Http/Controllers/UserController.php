<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Facades\Log;
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
        $this->authorize('update', $user);
        return view('users.edit', [
           'user' => $user,
           'editing' => true,
            'ideas' => $user->ideas()->paginate(5),
        ]);
    }


    /**
     * @throws AuthorizationException
     */
    public function update(UpdateUserRequest $request,User $user)
    {
        try {
            $this->authorize('update', $user);

            $validated = $request->validated();

            if ($request->has('image')) {
                $imagePath = $request->file('image')->store('profile', 'public');
                $validated['image'] = $imagePath;

                Storage::disk('public')->delete($user->image ?? '');
            }

            $user->update($validated);
            return redirect()->route('profile');
        }
        catch (AuthorizationException $e) {
            Log::error('An error occurred while updating the User ! : ' . $e->getMessage());
            return back()->withErrors(['error'=>'An error occurred while updating the User!']);
        }
    }

    public function profile()
    {
        return $this->show(auth()->user());
    }

}
