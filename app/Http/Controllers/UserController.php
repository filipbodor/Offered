<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('admin.users', compact('users'));
    }

    public function getUserProfilePic($userId)
    {
        $user = User::find($userId);

        // If user exists, return the profile picture URL
        if ($user) {
            return response()->json([
                'success' => true,
                'profilePictureUrl' => $user->profile_picture,
            ]);
        }

        // If user not found, return an error response
        return response()->json([
            'success' => false,
            'message' => 'User not found',
        ], 404);
    }
}
