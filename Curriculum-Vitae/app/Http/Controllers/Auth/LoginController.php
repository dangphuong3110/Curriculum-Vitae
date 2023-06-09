<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function showLoginForm(){
        return view('login.login');
    }

    public function login(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:6'],
        ]);

        $credentials['verified'] = true;

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/guest');
        }

        throw ValidationException::withMessages([
            'email' => 'Incorrect email or password.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
