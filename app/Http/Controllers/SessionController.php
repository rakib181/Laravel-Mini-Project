<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create(){
        return view('auth.login');
    }
    public function store(Request $request){
        $key = Str::lower($request->input('email')).'|'.$request->ip();
        if (RateLimiter::tooManyAttempts($key, 5)) {
            throw ValidationException::withMessages([
                'wrong' => ['Too many login attempts. Please try again in '.RateLimiter::availableIn($key).' seconds.'],
            ]);
        }
         RateLimiter::hit($key, 60);
         $request->validate([
             'email'=>['required','email'],
             'password'=>['required','min:6']
         ]);
         if(! Auth::attempt($request->only('email','password'))){
             throw ValidationException::withMessages([
                 'wrong' => 'Email or password is incorrect'
             ]);
         }
         $request->session()->regenerate();
         return redirect()->route('jobs.index');
    }
    public function destroy(){
        Auth::logout();
        return redirect()->route('home');
    }
}
