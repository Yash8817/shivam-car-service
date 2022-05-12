<?php

require "../lockscreen/connection.php";

$service_id = $_POST["id"];

session_start();
$j_id = $_SESSION['j_id'] ;

$sql = "DELETE FROM job_card_servics WHERE  Servicsservice_id = $service_id  AND Job_cardjobcard_id = $j_id";


if(mysqli_query($con, $sql)){
  echo 1;
}else{
  echo 0;
}

?>
