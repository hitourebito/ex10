<?php
/*-------------------------
	演習10-5 Author:Ishii
 --------------------------*/
	$yuko	= 30 * 24 * 60 * 60;	// 有効期限：一ヶ月
	$errmsg	= array();				// エラーメッセージ 
	$pflg	= 0;					// POSTフラグ

	//===== ポスト：リクエスト時の訪問情報処理  =====
	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$pflg = 1;
		// HTML特殊文字変換
		$id = htmlspecialchars($_POST["id"], ENT_QUOTES);
		// 入力チェック 
		if(!strlen($id))
		{
			$errmsg[] = "ID が入力されていません";
		}
		else
		{
			//--- メッセージ設定と「最終訪問ＩＤ」のクッキー保存  ---
			$time = time();
			// クッキー保存：「最終訪問ＩＤ」
			setcookie("ex10_05[last_id]", $id, $time + $yuko);
			// タイムｚ－ン設定（日本）、日時取得		
			date_default_timezone_set('Asia/Tokyo');
			// メッセージ設定：ＩＤ、訪問日時
			$msg = "${id}さん、こんにちは<br/>".date("Y年n月j日(D) H時i分 ", $time);
			//--- メッセージ追加：訪問回数、前回訪問日時  ---
			// クッキー取得：「訪問ＩＤ」
			if (isset($_COOKIE["ex10_05"]["guest"][$id]))
			{
				// メッセージ追加：訪問回数（カウントアップ・前回訪問回数＋１）
				$count = $_COOKIE["ex10_05"]["guest"][$id]["count"] + 1;
				$msg .= $count . "回目の訪問です<br />";
				// メッセージ追加：前回訪問日時
				$msg .= date("前回の訪問は、Y年n月j日(D) H時i分でした", $_COOKIE["ex10_05"]["guest"][$id]["time"]);
			}
			else
			{
				// メッセージ追加：初回訪問
				$msg .= "初めての訪問です";
				// 訪問回数：１（初回）
				$count = 1;
			}
			//--- クッキー保存：「"guest"」・「訪問ＩＤ」・「訪問回数」・「訪問日時」 ---
			// ※"guest"：訪問者のデータ種別を表す。
			//            訪問者IDに "last_id"（最終訪問者のキー名）を入力しても
			//            誤動作しないようにするため！
			//----------------------------------------------------------------------------
			// 「訪問ＩＤ」・「訪問回数」
			setcookie("ex10_05[guest][$id][count]", $count, $time + $yuko);
			// 「訪問ＩＤ」・「訪問日時」
			setcookie("ex10_05[guest][$id][time]", $time, $time + $yuko);
		}
	}
	//===== 初期（GET）：リクエスト時の初期Ｉ処理 =====
	else
	{
		//--- 初期ＩＤ設定  ---
		if( isset($_COOKIE["ex10_05"]["last_id"]) )
		{
			// ＩＤ <-- クッキー取得：「最終訪問ＩＤ」
			$id = $_COOKIE["ex10_05"]["last_id"];
		}
		else
		{
			// ＩＤ <-- 未入力
			$id = "";
		}
	}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>ex10_05.php</title>
<style>
<!--
	#err	{color:red;}
-->
</style>
</head>
<body>
<h1>前回訪問日時表示(複数ユーザ)</h1>
<div id="err">
<?php
	// エラーメッセージ表示
	foreach($errmsg as $val)
	{
		echo $val, "<br />";
	}
?>
</div>
<?php
	// 訪問日時・訪問回数、前回訪問日時の表示
	if(!count($errmsg) && $pflg)
	{
		echo $msg;
	}
	else
	{
?>
<form action='<?= $_SERVER["SCRIPT_NAME"] ?>' method="post">
	<div>
		ＩＤ：<input type="text" name="id" value="<?= $id ?>" size="10" />
		<br /><br />
		<input type="submit" name="btn" value="送信" />
	</div>
</form>
<?php
	}
?>
</body>
</html>
