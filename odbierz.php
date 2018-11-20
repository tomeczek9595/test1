<?php
  $dbhost="127.0.0.1"; $dbuser="28882678_junior1995"; $dbpassword="*****"; $dbname="28882678_junior1995";
$polaczenie = mysqli_connect ($dbhost, $dbuser, $dbpassword);
mysqli_select_db ($polaczenie, $dbname);
//if(!isset($_COOKIE['wybierz'])){
$wybor = $_POST['pytanie'];
//setcookie('wybierz', $wybor1, time()+180);}
//$wybor=$_COOKIE['wybierz'];
$login=$_COOKIE['login'];
$haslo=$_COOKIE['haslo'];
print "<TABLE CELLPADDING=5 BORDER=1>";
print "<TR><TD>login</TD><TD>wpis</TD><TD>id</TD></TR>\n";
$licznik=0; //jezeli nie wzroscnie to nie jest zalogowany
$logowanie = mysqli_query ($polaczenie, "SELECT `login`,`haslo` FROM `z6pracownik` WHERE `login`!='' AND `haslo`!=''");
while ($wierszl = mysqli_fetch_array ($logowanie)){
  $log=$wierszl[0];
  $pas=$wierszl[1];
  if($login==$log&&$haslo==$pas){
      $licznik++;
  }}
  
  if($licznik==0){
      header("Location: usuncookie.php");
  }
  
  $odb = mysqli_query ($polaczenie, "SELECT `loginklienta`,`$wybor`,`idp` FROM `z6dialog` WHERE `$wybor`!='' AND `$wybor`!=''AND `odpowiedz`='' ORDER by `idp` ASC");
  while ($wierszl = mysqli_fetch_array ($odb)){
      $log1=$wierszl[0];
  $typ=$wierszl[1];
  $idp=$wierszl[2];
   print"<TD>$log1</TD><TD>$typ</TD><TD>$idp</TD>";
    print "<TR>";
  }


  
//  header("Location: dziekujemy.php");

?>

<form method="POST" action="odpowiedz.php" >
<br>

Wpisz nr wiadomosci na ktora chcesz odpowiedziec:<input type="number" name="nr" value="0" min="1" max="99999"><br>

<input type="submit" value="Napisz"/>
</form>