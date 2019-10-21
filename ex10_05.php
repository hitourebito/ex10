

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
