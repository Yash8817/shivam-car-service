<?php
require "../lockscreen/connection.php";
session_start();
$j_id = $_SESSION['j_id'] ;
$sid = $_POST["sid"];
$price = 0;
$status = 0;



$sql = "INSERT INTO job_card_servics(Job_cardjobcard_id, Servicsservice_id,price, status ) VALUES ('{$j_id}','{$sid}','{$price}','{$status}')";
if(mysqli_query($con, $sql)){
    echo 1;
}else{
  echo 0;
}


//fetching particular service price
$sql1 = "SELECT * FROM servics JOIN job_card_servics ON job_card_servics.Servicsservice_id = servics.service_id WHERE job_card_servics.Job_cardjobcard_id = $j_id
AND  job_card_servics.Servicsservice_id = $sid";
$res = mysqli_query($con , $sql1);
if(mysqli_num_rows($res)>0)
{
  
  $fetch = mysqli_fetch_assoc($res);
  $price = $fetch['service_price'];
}
else
{
  die("ahiya");
  
}

if($price == 0)
{
  $price = 0 ;
}

$update = "UPDATE  job_card_servics SET job_card_servics.price = $price  WHERE job_card_servics.Job_cardjobcard_id = $j_id AND job_card_servics.Servicsservice_id = $sid";

if(mysqli_query($con,$update))
{
  echo 1;
}
else{
  echo 0;
}





?>
