<?php

Class BotClass
{
    public static $token = "6715176568:AAH6XEMv3uCsMgqk3ZZ5myosk-RS0LYLl_M";


    private  static function maniMethod($method, $params)
    {
        $url = "https://api.telegram.org/bot".self::$token;
        $ch = curl_init($url . "/".$method);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, ($params));
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $result = curl_exec($ch);
        curl_close($ch);
    }

    public static function sendMsg($chatId, $msg, $keyboard = [])
    {
        $params = [
            'chat_id' => $chatId,
            'text' => $msg,
            'parse_mode' => 'html',
            'reply_markup' => json_encode([
                'keyboard' => $keyboard,
                'resize_keyboard' => true,
                'one_time_keyboard' => true
            ])
        ];
        self::maniMethod('sendMessage',$params);

    }

    static function banUser($chatId,$userId){
        $params = [
            'chat_id' => $chatId,
            'user_id' => $userId
        ];
        self::maniMethod('banChatMember',$params);
    }

}





?>