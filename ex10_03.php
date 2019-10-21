

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