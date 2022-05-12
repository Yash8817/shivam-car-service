<?php
require_once "../lockscreen/connection.php";
$errors = [];

if (isset($_POST['submit'])) {
    $Mname = mysqli_real_escape_string($con, $_POST['mem-name']);
    $desc = mysqli_real_escape_string($con, $_POST['mem-desc']);
    $duration = mysqli_real_escape_string($con, $_POST['duration']);
    $Labour_discount = mysqli_real_escape_string($con, $_POST['Labour_discount']);
    $All_filter_check = mysqli_real_escape_string($con, $_POST['All_filter_check']);
    $Tire_rotation = mysqli_real_escape_string($con, $_POST['Tire_rotation']);
    $Road_Assistance = mysqli_real_escape_string($con, $_POST['Road_Assistance']);
    $price = mysqli_real_escape_string($con, $_POST['price']);

    $name = trim(preg_replace('/[\t\n\r\s]+/', ' ', $Mname));

    $service_check = "SELECT * FROM membership_details WHERE mem_name = '$name'";
    $res = mysqli_query($con, $service_check);
    if (mysqli_num_rows($res) > 0) {
        die();
    }

    $sql = "INSERT INTO membership_details(mem_details_id,mem_duration,mem_desc,Labour_discount,all_filter_check,tire_rotation,no_road_assist,price,mem_name)
     VALUES('','{$duration}','{$desc}','{$Labour_discount}','{$All_filter_check}','{$Tire_rotation}','{$Road_Assistance}','{$price}','{$name}');";
    if (mysqli_query($con, $sql)) {
        header('location: ../admin/Membership.php');
    } else {
        die("failed");
    }
}

if (isset($_POST['cancel'])) {
    header('location: ../admin/Membership.php');
}
