<?php
  $dbhost="127.0.0.1"; $dbuser="28882678_junior1995"; $dbpassword="sY2gFZqBn"; $dbname="28882678_junior1995";
$polaczenie = mysqli_connect ($dbhost, $dbuser, $dbpassword);
mysqli_select_db ($polaczenie, $dbname);
$wiadomosc = $_POST['post'];
if($wiadomosc==''){
     header("Location: pusta1.php"); }else{
$wybor = $_POST['pytanie'];
$login=$_COOKIE['login'];
$haslo=$_COOKIE['haslo'];
$idklienta1=$_COOKIE['idklienta'];
$licznik=0; //jezeli nie wzroscnie to nie jest zalogowany
$logowanie = mysqli_query ($polaczenie, "SELECT `login`,`haslo` FROM `z6klient` WHERE `login`!='' AND `haslo`!=''");
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
  $wys = mysqli_query ($polaczenie, "INSERT INTO `z6dialog` (`loginklienta`,`$wybor`,`idk`) VALUES ('$login','$wiadomosc','$idklienta1')");
  header("Location: dziekujemy.php");
}

?>
