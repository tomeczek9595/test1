<?php
setcookie("wybierz", "", time()-3600);
  $dbhost="127.0.0.1"; $dbuser="28882678_junior1995"; $dbpassword="*****"; $dbname="28882678_junior1995";
$polaczenie = mysqli_connect ($dbhost, $dbuser, $dbpassword);
mysqli_select_db ($polaczenie, $dbname);
$logowanie = mysqli_query ($polaczenie, "SELECT `pytania` FROM `z6zapytania`ORDER by `id`ASC ");
$index=0;
$login=$_COOKIE['login'];
while ($wierszl = mysqli_fetch_array ($logowanie)){
  $pyt1[$index]=$wierszl[0];
$index++;
  }
////
$idpracownika=$_COOKIE['idpracownika'];
$ipaddress=$_SERVER['REMOTE_ADDR'];
function ip_details($ip) {
$json = file_get_contents ("http://ipinfo.io/{$ip}/geo");
$details = json_decode ($json);
return $details;
}
$logowanie2 = mysqli_query ($polaczenie, "SELECT `odpowiedz` FROM `z6dialog` WHERE `loginpracownika`='$login' ");
$indexodp=0;
while ($wierszl = mysqli_fetch_array ($logowanie2)){
  $licz=$wierszl[0];
  if($licz!=''){
$indexodp++;}
  }
  $logowanie4 = mysqli_query ($polaczenie, "SELECT `pyt1`,`pyt2`,`pyt3`,`pyt4` FROM `z6dialog` WHERE `odpowiedz`=''  ");
$indexbrak1=0;
$indexbrak2=0;
$indexbrak3=0;
$indexbrak4=0;
while ($wierszl = mysqli_fetch_array ($logowanie4)){
  $liczba1=$wierszl[0];
  $liczba2=$wierszl[1];
  $liczba3=$wierszl[2];
  $liczba4=$wierszl[3];
  
  if($liczba1!=''){
$indexbrak1++;}
  
  if($liczba2!=''){
$indexbrak2++;}
  
  if($liczba3!=''){
$indexbrak3++;}
  
  if($liczba4!=''){
$indexbrak4++;}
  }
$details = ip_details($ipaddress);
$panstwo=$details -> country;
$wys = mysqli_query ($polaczenie, "INSERT INTO `z6logpracownika` (`idp`,`ip`) VALUES ('$idpracownika','$ipaddress')");
echo "ZALOGOWANO JAKO PRACOWNIK"."<br><br>";

echo 'Odpowiedziales na: '.$indexodp.' zgloszen'."<br>";

echo 'liczba zgloszen w "'.$pyt1[0].'" oczekujacych na odpowiedz : '.$indexbrak1."<br>";
echo 'liczba zgloszen w "'.$pyt1[1].'" oczekujacych na odpowiedz : '.$indexbrak2."<br>";
echo 'liczba zgloszen w "'.$pyt1[2].'" oczekujacych na odpowiedz : '.$indexbrak3."<br>";
echo 'liczba zgloszen w "'.$pyt1[3].'" oczekujacych na odpowiedz : '.$indexbrak4."<br>";
?>




<form method="POST" action="odbierz.php" >
<br>
<select name="pytanie">
    <option value="pyt1"><?php echo $pyt1[0]; ?></option>
    <option value="pyt2"><?php echo $pyt1[1]; ?></option>
    <option value="pyt3"><?php echo $pyt1[2]; ?></option>
     <option value="pyt4"><?php echo $pyt1[3]; ?></option>
     
</select>
<input type="submit" value="wybierz"/>
</form>