<?php
session_start();

    unset($_SESSION['attendee_login']);
    header('location: ../lockscreen/login-attendee.php');
?>