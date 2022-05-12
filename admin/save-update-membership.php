<?php

require "../lockscreen/connection.php";


$sql = "UPDATE  membership_details SET mem_duration='{$_POST["duration"]}',
mem_desc='{$_POST["mem-desc"]}',Labour_discount='{$_POST["discount"]}',all_filter_check='{$_POST["All_filter_check"]}',
tire_rotation='{$_POST["tire_rotation"]}',no_road_assist='{$_POST["no_road_assist"]}',price='{$_POST["price"]}',mem_name='{$_POST["mem-name"]}'
WHERE mem_details_id = {$_POST["id"]};";

if (mysqli_query($con, $sql)) {
    header('location: ../admin/Membership.php');
} else {
    die("failed");
}


if (isset($_POST['cancel'])) {
    header('location: ../admin/Membership.php');
}
