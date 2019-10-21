<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>ex10_02.php</title>
<style>
<!--
	#err	{color:red;}
-->
</style>
</head>
<body>
<h1>クッキー取得</h1>
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
		echo "${nick}さん、ようこそ！";
	}
?>
</body>
</html>