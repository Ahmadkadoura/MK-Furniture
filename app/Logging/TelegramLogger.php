<?php

namespace App\Logging;


use Monolog\Logger;
use Monolog\Handler\AbstractProcessingHandler;
use GuzzleHttp\Client;

class TelegramLogger extends AbstractProcessingHandler
{
protected function write(array|\Monolog\LogRecord $record): void
{
$message = $record['formatted'];
$client = new Client();
$url = 'https://api.telegram.org/bot'.env('TELEGRAM_BOT_TOKEN').'/sendMessage';

$client->post($url, [
'form_params' => [
'chat_id' => env('TELEGRAM_CHAT_ID'),
'text' => $message,
]
]);
}
}
