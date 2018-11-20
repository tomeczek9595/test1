<?php

//header( "refresh:3;url=index2.php" );

  $dbhost="127.0.0.1"; $dbuser="28882678_junior1995"; $dbpassword="*****"; $dbname="28882678_junior1995";
$polaczenie = mysqli_connect ($dbhost, $dbuser, $dbpassword);
mysqli_select_db ($polaczenie, $dbname);
$login = $_POST['login'];
$haslo = $_POST['haslo'];
if(!isset($_COOKIE['login'])){
setcookie('login', $login, time()+360000);
setcookie('haslo', $haslo, time()+360000);
}else{
    $login=$_COOKIE['login'];
    $haslo=$_COOKIE['haslo'];
}
$user = $login;
$post = $_POST['post'];
$odbiorca = $_POST['odbiorca'];
if(!isset($_COOKIE['user'])){
setcookie('user', $user, time()+360000);}else{
    $user=$_COOKIE['user'];
}
$dane=0;
$logowanie = mysqli_query ($polaczenie, "SELECT `idp`,`login`,`haslo` FROM `z6pracownik` ORDER BY `idp` ASC");
while ($wierszl = mysqli_fetch_array ($logowanie)){
  $logg1=$wierszl[0];
  $logg=$wierszl[1];
  $pass=$wierszl[2];
if($logg==$login&&$pass==$haslo){
   
      setcookie('idpracownika', $logg1, time()+360000);
      // echo 'idp: '.$logg1;
    $linktyp='pracownik.php';
     header("Location: pracownik.php");
     $dane=1;
}}
$logowanie1 = mysqli_query ($polaczenie, "SELECT `idk`,`login`,`haslo` FROM `z6klient` ORDER BY `idk` ASC");
while ($wierszl = mysqli_fetch_array ($logowanie1)){
$logg2=$wierszl[0];
  $logg=$wierszl[1];
  $pass=$wierszl[2];
if($logg==$login&&$pass==$haslo){
   setcookie('idklienta', $logg2, time()+360000);
    $linktyp='pracownik.php';
     header("Location: klient.php");
     $dane=2;
}}

if($dane==0){
header("Location: usuncookie.php");}

  //echo 'dane:'.$logg."<br>";
   // echo 'pass:'.$pass."<br>";
?>