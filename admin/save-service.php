<?php
require_once "../lockscreen/connection.php";
$errors  = [];


if (isset($_POST['service'])) {
    $Sname = mysqli_real_escape_string($con, $_POST['service']);
    $name = trim(preg_replace('/[\t\n\r\s]+/', ' ', $Sname));
    $service_check = "SELECT * FROM servics WHERE service_name = '$name'";
    $response = "";
    if (mysqli_num_rows(mysqli_query($con, $service_check)) > 0) {
        $response = "<span style='color: red;'>Service already exist.</span>";
    }
    echo $response;
    die;
}






if (isset($_POST['submit'])) {
    $errors = array();
    $Sname = mysqli_real_escape_string($con, $_POST['service-name']);
    $price = mysqli_real_escape_string($con, $_POST['service-price']);
    $text_to_clean_up = mysqli_real_escape_string($con, $_POST['service-desc']);

    $name = trim(preg_replace('/[\t\n\r\s]+/', ' ', $Sname));
    $description = trim(preg_replace('/[\t\n\r\s]+/', ' ', $text_to_clean_up));
    $active = 1;

    $service_check = "SELECT * FROM servics WHERE service_name = '$name'";
    $res = mysqli_query($con, $service_check);
    if (mysqli_num_rows($res) > 0) {
        echo "<script language='javascript'>alert('service exist');</script>";
        echo "<script> location.href='../admin/add-service.php'; </script>";
    } else {

        $sql = "INSERT INTO servics(service_id,service_name,service_desc,service_price,is_active)
        VALUES('','{$name}','{$price}','{$description}','{$active}');";

        if (mysqli_query($con, $sql)) {
            // header('location: ../admin/service.php');
            echo "<script> location.href='../admin/service.php'; </script>";
        } else {
            // $errors["locha"] = "Problem in inserting service...";
            echo "<script language='javascript'>alert('Error while adding service!');</script>";
        }
    }
}

if (isset($_POST['cancel'])) {
    echo "<script> location.href='../admin/service.php'; </script>";
}
