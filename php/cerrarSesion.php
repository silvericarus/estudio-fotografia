<?php 
session_start();
session_destroy();
setcookie("idsession","",time()+2629746,"/");
header("Refresh:0; url=../index.php");
?>