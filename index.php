<?php
require 'bot.php';
$input = (array) json_decode(file_get_contents('php://input'));
$chatId = $input['message']->chat->id;
$msg = $input['message']->text;
BotClass::sendMsg($chatId,'hey');
BotClass::banUser($chatId,"1073053018");