<?php

namespace App\Interfaces;

interface PytonRunRepositoryInterface
{
    public static function run(string $code): string;
    public static function runCodeFromText(string $code,int $timeLimitSeconds = 2,bool $blockNetwork = true): array;
}
