<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Hash;

class RegisterController extends Controller
{
    public function index() {
        return view('System_admin.register');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|same:confirm_password',
            'confirm_password' => 'required|same:password'
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->user_type = 'Administrator';
        $user->save();
        return back()->with('message-success', 'Administrator account successfully created!');
    }
}
