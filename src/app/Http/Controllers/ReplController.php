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
            $startTime = null;
            $endTime = null;
        }
        else{
            [$output,$startTime,$endTime] = $this->runPython($code);
        }
        return view("repl",compact('code', 'output'));
    }
    function apiRun(Request $request){
        $code = $request->post('code');
        $result = "err";
        if($code !== null){
            [$result,$startTime,$endTime] = $this->runPython($code);
            $runTime = ($endTime - $startTime);
            return json_encode(compact('result','runTime'));
        }
        return json_encode(compact('result'));
    }
    function runPython($code){
        $pathToPythonTmpDir = __DIR__."/../../../storage/app/tmp/";
        $tmpName = time();
        $tmpFileName = $tmpName .".py";

        file_put_contents($pathToPythonTmpDir.$tmpFileName,$code);

        $makeDirCode = "sshpass -p \"123\" ssh -o StrictHostKeyChecking=no -o UserKnownHostsFile=/dev/null root@sandbox mkdir /app/".$tmpName;
        shell_exec($makeDirCode);
        
        $copyCode = "cd {$pathToPythonTmpDir} ; sshpass -p \"123\" scp -o StrictHostKeyChecking=no -o UserKnownHostsFile=/dev/null {$tmpFileName}  root@sandbox:/app/{$tmpName}/main.py";
        shell_exec($copyCode);

        $sandboxCode = 'sshpass -p "123" ssh -o StrictHostKeyChecking=no -o UserKnownHostsFile=/dev/null root@sandbox docker run -i --network none --rm --name pythonsandbox -v /app/'.$tmpName.':/usr/src/myapp -w /usr/src/myapp python:3 timeout 2s python main.py  2>&1';
        $startTime = microtime(true);
        $output = shell_exec($sandboxCode);
        $endTime = microtime(true);
        $rmCode = "sshpass -p \"123\" ssh -o StrictHostKeyChecking=no -o UserKnownHostsFile=/dev/null root@sandbox rm -R /app/{$tmpName} ";
        shell_exec($rmCode);

        unlink($pathToPythonTmpDir.$tmpFileName);

        $outputParts = explode("\n",$output);
        array_shift($outputParts);
        $output = implode("\n", $outputParts);
        return [$output,$startTime,$endTime];
    }
}
