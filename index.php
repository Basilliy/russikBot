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

if($message == '/help'){
    $reply_markup = '';
//    $buttons = [[['text' => 'tekst',
//        'request_contact' => true ,
//        'request_location' => false ]]];
    // $buttons = ['refrefre' , 'erfre ' , 'erferf'];
    //'request_contact' => true]]];
    $buttons = [['10','23','23'],['10','23','23']];
    $keyboard = json_encode($keyboard = [
        'keyboard' => $buttons /*[$buttons]*/,
        'resize_keyboard' => true,
        'one_time_keyboard' => true,
        'parse_mode' => 'HTML',
        'selective' => true
    ]);
    $reply_markup = '&reply_markup=' . $keyboard . '';
    $message = '121';
    sendMessage($chat_id, $message.$reply_markup);
}
else{

    $fuck = file_get_contents('https://evilinsult.com/generate_insult.php?lang=en');
//echo $update;
    $update = file_get_contents($url."/sendmessage?chat_id=".$chat_id."&text=$fuck");

    sendMessage($chat_id, $fuck);


}
function sendMessage($chat_id, $message) {
    // http://web-performers.com/bot/chatbot/conversation_start.php?say=2
    file_get_contents("https://api.telegram.org/bot229793781:AAG4aCD-fGPtUoxHXUO3TOlx9zR2ZTfJxrM/sendMessage?chat_id=".$chat_id."&text=".$message."&parse_mode=HTML");
}