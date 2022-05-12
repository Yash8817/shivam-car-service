<?php

    require "../lockscreen/connection.php";
  
    $service_id = $_GET['id'];

    $sql = "SELECT *  FROM servics";

     $res =mysqli_query($con , $sql);
     if(mysqli_num_rows($res) > 0)
     {
         $sql1 = "SELECT * FROM job_card_servics WHERE  job_card_servics.Servicsservice_id = {$service_id}";
         $res1 =mysqli_query($con , $sql1);
         if(mysqli_num_rows($res1) > 0)
         {
             
            echo "<script>alert('service is exist in offer, can't delete it');</script>";
            

        }else
        {
           $sql5 = "DELETE FROM servics WHERE servics.service_id  = {$service_id}";
           if(mysqli_query($con , $sql5))
           {
            echo "<script> location.href='  ../admin/service.php'; </script>";
           }
           else
           {
               echo "<script>alert('service is exist in offer, can't delete it');</script>";
               }
        }
        }
     
