

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