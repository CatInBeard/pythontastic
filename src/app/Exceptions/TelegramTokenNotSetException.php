<?php

namespace App\Exceptions;

use Exception;

class TelegramTokenNotSetException extends Exception
{
    public function report()
    {
        \Log::debug('telegram token not set in .env file');
    }
}
