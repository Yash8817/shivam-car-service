<?php
require "../shivam/lockscreen/connection.php";


if(isset($_POST['add_new_vehicle']))
{
    
    $c_id =  mysqli_real_escape_string($con, $_POST['c_id']);
    $v_rto = mysqli_real_escape_string($con, $_POST['v_RTO']);
    $v_chassis = mysqli_real_escape_string($con, $_POST['v_chassis']);
    $v_model = mysqli_real_escape_string($con, $_POST['v_model']);
    $v_color = mysqli_real_escape_string($con, $_POST['v_color']);
    


    //check vehicle exist or not
    $check_vehicle = "SELECT * FROM vehicle WHERE vehicle.customer_id = $c_id AND vehicle.rto_number='$v_rto'";
    
    if(mysqli_num_rows(mysqli_query($con,$check_vehicle))>0)
    {
        //if exist , display msg and return to last page
        echo "<script language='javascript'>alert('Vehicle already exist!!!');</script>";
        echo "<script> location.href='../shivam/my-vehicle.php'; </script>";
    }

    //if not exist then add new vehicle
    $sql2 = "INSERT INTO vehicle(rto_number,customer_id,chassis_no,veh_color_id,modelcar_model_id) 
    VALUES ('$v_rto','$c_id','$v_chassis','$v_color','$v_model')";
    $res1 = mysqli_query($con , $sql2);
    if(!$res1)
    {
        //if error in adding new vehicle display msg
        echo "<script language='javascript'>alert('Error while adding vehicle!!!');</script>";
        echo "<script> location.href='../shivam/my-vehicle.php'; </script>";
    }
    else
    {
        //if added then redirect to my vehicle page
        echo "<script> location.href='../shivam/my-vehicle.php'; </script>";

    }

}
else
{
    die("asa");
}


?>