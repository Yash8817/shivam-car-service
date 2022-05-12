<?php

require "../lockscreen/connection.php";

if (mysqli_connect_errno())
{

  echo "Failed to connect to MySQL: " . mysqli_connect_error();

}

    $username = $_POST["username"];
$sql =" SELECT * FROM  user WHERE user.user_email = { $username}";
  $query = mysqli_query($con,$sql);

  $find = mysqli_num_rows($query);

  echo $find;

  

  ?>