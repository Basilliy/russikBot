<?php

//$update = file_get_contents($url."/getupdates");
//$result = json_decode($_POST, TRUE);
//$id = $_SERVER["result"][0]["message"]["chat"]["id"];

$output = json_decode(file_get_contents('php://input'), TRUE);
$chat_id = $output['message']['chat']['id'];
$first_name = $output['message']['chat']['first_name'];
print_r('id='.$chat_id);

//////////ВАЖНО /////
$token = "246470400:AAElj-KNd6S9mTyo6wesYzyU8OrquBHQKRA";
$url  = "https://api.telegram.org/bot".$token;
$fuck = file_get_contents('https://evilinsult.com/generate_insult.php?lang=en');
//echo $update;
$update = file_get_contents($url."/sendmessage?chat_id='.$chat_id.'&text=$fuck");