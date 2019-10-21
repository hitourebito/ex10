<?php
/*---------------------------
	演習10-2 Author:Ishii
 ----------------------------*/
	$errmsg = array();		// エラーメッセージ 
	$nick	="";			// ニックネーム

	// クッキー取得：ニックネーム
	if(isset($_COOKIE["ex10_01"]["nick"]))
	{
		// ニックネーム
		$nick = $_COOKIE["ex10_01"]["nick"];
	}
	else
	{
		// ニックネーム取得エラー
		$errmsg[] = "クッキーがありません";
	}
?>
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