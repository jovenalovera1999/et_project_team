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

        $credentials = array(
            'email' => $request->email,
            'password' => $request->password
        );

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if(Auth::check()) {
                return redirect('/admin_dashboard');
                // if(Auth::user()->user_type === 'Administrator') {
                //     // Redirect to administrator dashboard
                // } else {
                //     // Redirect to alumni user dashboard
                // }
            }
        } else {
            return back()->with('message-error', 'Your email and password do not match our record!');
        }
    }
}
