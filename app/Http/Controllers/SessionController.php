<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    //
    public function create()
    {
        return view("sessions.create");
    }

    public function store()
    {
        // validate request
        $attributes = request()->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (!auth()->attempt($attributes)) {
            throw ValidationException::withMessages([
                'email' => "Your provided credentials are invalid"
            ]);
        }
        
        session()->regenerate();

        return redirect('/')->with("success", "Welcome Back");
    }
    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with("success", "User Logged Out Successfully");
    }
}
