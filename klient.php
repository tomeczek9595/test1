<?php
  $dbhost="127.0.0.1"; $dbuser="28882678_junior1995"; $dbpassword="****"; $dbname="28882678_junior1995";
$polaczenie = mysqli_connect ($dbhost, $dbuser, $dbpassword);
mysqli_select_db ($polaczenie, $dbname);
$logowanie = mysqli_query ($polaczenie, "SELECT `pytania` FROM `z6zapytania`ORDER by `id`ASC ");
$index=0;
while ($wierszl = mysqli_fetch_array ($logowanie)){
  $pyt1[$index]=$wierszl[0];
$index++;
  }
////
$idklienta=$_COOKIE['idklienta'];
$ipaddress=$_SERVER['REMOTE_ADDR'];
function ip_details($ip) {
$json = file_get_contents ("http://ipinfo.io/{$ip}/geo");
$details = json_decode ($json);
return $details;
}
$details = ip_details($ipaddress);
$panstwo=$details -> country;
$wys = mysqli_query ($polaczenie, "INSERT INTO `z6logklienta` (`idk`,`ip`) VALUES ('$idklienta','$ipaddress')");
/////
/////
?>

ZALOGOWANO JAKO KLIENT <br><br><br>
Nowe zgloszenie
<form method="POST" action="wysylaj.php" >
<br>
<select name="pytanie">
    <option value="pyt1"><?php echo $pyt1[0]; ?></option>
    <option value="pyt2"><?php echo $pyt1[1]; ?></option>
    <option value="pyt3"><?php echo $pyt1[2]; ?></option>
     <option value="pyt4"><?php echo $pyt1[3]; ?></option>
     <br>
     Wiadomosc:<input type="text" name="post" maxlength="250" size="90"><br>
</select>
<input type="submit" value="wyslij"/>
</form>
<br><br>
Historia zgloszen
<br>
<form method="POST" action="wybortypu.php" >
<br>

<input type="submit" value="wyswietl"/>
</form>