<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\TelegramRepository;

class TelegramController extends Controller
{
    function receiveWebhook(Request $request)
    {
        $Telegram = new TelegramRepository();
        if ($request->isJson()) {
            $data = $request->json()->all();
            return $Telegram->parseWebhook($data);
        }

        abort(400);
    }
}
