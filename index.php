<?php
/**
 * Telegram Bot access token и URL.
 */
$access_token = '246470400:AAElj-KNd6S9mTyo6wesYzyU8OrquBHQKRA';
$url = 'https://api.telegram.org/bot' . $access_token;

$output = json_decode(file_get_contents('php://input'), true);

$chat_id = $output['message']['chat']['id'];
$message = $output['message']['text'];

$fp = json_decode(file_get_contents('user.json'), true);

//if($message == '/start'){
//    $message = 'Hello, i am Marvin bot.';
//    sendMessage($chat_id,$message.printKeybord());
//    
//}

//else{

//if($message == 'en'){
//   if (checkUser($fp, $chat_id) != false) {
//     foreach ( $fp as $key=> $value) {
 //          if($key==$chat_id){
 //               $fp[$key] = $message;
//            }
//        }
//    $arr3 = json_encode($fp);
//    file_put_contents('user.json', $arr3);
//    english($chat_id);
//    }
 //  else{
 //      AddUser($chat_id,$fp,$message);
//    }

    
    
//}
//else{
//if($message == 'de'){
//    if (checkUser($fp, $chat_id) != false) {
//     foreach ( $fp as $key=> $value) {
//          if($key==$chat_id){
//                $fp[$key] = $message;
//            }
//        }
//   $arr3 = json_encode($fp);
//    file_put_contents('user.json', $arr3);
//       deutch($chat_id);
//    }
//   else{
//       AddUser($chat_id,$fp,$message);
//    }
 
//}
//else{
   // $fp = json_decode(file_get_contents('user.json'), true);
//    checkLanguage($fp, $chat_id);
//}
//}
//}

switch ($message) {
    case '/start':
    $message = 'Hello, i am Marvin bot.';
    sendMessage($chat_id,$message.printKeybord());
        break;
    case 'Language':
         $message = 'Choose language.';
    sendMessage($chat_id,$message.inlineKeybord());
        break;
    case 'Genrrate Insult':
        echo "i равно 2";
        break;
    case 'Homepage':
        echo "i равно 2";
        break;
    case 'en':
         if (checkUser($fp, $chat_id) != false) {
            foreach ( $fp as $key=> $value) {
              if($key==$chat_id){
                 $fp[$key] = $message;
              }
             }
             $arr3 = json_encode($fp);
             file_put_contents('user.json', $arr3);
             english($chat_id);
          }
          else{
            AddUser($chat_id,$fp,$message);
          }
        break;
    case 'de':
        if (checkUser($fp, $chat_id) != false) {
          foreach ( $fp as $key=> $value) {
           if($key==$chat_id){
                $fp[$key] = $message;
            }
        }
         $arr3 = json_encode($fp);
         file_put_contents('user.json', $arr3);
         deutch($chat_id);
        }
        else{
          AddUser($chat_id,$fp,$message);
        }
         break;
          default:
       echo "i не равно 0, 1 или 2";
}


function deutch($chat_id){
    $fuck = file_get_contents('https://evilinsult.com/generate_insult.php?lang=de');
    sendMessage($chat_id, $fuck);
}
function english($chat_id){
    $fuck = file_get_contents('https://evilinsult.com/generate_insult.php?lang=en');
    sendMessage($chat_id, $fuck);
}
function sendMessage($chat_id, $message) {
    // http://web-performers.com/bot/chatbot/conversation_start.php?say=2
    file_get_contents("https://api.telegram.org/bot246470400:AAElj-KNd6S9mTyo6wesYzyU8OrquBHQKRA/sendMessage?chat_id=".$chat_id."&text=".$message.printKeybord()."&parse_mode=HTML");
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
function AddUser($chat_id,$mass,$message){
    $mass[$chat_id] = $message;
    $arr3 = json_encode($mass);
    file_put_contents('user.json', $arr3);
    if($message =='en'){
        english($chat_id);
    }
    if($message =='de'){
        deutch($chat_id);
    }
}
function checkLanguage($mass,$chat_id){
    $language = 'de';
    foreach ( $mass as $key=> $value) {
        if($key==$chat_id){
            $language = $value;
        }
    }
    if($language =='en'){
        english($chat_id);
    }
    if($language =='de'){
        deutch($chat_id);
    }
}
function printKeybord(){
        $reply_markup = '';
//    $buttons = [[['text' => 'tekst',
//        'request_contact' => true ,
//        'request_location' => false ]]];
    // $buttons = ['refrefre' , 'erfre ' , 'erferf'];
    //'request_contact' => true]]];
    $buttons = [['Genrrate Insult'],['Language','Homepage']];
    $keyboard = json_encode($keyboard = [
        'keyboard' => $buttons /*[$buttons]*/,
        'resize_keyboard' => true,
        'one_time_keyboard' => false,
        'parse_mode' => 'HTML',
        'selective' => true
    ]);
    $reply_markup = '&reply_markup=' . $keyboard . '';
    
    return $reply_markup;
}
function inlineKeybord(){ ///Выводяться только с пыстым сообщением
$reply_markup = '';
$x1 = array("text"=>"en","callback_data"=>"en");
$x2 = array("text"=>"de","callback_data"=>"de");
$x3 = array("text"=>"ru","callback_data"=>"ru");
$x4 = array("text"=>"fr","callback_data"=>"fr");
$opz = [[$x1,$x2,$x3,$x4]];
$keyboard=array("inline_keyboard"=>$opz);
$keyboard = json_encode($keyboard);
     $reply_markup = '&reply_markup=' . $keyboard . '';
    return $reply_markup;
}
