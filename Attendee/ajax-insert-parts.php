<?php
require "../lockscreen/connection.php";
session_start();
$j_id = $_SESSION['j_id'] ;
$pid = $_POST["pid"];
$qty = $_POST["qty"];
$price = 0;
$status = 0;

//get qty
$get_qty = "SELECT parts.qty FROM parts WHERE parts.parts_id = $pid";
$get_p = mysqli_query($con, $get_qty);
if (mysqli_num_rows($get_p) > 0) {
    $fetch = mysqli_fetch_assoc($get_p);
    $pqty = $fetch['qty'];
}

if ($pqty > $qty) {
    $check_parts = "SELECT *  FROM job_card_parts WHERE partsparts_id = $pid AND  Job_cardjobcard_id = $j_id";
    $p_res = mysqli_query($con, $check_parts);
    if (mysqli_num_rows($p_res) > 0) {
        echo 0;
    } else 
    {
         $sql = "INSERT INTO job_card_parts(Job_cardjobcard_id, partsparts_id,part_used_qty,price,status) VALUES ('{$j_id}','{$pid}','{$qty}','{$price}','{$status}')";
        if (mysqli_query($con, $sql)) 
        {
            $sql1 = "SELECT * FROM parts JOIN job_card_parts ON job_card_parts.partsparts_id = parts.parts_id WHERE job_card_parts.Job_cardjobcard_id = $j_id
          AND  job_card_parts.partsparts_id = $pid";
            $res = mysqli_query($con, $sql1);
            if (mysqli_num_rows($res) > 0) {
        
                $fetch = mysqli_fetch_assoc($res);
                $pprice = $fetch['part_price'];
                $price = $pprice * $qty;
            } else {
                die("ahiya");
            }
        
            $update = "UPDATE  job_card_parts SET job_card_parts.price = $price  WHERE job_card_parts.Job_cardjobcard_id = $j_id AND job_card_parts.partsparts_id = $pid;";
            $update .= "UPDATE parts SET qty = qty - $qty WHERE parts_id = $pid";
            if (mysqli_multi_query($con, $update)) {
                echo 1;
            } else {
                echo 0;
            }
        } else {
            echo 2;
        }
    }
} else {
    echo 0;
}
?>