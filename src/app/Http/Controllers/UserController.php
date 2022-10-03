<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
class UserController extends Controller
{

    function showAuth()
    {
        return view("auth");
    }

    function runAuth(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('welcome.show'));
        }
 
        return back()->withErrors([
            'sigIn' => 'Wrong login or password',
        ])->onlyInput('email');
    }

    function showReg()
    {
        return view("reg");
    }

    function runReg(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
            'password-confirm' => ['required'],
        ]);

        if($credentials['password'] != $credentials['password-confirm']){
            return back()->withErrors([
                'password' => 'Passwords does not match!',
            ])->onlyInput('email');
        }

        $User = User::where('email', $credentials['email'])->first();

        if($User){
            return back()->withErrors([
                'sigUp' => 'Email is allready used!',
            ])->onlyInput('email');
        }
        else{
            User::create([
                'name'     => $credentials['email'],
                'password' => Hash::make($credentials['password']),
                'email'    => $credentials['email'],
            ]);
            return redirect()->intended(route('user.auth.show'));
        }
    }

}
