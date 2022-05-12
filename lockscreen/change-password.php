<?php require_once "controllerUserData.php";
require "connection.php";
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    </style>
</head>

<body id="main">
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 form">
                <form action="change-password.php" method="POST" autocomplete="">
                    <h2 class="text-center">change Password</h2>
                    <p class="text-center">complete security option</p>
                    <?php
                    if (count($errors) > 0) {
                    ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach ($errors as $error) {
                                echo $error;
                            }
                            ?>
                        </div>
                    <?php
                    }
                    ?>

                    <?php
                    $email = $_SESSION['email'];


                    $get_sec_ques = "SELECT * FROM user WHERE user_email='$email'";
                    $ques_res = mysqli_query($con, $get_sec_ques);
                    if (mysqli_num_rows($ques_res) > 0) {
                        $fetch_data = mysqli_fetch_assoc($ques_res);
                        $fetch_code = $fetch_data['user_sec_ques'];

                        $question = $fetch_data['user_sec_ques'];
                        //echo $question;

                    ?>

                        <div class="form-group">
                            <input id="check-sec-ques" class="form-control" disabled type="text" name="check-sec-ques" placeholder="" value="<?php echo $question; ?>">
                        </div>
                    <?php } ?>




                    <div class="form-group">
                        <input id="check-sec-ans" class="form-control" type="text" name="check-sec-ans" placeholder="Enter security answer" required>
                    </div>

                    <div class="form-group">
                        <input id="rpassword" class="form-control" type="password" minlength="8" name="rpassword" placeholder="New Password" required>
                    </div>
                    <div class="form-group">
                        <input id="crpassword" class="form-control" type="password" name="crpassword" placeholder="Confirm New password" required>
                    </div>

                    <div class="form-group">
                        <input class="form-control button" type="submit" name="update-password" value="Continue">
                    </div>
                    <div class="link forget-pass text-center "><a href="login-user.php">Back to login</a></div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>