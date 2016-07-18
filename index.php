<?php
   $access_token = '232279995:AAFMV0TUvJo9VAFvN-O9SRwDYozGRr9RjBM';
   $url = 'https://api.telegram.org/bot' . $access_token;    $output = json_decode(file_get_contents('php://input'), true);
   //$lang = json_decode(file_get_contents('php://input'), true);
   $chat_id = $output['message']['chat']['id'];
   $first_name = $output['message']['chat']['first_name'];
   $message = $output['message']['text'];  
   $fp = json_decode(file_get_contents('user.json'), true);   
   print_r('out=',serialize($output));$fp = json_decode(file_get_contents('user.json'), true);
   switch ($message) {
   case '/start':
   $text = 'russik';
      // file_get_contents($url."/sendMessage?chat_id=".$chat_id."&text="$text.inlineKeybord()");
       sendMessage($chat_id,$text.inlineKeybord());
       break;
   case 'Language':
        $message = 'Choose language.';
       sendMessage($chat_id,$message);
       break;
   case 'en':
       $fuck = file_get_contents('https://evilinsult.com/generate_insult.php?lang=de');
       sendMessage($chat_id, $fuck);
       break;
   case 'de':
       $fuck = file_get_contents('https://evilinsult.com/generate_insult.php?lang=en');
       sendMessage($chat_id, $fuck);
       break;
   default:
       sendMessage($chat_id, $fuck);
}
function sendMessage($chat_id, $message) {
   file_get_contents($url."/sendMessage?chat_id=".$chat_id."&text=".$message.inlineKeybord()."&parse_mode=HTML");
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
}

?>
