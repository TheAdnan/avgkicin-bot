<h2>Average everyday kicin</h2>
<?php
error_reporting(E_ALL);
// username avgkicin_bot | Average Everyday Kicin
$botToken = "insert your token here";
$telegram = 'https://api.telegram.org/bot'.$botToken;

$last_update = 0;

while (true) {
	$update = file_get_contents($telegram."/getupdates?timeout=30&offset=".$last_update);
	$update = json_decode($update, TRUE);

foreach($update["result"] as $key => $value){
	 if ($last_update<$value['update_id']){
		 
		$last_update = $value['update_id'];
        $chat_id= $value["message"]["chat"]["id"];
		$msg = $value["message"]["text"];
		// Message processing
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
			case "šta ima?":
				answer($telegram, $chat_id, "ništa značajno");
				break;
			case "kakav si mi?":
				answer($telegram, $chat_id, "drama");
				break;
			default:
				answer($telegram, $chat_id, "Nisam te skonto bruda");
		}
	 }
	}
}

function answer($telegram, $cID, $msg){
	$url = $telegram."/sendMessage?chat_id=".$cID."&text=".urlencode($msg);
	file_get_contents($url);
}
?>
