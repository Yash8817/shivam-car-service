<?php
require_once "../lockscreen/connection.php";
$errors =array();

if (isset($_POST['submitQ&S'])) {
    $heading = mysqli_real_escape_string($con, $_POST['heading']);
    $desc = mysqli_real_escape_string($con, $_POST['desc']);

    $service_check = "SELECT * FROM qands WHERE heading = '$heading'";
    $res = mysqli_query($con, $service_check);
    if (mysqli_num_rows($res) > 0) {
        $errors[] = "service already exists";
    }

    session_start();
    $eml = $_SESSION['admin_login'];
    $fetch_admin = "SELECT * FROM administrator JOIN user ON user.user_id = administrator.admin_id WHERE user.user_email= '$eml'";
    $res = mysqli_query($con, $fetch_admin);
    if (mysqli_num_rows($res) > 0) {
        $fetch = mysqli_fetch_assoc($res);
        $admin_id = $fetch['admin_id'];

        $sql = "INSERT INTO qands(id,heading,Administratoradmin_id,description)
    VALUES('','{$heading}','{$admin_id}','{$desc}')";


        if (mysqli_query($con, $sql)) {
        echo "<script> location.href='../admin/Q&S.php'; </script>";
        } else {
            die("else part");
        }
    }
}
if (isset($_POST['cancel']))
 {
    header('location: ../admin/Q&S.php');
 }
