<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
class AuthController extends Controller
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

    function logout(){
        Auth::logout();
        return redirect(route('welcome.show'));
    }

    function showReg()
    {
        return view("reg");
    }

    function runReg(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'username' => ['required', 'max:50', "min:3"],
            'password' => ['required', "min:6"],
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

        $User = User::where('username', $credentials['username'])->first();

        if($User){
            return back()->withErrors([
                'sigUp' => 'Username is allready used!',
            ])->onlyInput('email')->onlyInput('username')->onlyInput('password');
        }

        else{
            User::create([
                'username'     => $credentials['username'],
                'password' => Hash::make($credentials['password']),
                'email'    => $credentials['email'],
            ]);
            return redirect()->intended(route('user.auth.show'));
        }
    }

}
