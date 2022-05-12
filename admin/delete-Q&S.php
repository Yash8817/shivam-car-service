<?php

    require "../lockscreen/connection.php";

    $id = $_GET['id'];
    $sql = "DELETE FROM qands WHERE id  =  {$id}";
    if(mysqli_query($con , $sql))
    {
        header('location: ../admin/Q&S.php');
    }
    else
    {
        echo "failed";
    }

    

?>