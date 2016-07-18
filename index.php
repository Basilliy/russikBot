<?php
   $access_token = '232279995:AAFMV0TUvJo9VAFvN-O9SRwDYozGRr9RjBM';
   $url = 'https://api.telegram.org/bot' . $access_token;    
   $output = json_decode(file_get_contents('php://input'), true);
   //$lang = json_decode(file_get_contents('php://input'), true);
   $chat_id = $output['message']['chat']['id'];
   //$first_name = $output['message']['chat']['first_name'];
   //$message = $output['message']['text'];  
   //$fp = json_decode(file_get_contents('user.json'), true);   
   //print_r('out=',serialize($output));
   //$fp = json_decode(file_get_contents('user.json'), true);
    sendMessage($chat_id,$message);

function sendMessage($chat_id, $message) {
   file_get_contents($url."/sendMessage?chat_id=".$chat_id."&text=sadfsacsad");
}///Выводяться только с сообщением

?>
