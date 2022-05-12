<?php
require "../Attendee/sidebar2.php" ;
require "../lockscreen/connection.php" ;

if(isset($_POST['add_service'])) { //check if form was submitted
    $jid = $_POST['jobcard'];
    $sid = $_POST['add-service'];
    $sql1 = "SELECT * FROM servics where service_id = $sid";
    $sprice = mysqli_query($con,$sql1);
    $res =mysqli_fetch_assoc($sprice);
    $price =$res['service_price'];
    $sql = "INSERT INTO job_card_servics (Job_cardjobcard_id,Servicsservice_id,price) VALUES
    ('{$jid}'  ,'{$sid}', '{$price}')";
    if(mysqli_query($con,$sql))
    {
    }else
    {
         die("service already exist!");
    }
    
  }?>