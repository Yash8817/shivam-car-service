<?php
session_start();
require "../lockscreen/connection.php";
$otp=$_POST['otp'];
$email=$_SESSION['email'];
$res=mysqli_query($con,"select * from user where user_email='$email' and otp='$otp'");
$count=mysqli_num_rows($res);
if($count>0){
	mysqli_query($con,"update user set otp='' where email='$email'");
	$_SESSION['IS_LOGIN']=$email;
	echo "1";
}else{
	echo "0";
}
?>