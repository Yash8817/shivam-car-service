<?php
    require "../lockscreen/connection.php";
    $id = $_GET['id'];

     $sql = "SELECT * FROM vehicle AS v JOIN appointment AS a ON v.rto_number = a.Vehicle_rto_number
     WHERE a.Vehicle_rto_number='{$id}'";
    $res = mysqli_query($con , $sql);
    if(mysqli_num_rows($res) > 0)
    {
        echo$sql1 = "DELETE FROM appointment WHERE appointment.Vehicle_rto_number = '{$id}'";
        if(!mysqli_query($con , $sql1))
        {
            die("error :delete vehicle ");
        }
    }


    $sql1 = "DELETE FROM vehicle WHERE vehicle.rto_number = '{$id}'";
    if(mysqli_query($con , $sql1))
    {
        header('location: ../admin/vehicle.php');
    }
    else
    {
        echo "error : vehicle delete";
    }
    
    
    ?>