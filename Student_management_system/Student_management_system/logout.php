<?php
session_start();
setcookie("username",$uname,time()-1000);
setcookie("password",$password,time()-1000);
//redirect
session_destroy();
header("location:pages-login.php?logout=1");
?>