<?php

require "../lockscreen/connection.php";

$service_id = $_POST["id"];

session_start();
$j_id = $_SESSION['j_id'];

$sql = "UPDATE job_card_servics SET job_card_servics.status = 1 WHERE job_card_servics.Job_cardjobcard_id = $j_id  AND job_card_servics.Servicsservice_id = $service_id";

if(mysqli_query($con, $sql)){
  echo 1;
}else{
  echo 0;
}

?>
