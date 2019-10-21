<?php 
  $errmsg = array();

  if ($_SERVER["REQUEST_METHOD"] == "POST") 
  {
    $nick = htmlspecialchars($_POST["nick"], ENT_QUOTES);

    if (!strlen($nick)) 
    {
      $errmsg[] = "ニックネームが入力されていません";
    }
    else
    {
      setcookie("ex10_01[nick]", $nick, time() + 3 * 60);
    }
  }
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>ex10_01.php</title>
<style>
</style>
</head>
<body>
  <h1>クッキー保存</h1>
  <div id="err">
<?php
    // エラーメッセージ表示
    foreach($errmsg as $val)
    {
      echo $val, "<br />";
    }
?>
<?php
    if(!count($errmsg))
    {
      echo "ニックネームを保存しました";
    }
?>
  </div>
</body>
</html>