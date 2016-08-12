<?php
/**
 * Telegram Bot access token и URL.
 */
$access_token = '188192901:AAF2mNLz0rCxe0z_HIc_OhamGo_HIilPEQA';
$url = 'https://api.telegram.org/bot' . $access_token;
$output = json_decode(file_get_contents('php://input'), true);
$chat_id = $output['message']['chat']['id'];
$message = $output['message']['text'];
$fp = json_decode(file_get_contents('user.json'), true);

if(isset($output['inline_query'])){
  $id = $output['inline_query']['from']['id'];
  
  $inline_lang = checkLanguageInline($fp,$id);
 
    $input_context = array(
                           "message_text" => "russik is cool"
                          );
//$fuck = file_get_contents("errors.txt");
    $say = file_get_contents("https://evilinsult.com/generate_insult.php?lang=".$inline_lang);
    $gen = array( "type" => "article",
                  "id" => "2",
                  "title" => "Generate",
                  "input_message_content" => array("message_text"=>$say)
                  );
    $home = array( "type" => "article",
                  "id" => "1",
                  "title" => "Home Page",
                  "input_message_content" => array("message_text"=>'<a href="https://evilinsult.com/">Visit our web site</a>',
                                                    "parse_mode" => "HTML"),
                 
                  );

    $drug = json_encode([$gen,$home]);
    
    file_get_contents("https://api.telegram.org/bot".$access_token."/answerInlineQuery?inline_query_id=".$output['inline_query']['id']."&results=".$drug."&cache_time=1"); 
}

function checkLanguageInline($mass,$chat_id){
    $language = 'en';
    foreach ( $mass as $key=> $value) {
        if($key==$chat_id){
            $language = $value;
        }
    }
    return $language;
}

$botanToken = 'ue7xV8Wl5Q2QgHD7yGWfPApy_WBC1Hp8';
file_get_contents("https://api.botan.io/track?token=".$botanToken."&uid=".$chat_id."&name=search");
file_get_contents("https://api.botan.io/track?token=".$botanToken."&uid=".$chat_id."&name=search%20californication");
file_get_contents("https://api.botan.io/track?token=jX3AS2HlMycbtiALMvAl0aDpOnIwXjXp&uid=".$chat_id."&name=search");
file_get_contents("https://api.botan.io/track?token=jX3AS2HlMycbtiALMvAl0aDpOnIwXjXp&uid=".$chat_id."&name=search%20californication");
function _incomingMessage($output) {
    $messageData = $output['message'];
    $botan = new Botan($this->access_token);
    $botan->track($messageData, 'Start');
}
if(isset($output['callback_query']['data'])){
if (checkUser($fp, $output['callback_query']['message']['chat']['id']) != false) {
            foreach ( $fp as $key=> $value) {
              if($key==$output['callback_query']['message']['chat']['id']){
                 $fp[$key] = $output['callback_query']['data'];
              }
             }
             $arr3 = json_encode($fp);
             file_put_contents('user.json', $arr3);
          }
          else{
           AddUserLanguage($output['callback_query']['message']['chat']['id'],$fp,$output['callback_query']['data']);
          }
file_get_contents("https://api.telegram.org/bot".$access_token."/sendMessage?chat_id=".$output['callback_query']['message']['chat']['id']."&text=Language successfully changed to: ".($output['callback_query']['data'])."&parse_mode=HTML");//exit();
exit();
            
}

$emoji = array(
  'preload' => json_decode('"\ud83d\udc79"')
);
switch ($message) {
    case '/start':
        $message = 'Welcome To The Evil Insult Generator Telegram Bot!'. $emoji['preload'] ;
    sendMessage($chat_id,$message.printKeybord(), $access_token);
        break;
    case 'Language':
         $message = 'Choose language.';
    sendMessage($chat_id,$message.inlineKeybord(), $access_token);
        break;
    case '/language':
         $message = 'Choose language.';
    sendMessage($chat_id,$message.inlineKeybord(), $access_token);
        break;
     case 'Genegate Insult':
        checkLanguage($fp,$chat_id, $access_token);
        break;
    case 'Homepage':
        $message='';
          sendMessage($chat_id,forURL(), $access_token);
        break;
    default:
       checkLanguage($fp, $chat_id, $access_token);
}


function genegateInsult($chat_id,$lang, $asses_token){
    $fuck = file_get_contents("https://evilinsult.com/generate_insult.php?lang=".$lang);
    sendMessage($chat_id, $fuck, $asses_token);
}



function sendMessage($chat_id, $message, $token) {
    file_get_contents("https://api.telegram.org/bot".$token."/sendMessage?chat_id=".$chat_id."&text=".$message.printKeybord()."&parse_mode=HTML");
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




function AddUserLanguage($chat_id,$mass,$message){
    $mass[$chat_id] = $message;
    $arr3 = json_encode($mass);
    file_put_contents('user.json', $arr3);
}





function AddUser($chat_id,$mass,$message, $token){
    $mass[$chat_id] = $message;
    $arr3 = json_encode($mass);
    file_put_contents('user.json', $arr3);
    genegateInsult($chat_id,$message, $token);
}






function checkLanguage($mass,$chat_id, $token){
    $language = 'en';
    foreach ( $mass as $key=> $value) {
        if($key==$chat_id){
            $language = $value;
        }
    }
    genegateInsult($chat_id,$language, $token);
}





function printKeybord(){
        $reply_markup = '';
    $buttons = [['Generate Insult'],['Language','Homepage']];
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
function inlineKeybord(){ //create a text description that will be passed to the server
$reply_markup = '';
$x1 = array('text'=>'en','callback_data'=>"en");
$x2 = array('text'=>'de','callback_data'=>"de");
$x3 = array('text'=>'ru','callback_data'=>"ru");
$x4 = array('text'=>'fr','callback_data'=>"fr");
$x5 = array('text'=>'es','callback_data'=>"es");
$x6 = array('text'=>'pt','callback_data'=>"pt");
$x7 = array('text'=>'cn','callback_data'=>"cn");
$x8 = array('text'=>'sw','callback_data'=>"sw");
//You should create a new variable $xn(next6 number), and you should describe about it in the field "text" and add "callback_data", 
//which will return to the server
///Displays only message
$opz = [[$x1,$x2,$x3,$x4],[$x5,$x6,$x7,$x8]];
$keyboard=array("inline_keyboard"=>$opz);
$keyboard = json_encode($keyboard,true);
     $reply_markup = '&reply_markup=' . $keyboard;
    return $reply_markup;
}
function forURL(){
    $HTML='<a href="https://evilinsult.com/">http://evilinsult.com/</a>';
    return $HTML;
}

