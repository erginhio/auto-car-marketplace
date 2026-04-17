<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RegisterUserController extends Controller
{
    public function create(): View
    {
        return view('auth.register');
    }
    public function store(Request $request) : RedirectResponse
    {
        $validation = $request->validate([
            'name' => ['required'],
            'email'=>['required','email','unique:users'],
            'phone'=>['numeric'],
            'password'=>['required'],
            'confirmPassword'=>['same:password'],
        ]);
        $user = User::create($validation);
        $user->sendEmailVerificationNotification();
        
        return redirect(route('login'));
    }
}
