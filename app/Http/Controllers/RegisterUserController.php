<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisterUserController extends Controller
{
    public function create(){
       return view('auth.register');
    }
    public function store(Request $request){
        $data = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => ['required','email','unique:users'],
            'password' => ['required', Password::min(6), 'confirmed'],
        ]);
        $user = User::query()->Create($data);
        Auth::login($user);
        return redirect()->route('jobs.index');
    }
}
