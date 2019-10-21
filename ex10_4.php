<?php
/*----------------------------
	演習10-4 Author:Ishii
 -----------------------------*/
	$errmsg		= array();		// エラーメッセージ 
	$pflg		= 0;			// POSTフラグ
	$id			= "";			// 「訪問ＩＤ」
	$old_id		= "";			// 前回「訪問ＩＤ」
	$old_time	= "";			// 前回「訪問日時」
	$msg		= "";			// 処理結果メッセージ
	
	// クッキ取得：「ＩＤ」、「訪問日時」		
	if(isset($_COOKIE["ex10_04"]["id"]) && isset($_COOKIE["ex10_04"]["time"]))
	{
		// 「ＩＤ」、「訪問日時」
		$id = $old_id = $_COOKIE["ex10_04"]["id"];
		$old_time = $_COOKIE["ex10_04"]["time"];
	}

	//===== ポスト：リクエスト処理  =====
	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$pflg = 1;
		// HTML特殊文字変換
		$id = htmlspecialchars($_POST["id"], ENT_QUOTES);
		// 入力ＩＤチェック
		if(!strlen($id))
		{
			$errmsg[] = "IDが入力されていません";
		}
		else
		{
			// クッキ保存：「ＩＤ」、「訪問日時」
			setcookie("ex10_04[id]", $id, time()+ 30 * 24 * 60 * 60);
			setcookie("ex10_04[time]", time(), time()+ 30 * 24 * 60 * 60);
			// 訪問ＩＤチェック：入力ＩＤ == クッキーＩＤ
			if($id === $old_id)
			{
				// タイムゾーン設定：日本		
				date_default_timezone_set('Asia/Tokyo');
				// メッセージ：前回訪問日時		
				$msg = date("前回訪問日時:Y/m/d H:i:s", $old_time);
			}
		}
	}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>ex10_04.php</title>
<style>
<!--
	#err	{color:red;}
-->
</style>
</head>
<body>
<h1>前回訪問日時表示</h1>
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
	if(!count($errmsg) && $pflg)
	{
		echo $id, "さん、こんにちは<br />";
		echo $msg;
	}
	else
	{
?>
<form action="<?= $_SERVER["SCRIPT_NAME"] ?>" method="post">
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