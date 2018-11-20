<?php
header( "refresh:1;url=index.php" );
$dbhost="127.0.0.1"; $dbuser="28882678_junior1995"; $dbpassword="sY2gFZqBn"; $dbname="28882678_junior1995";
$polaczenie = mysqli_connect ($dbhost, $dbuser, $dbpassword);
mysqli_select_db ($polaczenie, $dbname);
$login1 = $_POST['login1'];
$haslo1 = $_POST['haslo1'];
$haslo2 = $_POST['haslo2'];
if($haslo1==$haslo2){

$sql="INSERT INTO konta
VALUES (NULL, '$user', '$pass')";
if (!mysql_query($sql,$bd))
  {
  die('Error: ' . mysql_error());
  }
echo "dodano Twoje konto";
mysql_close($bd);

}
else
{
echo "hasla nie sa takie same";
}
if($login1==''||$haslo1==''){
     header("Location: index.php");}else{
$rejestr = mysqli_query ($polaczenie," INSERT INTO `z6klient`(`login`,`haslo`) VALUES ('$login1','$haslo1')");}

?>
