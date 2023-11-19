<?php
//setcookie("loggedin", "false", time() - 3600, "/");
session_start();
$_SESSION['loggedin'] = false;
header("Location: /logout");
?>