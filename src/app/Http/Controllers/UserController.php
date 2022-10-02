<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    function showAuth()
    {
        return view("auth");
    }

    function runAuth(Request $request)
    {
        return view("auth");
    }

    function showReg()
    {
        return view("reg");
    }

    function runReg(Request $request)
    {
        return view("reg");
    }

}
