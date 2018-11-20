<?php
  $dbhost="127.0.0.1"; $dbuser="28882678_junior1995"; $dbpassword="******"; $dbname="28882678_junior1995";
$polaczenie = mysqli_connect ($dbhost, $dbuser, $dbpassword);
mysqli_select_db ($polaczenie, $dbname);
$idp = $_COOKIE['nr1'];
$login=$_COOKIE['login'];
$haslo=$_COOKIE['haslo'];
setcookie('nr2', $idp, time()+3000);
$licznik=0; //jezeli nie wzroscnie to nie jest zalogowany
$logowanie = mysqli_query ($polaczenie, "SELECT `login`,`haslo` FROM `z6pracownik` WHERE `login`!='' AND `haslo`!=''");
while ($wierszl = mysqli_fetch_array ($logowanie)){
  $log=$wierszl[0];
  $pas=$wierszl[1];
  if($login==$log&&$haslo==$pas){
      $licznik++;
  }
  }

  if($licznik==0){
     header("Location: usuncookie.php");
      
  }
  ?>
  <form method="POST" action="gotodp.php" >
<br>

Wiadomosc:<input type="text" name="post" maxlength="250" size="90"><br>

<input type="submit" value="odpowiedz"/>
</form>