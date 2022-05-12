<?php


session_start();
unset($_SESSION['admin_login']);
header('location: login-admin.php');

?>