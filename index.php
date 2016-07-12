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

	function sendMessage($chat_id, $message)
    {
        file_get_contents($GLOBALS['api'] . '/sendMessage?chat_id=' . $chat_id . '&text=' . urlencode($message));
    }

	$access_token = 'YOUR TOKEN';
	$api = 'https://api.telegram.org/bot' . $access_token;


	$output = json_decode(file_get_contents('php://input'), TRUE);
	$chat_id = $output['message']['chat']['id'];
	$first_name = $output['message']['chat']['first_name'];
	$message = $output['message']['text'];

	$preload_text = $first_name . ', я получила ваше сообщение!';
	sendMessage($chat_id, $preload_text);
?>