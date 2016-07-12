<?php
function regHandler($token)
{
    $url = "https://api.telegram.org/bot" . $token . "/setWebhook";
    $ch = curl_init();
    $optArray = array(
        CURLOPT_URL => $url,
        CURLOPT_POST => true,
        CURLOPT_SAFE_UPLOAD => false,
        CURLOPT_RETURNTRANSFER => true,
    );
    curl_setopt_array($ch, $optArray);

    $result = curl_exec($ch);
    echo "<pre>";
    print_r($result);
    echo "</pre>";
    curl_close($ch);
}

$token = '246470400:AAElj-KNd6S9mTyo6wesYzyU8OrquBHQKRA';
$path = '/ssl/YOURPUBLIC.pem';
$handlerurl = 'https://russikbot.herokuapp.com/index.php'; // ИЗМЕНИТЕ ССЫЛКУ

regHandler($token);






//$update = file_get_contents($url."/getupdates");
//$result = json_decode($_POST, TRUE);
//$id = $_SERVER["result"][0]["message"]["chat"]["id"];
$com = file_get_contents('php://input');
$output = json_decode(file_get_contents('php://input'), TRUE);
$chat_id = $output['message']['chat']['id'];
$res = serialize($_POST['Update']);
$res1 = serialize($_GET);
$res2 = serialize($com);
print_r($res);
print_r($res1);
print_r($res2);
//////////ВАЖНО /////
$token = "246470400:AAElj-KNd6S9mTyo6wesYzyU8OrquBHQKRA";
$url  = "https://api.telegram.org/bot" . $token;
$fuck = file_get_contents('https://evilinsult.com/generate_insult.php?lang=en');
//echo $update;
$update = file_get_contents($url."/sendmessage?chat_id='.$chat_id.'&text=".$fuck);