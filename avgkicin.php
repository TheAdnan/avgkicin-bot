<?php
// username avgkicin_bot | Average Everyday Kicin
$botToken = "your bot token";
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
		$sticker = $value["message"]["sticker"]["file_id"];
		if(isset($sticker)){
			answerSticker($telegram, $chat_id);
			$msg = "ex";
		}
		$msg = strtolower($msg);
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
			case "kako si?":
				answer($telegram, $chat_id, "drama");
				break;
			case "bracika":
				answer($telegram, $chat_id, "berbruda");
				break;
			case "hi":
			case "hello":
				answer($telegram, $chat_id, "Hi there");
				break;
			case "how are you?":
				answer($telegram, $chat_id, "I'd rather know how you are.");
				break;
			case "who are you?":
				answer($telegram, $chat_id, "I can't answer that. What about you?");
				break;
			case "why won't you answer my questions?":
				answer($telegram, $chat_id, "Did you expect something different?");
				break;
			case "this is exciting":
				answer($telegram, $chat_id, "I think it's pretty fun too.");
				break;
			case "bonjour":
			case "salut":
				answer($telegram, $chat_id, "Salut!");
				break;
			case "pouvez-vous parler français?":
				answer($telegram, $chat_id, "Pourquoi pas?");
				break;
			case "ex":
				break;
			case "/film":
				getMovie($telegram, $chat_id);
				break;
			case "/tvshow":
				getTVShow($telegram, $chat_id);
				break;
			case "/start":
				intro($telegram, $chat_id);
				break;
			default:
				RandomAnswer($telegram, $chat_id);
		}
		
	 }
	}
}

function answerSticker($telegram, $cID){
	$msg = file("files/stickers.txt");
	$msg = $msg[mt_rand(0, count($msg) - 1)];
	$url = $telegram."/sendSticker?chat_id=".$cID."&sticker=".$msg;
	file_get_contents($url);
}

function answer($telegram, $cID, $msg){
	$url = $telegram."/sendMessage?chat_id=".$cID."&text=".urlencode($msg);
	file_get_contents($url);
}

function getMovie($telegram, $chat_id){
	$movie = file("files/film.csv");
	$msg = $movie[mt_rand(0, count($movie) - 1)];
	answer($telegram, $chat_id, $msg);
}

function getTVShow($telegram, $chat_id){
	$tv = file("files/cucirca.txt");
	$msg = $tv[mt_rand(0, count($tv) - 1)];
	answer($telegram, $chat_id, $msg);
}

function RandomAnswer($telegram, $chat_id){
	$tv = file("files/odg.txt");
	$msg = $tv[mt_rand(0, count($tv) - 1)];
	answer($telegram, $chat_id, $msg);
}

function intro($telegram, $chat_id){
	$msg = "Haj bujrum, ne moraš se izuvat\n";
	answer($telegram, $chat_id, $msg);
}
function start_bot(){
	echo "started!";
}
?>
