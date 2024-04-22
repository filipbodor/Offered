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

}
