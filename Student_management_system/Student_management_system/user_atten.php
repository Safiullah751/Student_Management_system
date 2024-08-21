<?php
session_start();
if(!isset($_SESSION["login_session"])){
    header("location:pages-login.php");
    exit;
}
?>