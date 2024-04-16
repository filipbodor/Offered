<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;

class AuthManager extends Controller
{
    function login(){
        if (Auth::check()){
            return redirect(route('home'));
        }
        return view('auth.login');
    }

    function registration(){
        if (Auth::check()){
            return redirect(route('home'));
        }
        return view('auth.registration');
    }

    function loginPost(Request $request){
        $request->validate([
            'email' =>'required',
            'password' =>'required'
        ]);

        $credentials =$request->only('email', 'password');
        if(Auth::attempt($credentials)){
            return redirect()->intended(route('home'));
        }
        return redirect(route('login'))->with("error","Login details are not valid");
    }

    function registrationPost(Request $request){

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role_id' => Role::where('name', 'user')->first()->id,
            'profile_photo_path' => 'profile_pictures/default.jpg',
        ]);

        \log::info($request);
        if(!$user){
            return redirect(route('registration'))->with("error","Registration failed, try again");
        }
        return redirect(route('login'))->with("success","Registration success, Login to access the app");
    }

    function logout() {
        Session::flush();
        Auth::logout();
        return redirect(route('login'));
    }
}
