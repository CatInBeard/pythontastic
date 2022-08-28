<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReplController extends Controller
{
    function show(){
        return view("repl");
    }
    function run(Request $request){
        $code = $request->post('code');
        if($code === null){
            $output = "Nothing to run!";
        }
        else{
            $output = shell_exec($code);
        }
        return view("repl",compact('code', 'output'));
    }
}
