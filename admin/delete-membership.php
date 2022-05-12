<?php

require "../lockscreen/connection.php";
    $id = $_GET['id'];
    
    $sql = "SELECT * FROM membership AS m JOIN membership_details AS md ON md.mem_details_id = m.membership_details_id WHERE md.mem_details_id={$id}";

    $res = mysqli_query($con , $sql);
    if(mysqli_num_rows($res) > 0)
    {
        $sql1 = "DELETE FROM membership WHERE membership.membership_details_id = {$id}";
        if(mysqli_query($con , $sql1))
        {
            $sql3 = "DELETE FROM membership_details WHERE membership_details.mem_details_id = {$id}";
            if(mysqli_query($con , $sql3))
            {
                header('location: ../admin/Membership.php');
            }
            else
            {
                echo "bhai error aai";
            }
        }
        else
        {
            echo "failed";
        }
        
    }
    else
    {
        $sql2 = "DELETE FROM membership_details WHERE membership_details.mem_details_id = {$id}";
        if(mysqli_query($con , $sql2))
        {
            header('location: ../admin/Membership.php');
        }
        else
        {
            echo "error";
        }
    }

?>