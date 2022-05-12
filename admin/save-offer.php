<?php
    
require_once "../lockscreen/connection.php";


if (isset($_POST['submit'])) 
{
    if (isset($_POST['offer-id'])) 
    {
       $sql = "UPDATE  offer SET offer_start_date='{$_POST["start-date"]}',offer_end_date='{$_POST["end-date"]}',
        offer_disscount='{$_POST["offer-discount"]}',is_active='{$_POST["type"]}',offer_name='{$_POST["offer-name"]}',
        offer_desc='{$_POST["offer-desc"]}' WHERE offer_id={$_POST["offer-id"]};";
    }

    else
    {
        $Oname = mysqli_real_escape_string($con, $_POST['offer-name']);
        $Odesc = mysqli_real_escape_string($con, $_POST['offer-desc']);
        $Odiscount = mysqli_real_escape_string($con, $_POST['offer-discount']);
        $start_date = mysqli_real_escape_string($con, $_POST['start-date']);
        $end_date = mysqli_real_escape_string($con, $_POST['end-date']);
        $is_active = 1;
        $offer_check = "SELECT * FROM offer WHERE offer_name = '$Oname'";
        $res = mysqli_query($con, $offer_check);
        if (mysqli_num_rows($res) > 0) {
            echo "<script>alert('Success!');</script>";
            header('location: ../admin/offers.php');
        }
        $sql = "INSERT INTO offer(offer_id,offer_start_date,offer_end_date,offer_disscount,is_active,offer_name,offer_desc)
         VALUES('','{$start_date}','{$end_date}','{$Odiscount}','{$is_active}','{$Oname}','{$Odesc}');";
    }
    if (mysqli_query($con, $sql))
    {
        header('location: ../admin/offers.php');
    } else 
    {
        echo "<div class='alert alert-danger'>Query Failed.</div>";
    }
    }
    if (isset($_POST['cancel'])) {
        header('location: ../admin/offers.php');
    }
?>