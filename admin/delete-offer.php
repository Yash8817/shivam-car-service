<?php
    require "../lockscreen/connection.php";
    $id = $_GET['id'];
    
    $sql = "SELECT * FROM offer AS o JOIN offer_servics AS os ON os.offeroffer_id = o.offer_id WHERE os.offeroffer_id={$id}";

    $res = mysqli_query($con , $sql);
    if(mysqli_num_rows($res) > 0)
    {
        $sql1 = "DELETE FROM offer_servics WHERE offer_servics.offeroffer_id = {$id}";
        if(mysqli_query($con , $sql1))
        {
            $sql3 = "DELETE FROM offer WHERE offer.offer_id = {$id}";
            if(mysqli_query($con , $sql3))
            {
                header('location: ../admin/offers.php');
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
        $sql2 = "DELETE FROM offer WHERE offer.offer_id = {$id}";
        if(mysqli_query($con , $sql2))
        {
            header('location: ../admin/offers.php');
        }
        else
        {
            echo "error";
        }
    }

?>