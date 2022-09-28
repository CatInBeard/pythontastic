<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\PytonRunRepository;

class ReplController extends Controller
{
    function show(){
        return view("repl");
    }
    function run(Request $request){
        $code = $request->post('code');
        if($code === null){
            $output = "Nothing to run!";
            $startTime = null;
            $endTime = null;
        }
        else{
            [$output,$startTime,$endTime] = PytonRunRepository::runCodeFromText($code);
        }
        return view("repl",compact('code', 'output'));
    }
    function apiRun(Request $request){
        $code = $request->post('code');
        $result = "err";
        if($code !== null){
            [$result,$startTime,$endTime] = PytonRunRepository::runCodeFromText($code);
            $runTime = ($endTime - $startTime);
            return json_encode(compact('result','runTime'));
        }
        return json_encode(compact('result'));
    }
}
