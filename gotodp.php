<?php
  $dbhost="127.0.0.1"; $dbuser="28882678_junior1995"; $dbpassword="******"; $dbname="28882678_junior1995";
$polaczenie = mysqli_connect ($dbhost, $dbuser, $dbpassword);
mysqli_select_db ($polaczenie, $dbname);
$wiadomosc = $_POST['post'];
$login=$_COOKIE['login'];
$idp1=$_COOKIE['nr1'];

if($wiadomosc==''){
 header("Location: pusta.php");
 }
 
else{
$logowanie = mysqli_query ($polaczenie," UPDATE `z6dialog` SET `odpowiedz` = '$wiadomosc',`loginpracownika`='$login' WHERE `idp`='$idp1'");
     header("Location: wyslana.php");
}
?>
