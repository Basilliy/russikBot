<?php

/**
 * Telegram Bot access token и URL.
 */
$access_token = '246470400:AAElj-KNd6S9mTyo6wesYzyU8OrquBHQKRA';
$url = 'https://api.telegram.org/bot' . $access_token;

$output = json_decode(file_get_contents('php://input'), true);
$chat_id = $output['message']['chat']['id'];
//$first_name = $output['message']['chat']['first_name'];
$message = $output['message']['text'];

$fp = json_decode(file_get_contents('user.json'),true);
print_r( $fp);

if($message == '/start'){
    $reply_markup = '';
//    $buttons = [[['text' => 'tekst',
//        'request_contact' => true ,
//        'request_location' => false ]]];
    // $buttons = ['refrefre' , 'erfre ' , 'erferf'];
    //'request_contact' => true]]];
    $buttons = [['en'],['de']];
    $keyboard = json_encode($keyboard = [
        'keyboard' => $buttons /*[$buttons]*/,
        'resize_keyboard' => true,
        'one_time_keyboard' => true,
        'parse_mode' => 'HTML',
        'selective' => true
    ]);
    $reply_markup = '&reply_markup=' . $keyboard . '';
    $message = 'language';
    sendMessage($chat_id, $message.$reply_markup);
}

else {

    $fp = json_decode(file_get_contents('user.json'), true);
    if (checkUser($fp, $chat_id) == false) {
        AddUser($chat_id,$fp,$message);
    }
    else{
        checkLanguage($fp, $chat_id);
        $fuck = file_get_contents('https://evilinsult.com/generate_insult.php?lang=en');
        sendMessage($chat_id, $fuck);
    }

}

function sendMessage($chat_id, $message) {
    // http://web-performers.com/bot/chatbot/conversation_start.php?say=2
    file_get_contents("https://api.telegram.org/bot246470400:AAElj-KNd6S9mTyo6wesYzyU8OrquBHQKRA/sendMessage?chat_id=".$chat_id."&text=".$message."&parse_mode=HTML");



}
function checkUser($mass,$chat_id){
 $is = false;
    foreach ( $mass as $key=> $value) {
       if($key==$chat_id){
        $is = true;
       }
    }  
return $is;
}
function AddUser($user_id,$mass,$message){
    $mass[$user_id] = $message;
    $arr3 = json_encode($mass);
    file_put_contents('user.json', $arr3);
    $fuck = file_get_contents('https://evilinsult.com/generate_insult.php?lang=en');
    sendMessage($user_id, $fuck);
}
function checkLanguage($mass,$chat_id){
    $language = 'de';
    foreach ( $mass as $key=> $value) {
        if($key==$chat_id){
            $language = $value;
        }
    }

    if($language =='en'){
        $fuck = file_get_contents('https://evilinsult.com/generate_insult.php?lang=en');
        sendMessage($chat_id, $fuck);
    }
    if($language =='de'){
        $fuck = file_get_contents('https://evilinsult.com/generate_insult.php?lang=de');
        sendMessage($chat_id, $fuck);
    }
}
