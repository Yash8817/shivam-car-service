<?php

require "../lockscreen/connection.php";

$parts_id = $_POST["id"];

session_start();
$j_id = $_SESSION['j_id'] ;

$get_part = "SELECT * FROM job_card_parts WHERE  partsparts_id = $parts_id  AND Job_cardjobcard_id = $j_id";
$fetch_p = mysqli_query($con , $get_part);
if(mysqli_num_rows($fetch_p)>0)
{
  $fetch = mysqli_fetch_assoc($fetch_p);
  $qty = $fetch['part_used_qty'];
  
  $sql = "DELETE FROM job_card_parts WHERE  partsparts_id = $parts_id  AND Job_cardjobcard_id = $j_id;";
  $sql .= "UPDATE parts SET qty = qty + $qty WHERE parts_id = $parts_id";
  if(mysqli_multi_query($con, $sql)){
    echo 1;
}else{
  echo 0;
}

}
