<?php
session_start();

    unset($_SESSION['mechanic_login']);
    header('location: ../lockscreen/login-mechanic.php');
?>