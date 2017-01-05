<h2>Average everyday kicin</h2>
<?php
error_reporting(E_ALL);
// username avgkicin_bot | Average Everyday Kicin
$botToken = "insert your token here";
$telegram = 'https://api.telegram.org/bot'.$botToken;
$update = file_get_contents($telegram."/getupdates");

$update = json_decode($update, TRUE);

$chat_id = $update['result'][0]['message']['chat']['id'];
$msg = $update['result'][count($update['result'][0]['message'])]['message']['text'];


echo $msg;


switch($msg){
	case "/selam":
		answer($telegram, $chat_id, "alejkumu selam");
		break;
	case "slm":
		answer($telegram, $chat_id, "wslm");
		break;
		
	case "selam":
		answer($telegram, $chat_id, "alejkumu selam selamdžija");
		break;
	default:
		answer($telegram, $chat_id, "Nisam te skonto braca");
}

function answer($telegram, $cID, $msg){
	$url = $telegram."/sendMessage?chat_id=".$cID."&text=".urlencode($msg);
	file_get_contents($url);
}
?>

