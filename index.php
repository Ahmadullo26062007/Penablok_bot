<?php


use TelegramBot\Api\BotApi;
use TelegramBot\Api\Client;

require_once __DIR__ . '/vendor/autoload.php';


$botToken = "6196969547:AAGuy11HKRdm6YCeVR6tRTzGbgmrwW8zW9w";

// https://api.telegram.org/bot6196969547:AAGuy11HKRdm6YCeVR6tRTzGbgmrwW8zW9w/setWebhook?url=https://fc6a-185-139-139-249.ap.ngrok.io/Penablok_bot/index.php

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
            $keyboard[]=[['text'=> $item ]];
            var_dump($item);
        }
        $markup = new \TelegramBot\Api\Types\ReplyKeyboardMarkup($keyboard, null, true);
        $bot->sendMessage($chat_id, 'salom', "HTML", false, null, null, $markup);

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
        $raqam = 'Raqamni yuborish';
        if (in_array($text)) {
            $user_bormi = $db->query("select chat_id from bot where chat_id = '$chat_id'")->num_rows;
            if ($user_bormi == 0) {
                $db->query("insert into bot (chat_id) values ('$chat_id')");
            }
            $raqam_bormi = $db->query("select phone_number from bot where chat_id = '$chat_id'")->fetch_assoc();
            if ($raqam_bormi['phone_number'] == null) {
                $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup([[['text' => "📞 Raqamni yuborish", 'request_contact' => true]]], true, true);
                $bot->sendMessage($chat_id, '📞 Raqamni yuborish', null, false, null, $keyboard);

            }
        } else {
            $keyboard = new \TelegramBot\Api\Types\ReplyKeyboardMarkup([
                [['text' => 'sd']]
            ], true, true);

            $bot->sendMessage($chat_id, "Menu", null, false, null, $keyboard);


        }

    });
try {
    $bot->run();
} catch (\TelegramBot\Api\InvalidJsonException $e) {
}
