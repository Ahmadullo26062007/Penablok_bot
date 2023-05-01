<?php


use TelegramBot\Api\BotApi;
use TelegramBot\Api\Client;

require_once __DIR__ . '/vendor/autoload.php';


$botToken = "6196969547:AAGuy11HKRdm6YCeVR6tRTzGbgmrwW8zW9w";

// https://api.telegram.org/bot6196969547:AAGuy11HKRdm6YCeVR6tRTzGbgmrwW8zW9w/setWebhook?url=https://b3f6-185-139-139-217.ap.ngrok.io/Penablok_bot/index.php

/**
 * @var $bot Client | BotApi
 */
$bot = new Client($botToken);


$bot->command('start', static function (\TelegramBot\Api\Types\Message $message) use ($bot) {
    try {
        $chat_id = $message->getChat()->getId();
        $db = mysqli_connect('localhost', 'user', 'password', 'penablok');
        $categories = $db->query("select title from categories")->fetch_all();
        $keyboard = [];

        foreach ($categories as $item) {
            $keyboard[] = [['text' => $item[0]]];
        }
        $markup = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($keyboard, null, true);
        $bot->sendMessage($chat_id, 'МЕНЮДАН УЗИНГИЗГА КЕРАКЛИ БОЛИМНИ ТАНЛАБ МАЛУМОТ ОЛИШИНГИЗ МУМКИН
⬇️⬇️⬇️⬇️⬇️⬇️⬇️⬇️⬇️', "HTML", false, null, null, $markup);

    } catch (Exception $exception) {

    }

});

$bot->callbackQuery(static function (\TelegramBot\Api\Types\CallbackQuery $callbackquery) use ($botToken, $bot) {

});


$bot->on(static function () {
},
    static function (\TelegramBot\Api\Types\Update $update) use ($bot) {
        $db = mysqli_connect('localhost', 'user', 'password', 'penablok');
        $text = $update->getMessage()->getText();
        $chat_id = $update->getMessage()->getChat()->getId();
        $categories = $db->query("select * from categories")->fetch_all();

            $images=$db->query("select * from media")->fetch_all();
            $keyboard=[];
            foreach ($categories as $item){
                $keyboard[]=$item[1];

            }
            if(in_array($text, $keyboard)){
                $image=$db->query("select * from media")->fetch_assoc();
                var_dump($image);
            }
            $bot->sendMessage($chat_id, $text);
    });
try {
    $bot->run();
} catch (\TelegramBot\Api\InvalidJsonException $e) {
}
