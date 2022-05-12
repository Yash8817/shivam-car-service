<?php

require "../shivam/lockscreen/connection.php";

$msg = "";
$error = "";
$error_msg = "";



function validate_mobile($mobile)
{
    return preg_match('/^[6-9]\d{9}$/', $mobile);
}



if (isset($_POST['sendMessageButton'])) {
    $name =  mysqli_real_escape_string($con, $_POST['uname']);
    $uemail =  mysqli_real_escape_string($con, $_POST['uemail']);
    $uphone =  mysqli_real_escape_string($con, $_POST['uphone']);
    $message  =  mysqli_real_escape_string($con, $_POST['message']);
    $status = 0;

    if (!validate_mobile($uphone)) {
        $error_msg  =  "Invalid Phone number!";
    }

    if (empty($error_msg)) {
        $sql = "INSERT INTO query(q_id,name,email,uphone,message,status) VALUES ('', '$name','$uemail', '$uphone','$message','$status')";
        if (mysqli_query($con, $sql)) {
            $msg = "Query Sent. We will contact you shortly";
        } else {
            $error = "Something went wrong. Please try again";
        }
    }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>AutoWash - Car Wash Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free Website Template" name="keywords">
    <meta content="Free Website Template" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
   
</head>

<body>
    <?php require "top.php" ?>
    <!-- Page Header Start -->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Contact Us</h2>
                </div>
                <div class="col-12">
                    <a href="">Home</a>
                    <a href="">Contact</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Contact Start -->
    <div class="contact">
        <div class="container">
            <div class="section-header text-center">
                <p>Get In Touch</p>
                <h2>Contact for any query</h2>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="contact-info">
                        <h2>Quick Contact Info</h2>
                        <div class="contact-info-item">
                            <div class="contact-info-icon">
                                <i class="far fa-clock"></i>
                            </div>
                            <div class="contact-info-text">
                                <h3>Opening Hour</h3>
                                <p>Mon - Fri, 8:00 - 9:00</p>
                            </div>
                        </div>
                        <div class="contact-info-item">
                            <div class="contact-info-icon">
                                <i class="fa fa-phone-alt"></i>
                            </div>
                            <div class="contact-info-text">
                                <h3>Call Us</h3>
                                <p>+91 9537496805</p>
                            </div>
                        </div>
                        <div class="contact-info-item">
                            <div class="contact-info-icon">
                                <i class="far fa-envelope"></i>
                            </div>
                            <div class="contact-info-text">
                                <h3>Email Us</h3>
                                <p> shivamcar78@gmail.com</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="contact-form">
                        <?php
                        if ($error) {
                        ?>
                            <div class="errorWrap"><strong>ERROR</strong>:
                                <?php echo htmlentities($error); ?>
                            </div>
                        <?php
                        } else if ($error_msg) { ?>
                            <div class="errorWrap"><strong>ERROR</strong>:
                                <?php echo htmlentities($error_msg); ?>
                            </div>
                        <?php }
                         else if ($msg) { ?>
                            <div class="succWrap"><strong>SUCCESS</strong>:
                                <?php echo htmlentities($msg); ?>
                            </div>
                        <?php } ?>
                        <div id="success"></div>
                        <form name="sentMessage" id="contactForm" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <div class="control-group">
                                <input type="text" class="form-control" id="name" name="uname" placeholder="Your Name" required />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <input type="email" class="form-control" id="email" name="uemail" placeholder="Your Email" required />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <input type="number" maxlength="10" class="form-control" id="subject" name="uphone" placeholder="Contact no" required />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="control-group">
                                <textarea class="form-control" id="message" name="message" placeholder="Message" required></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                            <div>
                                <button class="btn btn-custom" type="submit" id="sendMessageButton" name="sendMessageButton">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Contact End -->

    <?php require "foter.php" ?>