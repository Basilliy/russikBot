<?php
   $access_token = '246470400:AAElj-KNd6S9mTyo6wesYzyU8OrquBHQKRA';
   $url = 'https://api.telegram.org/bot' . $access_token;   
   $output = json_decode(file_get_contents('php://input'), true);
   //$lang = json_decode(file_get_contents('php://input'), true);
   $chat_id = $output['message']['chat']['id'];
   $first_name = $output['message']['chat']['first_name'];
   $message = $output['message']['text'];  
   $fp = json_decode(file_get_contents('user.json'), true);  
   print_r('out=',serialize($output));
   $fp = json_decode(file_get_contents('user.json'), true);
   sendMessage($chat_id,$text.inlineKeybord());
function sendMessage($chat_id, $message) {
  file_get_contents($url."/sendMessage?chat_id=".$chat_id."&text=".$message."&parse_mode=HTML");
}///Выводяться только с сообщением
function inlineKeybord(){
$reply_markup = '';
$x1 = array('text'=>'en','callback_data'=>"en");
$x2 = array('text'=>'de','callback_data'=>"de");
$opz = [[$x1,$x2]];
$keyboard=array("inline_keyboard"=>$opz);
$keyboard = json_encode($keyboard,true);
$reply_markup = '&reply_markup=' . $keyboard . '';  
return $reply_markup;
}?>
