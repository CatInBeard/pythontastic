<?php

namespace App\Repositories;

use App\Interfaces\PytonRunRepositoryInterface;

class PytonRunRepository implements PytonRunRepositoryInterface 
{
    public static function run(string $code): string
    {
        return self::runCodeFromText($code)['output'];
    }
    public static function runCodeFromText(string $code,int $timeLimitSeconds = 2,bool $blockNetwork = true): array
    {
        $pathToPythonTmpDir = __DIR__."/../../storage/app/tmp/";
        $tmpName = time();
        $tmpFileName = $tmpName .".py";

        file_put_contents($pathToPythonTmpDir.$tmpFileName,$code);

        $makeDirCode = "sshpass -p \"123\" ssh -o StrictHostKeyChecking=no -o UserKnownHostsFile=/dev/null root@sandbox mkdir /app/".$tmpName;
        shell_exec($makeDirCode);
        
        $copyCode = "cd {$pathToPythonTmpDir} ; sshpass -p \"123\" scp -o StrictHostKeyChecking=no -o UserKnownHostsFile=/dev/null {$tmpFileName}  root@sandbox:/app/{$tmpName}/main.py";
        shell_exec($copyCode);

        $network = $blockNetwork ? "--network none" : "";
        $sandboxCode = 'sshpass -p "123" ssh -o StrictHostKeyChecking=no -o UserKnownHostsFile=/dev/null root@sandbox docker run -i '.$network.' --rm --name pythonsandbox -v /app/'.$tmpName.':/usr/src/myapp -w /usr/src/myapp python:3 timeout '.$timeLimitSeconds.'s python main.py 2>&1';
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
