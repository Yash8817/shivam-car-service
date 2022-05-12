<?php
require "../shivam/lockscreen/connection.php";

if(isset($_POST['username'])){
   $v_rto = mysqli_real_escape_string($con,$_POST['username']);
   $cid = mysqli_real_escape_string($con,$_POST['cid']);

   $query  = "SELECT * FROM vehicle WHERE vehicle.customer_id = $cid AND vehicle.rto_number='$v_rto'";
   $result = mysqli_query($con,$query);
   $response = "";


   if(mysqli_num_rows(mysqli_query($con,$query))>0)
   {
    $response = "<span style='color: red;'>Vehicle already exist.</span>";
   }
   echo $response;
   die;

}