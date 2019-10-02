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
