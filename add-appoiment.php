<?php

require_once "../shivam/lockscreen/connection.php";
// require_once "../shivam/bookapp.php";




$a_date = mysqli_real_escape_string($con, $_POST['a_date']);
$a_time = mysqli_real_escape_string($con, $_POST['a_time']);
$c_id = mysqli_real_escape_string($con, $_POST['c_id']);
$type = 1;
$status = 1;
$v_rto = mysqli_real_escape_string($con, $_POST['vehicle_rto']);



$get_staf = "SELECT staff.staff_id FROM staff WHERE staff.is_attendee ='1' LIMIT 1";
if ($row = mysqli_query($con, $get_staf)) {
    $fetch =  mysqli_fetch_assoc($row);
    $staff_id = $fetch['staff_id'];
}
$sql = "SELECT *  FROM appointment JOIN status ON appointment.statusstatus_id = status.status_id WHERE appointment.app_date = '$a_date' and appointment.app_time = '$a_time' and status.status_id = '1'";
$res = mysqli_query($con, $sql);
if (mysqli_num_rows($res) > 0) {
    echo "<script language='javascript'>alert('appoiment not available');</script>";
    echo "<script> location.href='../shivam/bookapp.php'; </script>";
} else {
    echo $sql1 = "INSERT INTO appointment (appointment_id, app_date,app_time,Vehicle_rto_number,staffstaff_id,customercustomer_id,statusstatus_id) VALUES
     ('','$a_date','$a_time','$v_rto','$staff_id','$c_id','$status')";
    $result = mysqli_query($con, $sql1);
    if ($result) {
        echo "<script> location.href='../shivam/index.php'; </script>";
    } else {
        // die($sql);
        echo "<script language='javascript'>alert('Error while booking appointment!');</script>";
        die();
        echo "<script> location.href='../shivam/bookapp.php'; </script>";

    }
}
