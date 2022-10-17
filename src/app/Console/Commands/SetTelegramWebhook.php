<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Repositories\TelegramRepository;

class SetTelegramWebhook extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'telegram:setWebhook';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Set telegram webhooks';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {   
        $Telegram = new TelegramRepository();
        $response = $Telegram->setWebhook();
        if($response){
            echo "Webhook set to " . $response;
        }
        else{
            echo "Webhook was not set!";
        }
        return 0;
    }
}
