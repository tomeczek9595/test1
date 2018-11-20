<?php
  $dbhost="127.0.0.1"; $dbuser="28882678_junior1995"; $dbpassword="******"; $dbname="28882678_junior1995";
$polaczenie = mysqli_connect ($dbhost, $dbuser, $dbpassword);
mysqli_select_db ($polaczenie, $dbname);
$wybor = $_POST['pytanie2'];
$login=$_COOKIE['login'];
$haslo=$_COOKIE['haslo'];
print "<TABLE CELLPADDING=5 BORDER=1>";
print "<TR><TD>odpowiedzial</TD><TD>pytanie</TD><TD>odpowiedz</TD><TD>nr zgloszenia</TD></TR>\n";
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
  $odb = mysqli_query ($polaczenie, "SELECT `loginpracownika`,`$wybor`,`odpowiedz`,`idp` FROM `z6dialog` WHERE `loginklienta`='$login' AND `$wybor`!=''  ");
  while ($wierszl = mysqli_fetch_array ($odb)){
      $log1=$wierszl[0];
  $typ1=$wierszl[1];
   $odpo=$wierszl[2];
  $idp1=$wierszl[3];
   print"<TD>$log1</TD><TD>$typ1</TD><TD>$odpo</TD><TD>$idp1</TD>\n";
  print "<TR>";
  }

    print "<TR>";

//  header("Location: dziekujemy.php");

?>
Jakość obsługi oceniasz na ?
<input type="radio" name="Wiek" value="mniej niż 15" />mniej niż 15<br />
<input type="radio" name="Wiek" value="15-19" />15-19<br />
<input type="radio" name="Wiek" value="20-29" />20-29<br />
<input type="radio" name="Wiek" value="30-39" />30-39<br />
<input type="radio" name="Wiek" value="40-60" />40-60<br />
<input type="radio" name="Wiek" value="więcej niż 60" />więcej niż 60 
<form action="...">
    <input type="radio" name="1" value="1"  / />1
</form>
<form action="...">
    <input type="radio" name="1" value="2"  / />2
</form>
<form action="...">
    <input type="radio" name="1" value="3" / />3
</form>
<form action="...">
    <input type="radio" name="1" value="4"  / />4
</form>
<form action="...">
    <input type="radio" name="1" value="5"  / />5
</form>
