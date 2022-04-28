<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index() {
        return view('login');
    }

    public function store(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        
        $remember_me = $request->has('remember_me') ? true : false;

        $credentials = array(
            'email' => $request->email,
            'password' => $request->password
        );
        
        if(Auth::attempt($credentials, $remember_me)) {
            $request->session()->regenerate();
            if(Auth::check()) {
                if(Auth::user()->user_type === 'Administrator') {
                    return redirect('/admin_dashboard');
                } else {
                    return redirect('/user_dashboard');
                }
            }     
        } else {
            return back()->with('message-error', 'Your email and password do not match our record!');
        }
    }
}
