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
            $pathToPythonTmpDir = __DIR__."/../../../storage/app/tmp/";
            $tmpFileName = time().".py";
            file_put_contents($pathToPythonTmpDir.$tmpFileName,$code);
            $realcode ="cd " . $pathToPythonTmpDir . "; python3 " . $tmpFileName." 2>&1";
            $output = shell_exec($realcode);
            unlink($pathToPythonTmpDir.$tmpFileName);
        }
        return view("repl",compact('code', 'output'));
    }
}
