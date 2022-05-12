<?php
    require "../lockscreen/connection.php";
    $id = $_GET['id'];
    
     $sql = "SELECT * FROM staff WHERE staff_id={$id}";

    $res = mysqli_query($con , $sql);
    if(mysqli_num_rows($res) > 0)
    {
        $sql1 = "SELECT * FROM appointment JOIN staff ON appointment.staffstaff_id  =staff.staff_id WHERE staff.staff_id = $id";
        $res = mysqli_query($con , $sql1);
        if(mysqli_num_rows($res) > 0)
        {
         $sql2 = "DELETE FROM appointment WHERE appointment.staffstaff_id = {$id}";
        if(!(mysqli_query($con , $sql2)))
        {
            die("error in appointment.staff delete");
        }
        }
        //
       $sql3 = "SELECT * FROM payment JOIN staff ON payment.staffstaff_id  =staff.staff_id WHERE staff.staff_id = $id";
       $res = mysqli_query($con , $sql3);
       if(mysqli_num_rows($res) > 0)
       {
         $sql4 = "DELETE FROM payment WHERE payment.staffstaff_id = {$id}";
        if(!(mysqli_query($con , $sql4)))
       {
           die("error in appointment.staff delete");
       }
        }


        $sql3 = "DELETE FROM staff WHERE staff_id = {$id}";
        if(mysqli_query($con , $sql3))
        {
            header('location: ../admin/staff.php');
        }
        else
        {
            die("error:delete staff");
        }
    }
    else
    {
        $sql3 = "DELETE FROM staff WHERE staff_id = {$id}";
        if(mysqli_query($con , $sql2))
        {
            header('location: ../admin/staff.php');
        }
        else
        {
            die("error:delete staff");
        }
    }

?>