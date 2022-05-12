<?php

require "../lockscreen/connection.php";

$heading = $_POST["heading"];
$des = $_POST["desc"];


$des = filter_var($des , FILTER_SANITIZE_ADD_SLASHES);
$heading = filter_var($heading , FILTER_SANITIZE_ADD_SLASHES);


 $sql = "UPDATE  qands SET heading='$heading',description='$des' WHERE id={$_POST["Q-id"]};";


if( mysqli_query($con,$sql)){
    header('location: ../admin/Q&S.php');
}else{
    echo mysqli_error($con);
echo "Query Failed";
}

?>