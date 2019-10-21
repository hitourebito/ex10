<?php
/*----------------------------
	演習10-3 Author:Ishii
 -----------------------------*/
	$errmsg = array();			// エラーメッセージ 

	// クッキー取得：訪問回数			
	if(isset($_COOKIE["ex10_03"]["count"]))
	{
		// 訪問回数：カウントアップ			
		$count = $_COOKIE["ex10_03"]["count"] + 1;
	}
	else
	{
		// 訪問回数：初期値			
		$count = 1;
	}
	// クッキ保存：訪問回数
	setcookie('ex10_03[count]', $count, time() + 30 * 24 * 60 * 60);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>ex10_03.php</title>
<style>
<!--
	#err	{color:red;}
-->
</style>
</head>
<body>
<h1>訪問回数表示</h1>
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
	if(!count($errmsg))
	{
		echo "{$count}回目の訪問です";
	}
?>
</body>
</html>