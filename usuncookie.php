<?php
header( "refresh:1;url=index.php" );
if(isset($_COOKIE['login'])){
setcookie("login", "", time()-3600);
setcookie("haslo", "", time()-3600);}else{
    echo 'nie mozma usunac';
}



?>