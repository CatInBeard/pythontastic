<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\TelegramRepository;

class TelegramController extends Controller
{
    function receiveWebhook(Request $request)
    {
        $telegramSecret = $request->header('X-Telegram-Bot-Api-Secret-Token');

        if($telegramSecret != config('app.telegram_bot_secret_token')){
            abort(403);
        }

        $Telegram = new TelegramRepository();
        if ($request->isJson()) {
            $data = $request->json()->all();
            return $Telegram->parseWebhook($data);
        }

        abort(400);
    }
}
