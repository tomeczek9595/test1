<?php
//sprawdzanie czy mozna odpowiedziec
  $dbhost="127.0.0.1"; $dbuser="28882678_junior1995"; $dbpassword="*****"; $dbname="28882678_junior1995";
$polaczenie = mysqli_connect ($dbhost, $dbuser, $dbpassword);
mysqli_select_db ($polaczenie, $dbname);
$nr = $_POST['nr'];
setcookie('nr1', $nr, time()+10);
$nr1=$_COOKIE['nr1'];

$licznik=0; //jezeli nie wzroscnie to nie jest zalogowany
$logowanie = mysqli_query ($polaczenie, "SELECT `idp`,`odpowiedz` FROM `z6dialog` WHERE `idp`='$nr'");
while ($wierszl = mysqli_fetch_array ($logowanie)){
      $idp=$wierszl[0];
  $odp=$wierszl[1];

   
    }
      $liczba= strlen($odp);
  if($liczba<1){
    header("Location: odpowiadanie.php");}else{
 header("Location: error.php");}
 




//echo 'odp: '.$liczba;
//echo 'idp: '.$nr1;}
//echo 'nr: '.$nr;
?>