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
    public function sendTextMessage($chatId,$messageText)
    {
        $telegramUrl = "https://api.telegram.org/bot".$this->telegramToken."/sendMessage";
        $response = Http::get($telegramUrl,[
            "chat_id" => $chatId,
            "text" => $this->messageText,
        ]);
        return $response->successful();
    }
    public function parseWebhook($data){
        if(!isset($data['message'])){
            return "ok";
        }
        $text = $data['message']['text'];
        $chatId = $data['message']['chat']['id'];
        switch($text){
            case "/start":
                $this->sendTextMessage($chatId,"Welcome!");
            break;
            case "/help":
                $this->sendTextMessage($chatId,"Welcome to help!");
            break;
            default:
                $this->sendTextMessage($chatId,PytonRunRepository::runCodeFromText($code) ?? "Something went wrong(");
        }
        return "ok";
    }
}