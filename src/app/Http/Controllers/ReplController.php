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
            $tmpName = time();
            $tmpFileName = $tmpName .".py";

            file_put_contents($pathToPythonTmpDir.$tmpFileName,$code);

            $makeDirCode = "sshpass -p \"123\" ssh -o StrictHostKeyChecking=no -o UserKnownHostsFile=/dev/null root@sandbox mkdir /app/".$tmpName;
            shell_exec($makeDirCode);
            
            $copyCode = "cd {$pathToPythonTmpDir} ; sshpass -p \"123\" scp -o StrictHostKeyChecking=no -o UserKnownHostsFile=/dev/null {$tmpFileName}  root@sandbox:/app/{$tmpName}/main.py";
            shell_exec($copyCode);

            $sandboxCode = 'sshpass -p "123" ssh -o StrictHostKeyChecking=no -o UserKnownHostsFile=/dev/null root@sandbox docker run -i --rm --name pythonsandbox -v /app/'.$tmpName.':/usr/src/myapp -w /usr/src/myapp python:3 python main.py  2>&1';
            $output = shell_exec($sandboxCode);

            $rmCode = "sshpass -p \"123\" ssh -o StrictHostKeyChecking=no -o UserKnownHostsFile=/dev/null root@sandbox rm -R /app/{$tmpName} ";
            shell_exec($rmCode);

            unlink($pathToPythonTmpDir.$tmpFileName);

            $outputParts = explode("\n",$output);
            array_shift($outputParts);
            $output = implode("\n", $outputParts);

        }
        return view("repl",compact('code', 'output'));
    }
}
