<?php

namespace App\Repositories;

use App\Http\Controllers\ReplController;
use App\Exceptions\TelegramTokenNotSetException;
use App\Repositories\PytonRunRepository;
use Illuminate\Support\Facades\Http;

class TelegramRepository{
    
    private $telegramToken;
    private $telegramSecretToken; 

    public function __construct()
    {
        $this->telegramToken = config('app.telegram_bot_token');
        if(!$this->telegramToken){
            throw new TelegramTokenNotSetException("Telegram bot token not set");
        }
        $this->telegramSecretToken = config('app.telegram_bot_secret_token');
        if(!$this->telegramSecretToken){
            throw new TelegramTokenNotSetException("Telegram secret token not set");
        }
    }

    public function setWebhook()
    {
        $webhook_url = route("api.telegram.webhook");
        $telegramUrl = "https://api.telegram.org/bot".$this->telegramToken."/setWebhook";
        $response = Http::get($telegramUrl,[
            "url" => $webhook_url,
            "secret_token" => $this->telegramSecretToken,
        ]);
        return $response->successful() ? $webhook_url : false;
    }
    public function sendTextMessage($chatId,$messageText, $reply = false)
    {
        $telegramUrl = "https://api.telegram.org/bot".$this->telegramToken."/sendMessage";

        $data = [
            "chat_id" => $chatId,
            "text" => $messageText,
        ];

        if($reply){
            $data['reply_to_message_id'] = $reply;
        }

        $response = Http::get($telegramUrl,$data);
        return $response->successful();
    }
    public function parseWebhook($data){
        if(!isset($data['message'])){
            return "ok";
        }
        $messageText = $data['message']['text'];
        $messageID = $data['message']['message_id'];
        $chatId = $data['message']['chat']['id'];
        switch($messageText){
            case "/start":
                $this->sendTextMessage($chatId,"Welcome! Send Me your python code, and I'll run it...");
            break;
            case "/help":
                $this->sendTextMessage($chatId,"Just send Me your python code. For example send \"print(1)\"");
            break;
            default:
                [$result,$startTime,$endTime] = PytonRunRepository::runCodeFromText($messageText);
                $this->sendTextMessage($chatId, $result ?? "Something went wrong(",$messageID);
        }
        return "ok";
    }
}