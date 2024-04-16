<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function show(User $user)
    {
        $isOwnProfile = Auth::id() === $user->id;
        $user->load('favoriteAdvertisements', 'advertisements');

        return view('profile.show', compact('user', 'isOwnProfile'));
    }

    public function edit(User $user)
    {
        return view('profile.edit', compact('user'));    }

    public function update(Request $request, User $user)
    {
        // Validate the request data including the profile picture
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Handle profile picture upload
        if ($request->hasFile('profile_picture')) {
            // Remove old profile picture if exists
            $defaultProfilePic = 'profile_pictures/default.jpg'; // Path of the default profile picture

            if ($user->profile_picture && $user->profile_picture != $defaultProfilePic) {
                if (Storage::disk('public')->exists($user->profile_picture)) {
                    Storage::disk('public')->delete($user->profile_picture);
                }
            }

            $file = $request->file('profile_picture');
            $filename = time() . '.' . $file->getClientOriginalExtension();

            // Store the file in the public disk and update the validated data with the new path
            $path = $file->storeAs('profile_pictures', $filename, 'public');
            $validatedData['profile_picture'] = $path;
        }

        // Update the user's profile
        $user->update($validatedData);

        // Redirect back or to a different route
        return redirect()->route('profile.show', $user);
    }
}
