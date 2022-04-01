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
            'password' => 'required',
            'confirm_password' => 'required',
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->user_type = $request->user_type;

        if($request->password != $request->confirm_password) {
            return back()->with('message-error', 'Failed to create account, password do not match!');
        } else if($request->user_type === "Select user's type") {
            return back()->with('message-error', 'Failed to create account, please select user type!');
        } else {
            $user->save();
            return back()->with('message-success', 'Account successfully created!');
        }
    }
}
