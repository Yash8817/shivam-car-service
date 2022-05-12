<?php
require_once "../lockscreen/connection.php";

if (isset($_POST['submit'])) 
{
  $sql = "UPDATE  user SET user_name='{$_POST["user_name"]}',user_email='{$_POST["email"]}',
  user_phone='{$_POST["phone"]}',user_add='{$_POST["address"]}'  WHERE user_id={$_POST["id"]};";
  if(mysqli_query($con , $sql))
  { 
      header('location: profile.php');
  }
  else
  {
      echo "error:update profile";
  }
}

if (isset($_POST['cancel'])) {
    header('location: profile.php');
}
