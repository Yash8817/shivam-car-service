<?php


require_once "../lockscreen/connection.php";

session_start();
$staff_email = $_SESSION['attendee_login'];
 $sql_atnf = "SELECT * FROM user JOIN staff ON staff.Useruser_id = user.user_id WHERE user.user_email = '$staff_email'";
$staff_res = mysqli_query($con , $sql_atnf);
if(mysqli_num_rows($staff_res)>0)
{
    $staff_ary = mysqli_fetch_assoc($staff_res);
    $staff_id = $staff_ary['staff_id'];
}


require "../lockscreen/connection.php";
if(isset($_POST["status"]))
{
    $statusid = $_POST["status"];
}
else
{
    $statusid = 2;
}
$sql = "UPDATE  appointment SET statusstatus_id= {$statusid} , staffstaff_id= '$staff_id' WHERE appointment_id={$_POST["a-id"]};";

if( mysqli_query($con,$sql)){
    header('location: ../attendee/New_appointment.php');
    
}else{
    
echo "Query Failed";
}
?>