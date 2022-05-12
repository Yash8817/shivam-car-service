 <?php
session_start();
require "../lockscreen/connection.php";
$email=$_POST['email'];
$res=mysqli_query($con,"select * from user where user_email='$email'");
$count=mysqli_num_rows($res);
if($count>0){
	$otp=rand(11111,99999);
	mysqli_query($con,"update user set otp='$otp' where user_email='$email'");
	$html="Your otp verification code is ".$otp;
	$_SESSION['email']=$email;
	smtp_mailer($email,'OTP Verification',$html);
	echo "yes";
}else{
	echo "not_exist";
}

function smtp_mailer($to,$subject, $msg){
	require 'PHPMAILER/PHPMailer.php'; 
    require 'PHPMAILER/Exception.php';
    require 'PHPMAILER/SMTP.php';
	$mail = new PHPMailer(); 
	$mail->IsSMTP(); 
	$mail->SMTPDebug = 1; 
	$mail->SMTPAuth = true; 
	$mail->SMTPSecure = 'TLS'; 
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 587; 
	$mail->IsHTML(true);
	$mail->CharSet = 'UTF-8';
	$mail->Username = "click2eat01@gmail.com";
	$mail->Password = "Ranveer@1999";
	$mail->SetFrom("click2eat01@gmail.com");
	$mail->Subject = $subject;
	$mail->Body =$msg;
	$mail->AddAddress($to);
	if(!$mail->Send()){
		return 0;
	}else{
		return 1;
	}
}
?>