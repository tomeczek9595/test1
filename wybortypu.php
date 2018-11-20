<?php

  $dbhost="127.0.0.1"; $dbuser="28882678_junior1995"; $dbpassword="*****"; $dbname="28882678_junior1995";
$polaczenie = mysqli_connect ($dbhost, $dbuser, $dbpassword);
mysqli_select_db ($polaczenie, $dbname);
$logowanie = mysqli_query ($polaczenie, "SELECT `pytania` FROM `z6zapytania`ORDER by `id`ASC ");
$index=0;
while ($wierszl = mysqli_fetch_array ($logowanie)){
  $pyt1[$index]=$wierszl[0];
$index++;
  }
  $loginn=$_COOKIE['login'];
////
print "<TABLE CELLPADDING=5 BORDER=1>";
print "<TR><TD>ip</TD><TD>data</TD></TR>\n";

   $odb3 = mysqli_query ($polaczenie, "SELECT `ip`,`data` FROM `z6klient`inner join `z6logklienta` using (`idk`) WHERE `login`='$loginn' GROUP BY `data` ORDER BY `data`  ");
  while ($wierszl = mysqli_fetch_array ($odb3)){
      $log1=$wierszl[0];
  $typ1=$wierszl[1];
   $odpo=$wierszl[2];
  $idp1=$wierszl[3];
  
   print"<TD>$log1</TD><TD>$typ1</TD>\n";
  print "<TR>";
  }
  echo 'OSTATNIE LOGOWANIA UŻYTKOWNIKA: '.$loginn;
  echo '</table><br />';

$agent = "X".$_SERVER['HTTP_USER_AGENT'];
 
$system = array('Windows 2000' => 'NT 5.0', 'Windows XP' => 'NT 5.1'
            ,'Windows Vista' => 'NT 6.0', 'Windows 7' => 'NT 6.1'
            ,'Windows 8' => 'NT 6.2', 'Linux' => 'Linux',
            'Windows 10' => 'NT 10');
 
$przegladarka = array('Internet Explorer' => 'MSIE', 'Mozilla Firefox' => 'Firefox'
            ,'Opera' => 'Opera', 'Chrome' => 'Chrome');
 
foreach ($system as $nazwa => $id)
   if (strpos($agent, $id)) $system = $nazwa;
 
foreach ($przegladarka as $nazwa => $id)
   if (strpos($agent, $id)) $przegladarka = $nazwa;


echo "System operacyjny: <b>".$system."</b><BR>";
echo "Przegladarka: <b>".$przegladarka."</b><BR>";
 $wgranie = mysqli_query ($polaczenie, "INSERT INTO `z6logklienta` (`ip`,`przegladarka`,`system`) VALUES ('$przegladarka','$system')");

?>

WYBIERZ TYP ZGLOSZENIA ABY WYSWIETLIC HISTORIE
<form method="POST" action="historia.php" >
<br>
<select name="pytanie2">
    <option value="pyt1"><?php echo $pyt1[0]; ?></option>
    <option value="pyt2"><?php echo $pyt1[1]; ?></option>
    <option value="pyt3"><?php echo $pyt1[2]; ?></option>
     <option value="pyt4"><?php echo $pyt1[3]; ?></option>
     <br>
</select>
<input type="submit" value="wyslij"/>
</form>
<br><br>