<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SessionsController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }

    public function index(){
        return view('sessions/show');
    }

    public function store(){
        $attributes=request()->validate([
            'email'=>'required|email',
            'password'=>'required'
        ]);

        if(!auth()->attempt($attributes)){
            throw ValidationException::withMessages([
                'email'=>'Invalid email or password'
            ]);
        }

        session()->regenerate();

        return redirect('/')->with('success','Welcome Back');
    }

    public function destroy(){
        auth()->logout();

        return redirect('/')->with('success','Goodbye');
    }
}
