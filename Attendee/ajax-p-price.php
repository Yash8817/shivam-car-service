<?php 
require "../lockscreen/connection.php";



$id = $_POST["Id"];

$sql = "SELECT parts.qty FROM parts WHERE parts.parts_id = $id";

$res = mysqli_query($con , $sql);
if(mysqli_num_rows($res)>0)
{
    $fetch = mysqli_fetch_assoc($res);
    echo $fetch['qty'];
}
else
{
    echo 0;
}

?>