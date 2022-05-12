<?php



require "../shivam/lockscreen/connection.php";
require "../shivam/top.php";


$error = "";
$msg = "";


if (strlen($_SESSION['user_login']) == 0) {
    header('location: index.php');
} else {
    if (isset($_POST['update'])) {
        $password = $_POST['newpassword'];
        $old = $_POST['password'];
        $email = $_SESSION['user_login'];
        $sql = "SELECT user.user_pass FROM user WHERE user.user_email = '$email'";
        if (mysqli_num_rows($res = mysqli_query($con, $sql)) > 0) {
            $fetch = mysqli_fetch_assoc($res);
            $user_password  = $fetch['user_pass'];
            $result = strcmp($user_password, $old);
            if ($result != 0) {
                $error = "Your current password is wrong";
            } else {
                $update_qry = "UPDATE user SET user_pass='$password' WHERE user.user_email = '$email'";
                if (mysqli_query($con, $update_qry)) {
                    $msg = "Your Password succesfully changed";
                }
            }
        }
    }
}

?>

<head>
    <style>
        .errorWrap {
            padding: 10px;
            margin: 0 0 20px 0;
            background: #fff;
            border-left: 4px solid #dd3d36;
        }

        .field-title {
            border-left: 3px solid #cecece;
            margin: 40px 0 25px;
            font-family: 'Lato', sans-serif;
            padding: 12px 13px 12px 28px;
        }

        .bold-text {
            /* font-weight: 900; */
            font-weight: bold;
        }

        .gray-bg {
            background: #eeeeee;
        }

        .succWrap {
            padding: 10px;
            margin: 0 0 20px 0;
            background: #fff;
            border-left: 4px solid #5cb85c;
            -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
        }

        .profile_wrap form .form-group {
            padding: 0 25px;
        }

        .profile_wrap form .control-label {
            color: #111;
        }

        .mybtn {
            background: #202c45 none repeat scroll 0 0;
            fill: black;
            border: medium none;
            border-radius: 3px;
            color: #ffffff;
            font-size: 16px;
            font-weight: 800;
            line-height: 30px;
            /* margin: auto; */

            padding: 7px 36px;
            transition: all 0.3s linear 0s;
        }

        .control-label {
            color: #555;
            font-size: 15px;
            font-weight: 700;
        }

        .profile_nav ul li a {
            color: #555;
            font-size: 15px;
            font-weight: 900;
        }

        .profile_nav ul li a:hover {
            color: red;
        }

        .profile_wrap {
            padding: 16px 5px;
        }

        .row {
            margin-right: -15px;
            margin-left: -15px;
        }

        .profile_nav {
            border-right: 1px solid #c5c5c5;
            padding: 20px;
            text-align: right;
        }

        .profile_nav ul {
            padding: 0px;
            margin: 0px;
        }

        .uppercase {
            text-transform: uppercase;
        }

        .profile_wrap form {
            padding: 20px 0;
        }

        h5 {

            color: #111111;
            font-weight: 900;
            margin: 0 auto 15px;
            font-size: 20px;
            line-height: 32px;
        }

        .underline {
            text-decoration: underline;
        }

        .text {

            font-family: 'Lato', sans-serif;
        }

        .profile_nav ul li {
            display: block;
            font-family: 'Lato', sans-serif;
            list-style-type: disc;
            margin-block-start: 1em;
            margin-block-end: 1em;
            margin-inline-start: 0px;
            margin-inline-end: 0px;
            padding-inline-start: 40px;
        }

        ul li,
        ol li {
            font-size: 16px;
            line-height: 26px;
            margin: 0 auto 10px;
        }

        form-group #btn:hover {
            color: black;
            transition: all 0.3s linear 0s;

        }
    </style>
    <script type="text/javascript">
        function valid() {
            if (document.chngpwd.newpassword.value != document.chngpwd.confirmpassword.value) {
                alert("New Password and Confirm Password Field do not match  !!");
                document.chngpwd.confirmpassword.focus();
                return false;
            }
            return true;
        }

        function CheckPassword(inputtxt) {
            var passw = /^[A-Za-z]\w{7,14}$/;
            if (inputtxt.value.match(passw)) {
                return true;
            } else {
                alert('password between 7 to 16 characters which contain only characters, numeric digits, underscore and first character must be a letter')
                return false;
            }
        }
    </script>
</head>
<div class="page-header" style="padding: 40px; ">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 style="margin-bottom: 10px;">Update password</h2>
            </div>
            <div class="col-12">
                <a href="../shivam/">Home</a>
                <a href="">update password</a>
            </div>
        </div>
    </div>
</div>



<section class="user_profile inner_pages">
    <div class="container">

        <div class="row">
            <div class="col-md-3 col-sm-3">
                <?php include('../shivam/include/sidebar.php'); ?>
                <div class="col-md-6 col-sm-8">
                    <div class="profile_wrap">
                        <form name="chngpwd" method="post" onSubmit="return valid();">

                            <div class="gray-bg field-title">
                                <h6 class="bold-text">Update password</h6>
                            </div>
                            <?php if ($error) { ?>
                                <div class="errorWrap">
                                    <strong>ERROR</strong>:
                                    <?php echo $error; ?>
                                </div>
                            <?php } else if ($msg) { ?>
                                <div class="succWrap">
                                    <strong>SUCCESS</strong>:
                                    <?php echo $msg; ?>
                                </div>
                            <?php } ?>


                            <div class="form-group">
                                <label class="control-label">Current Password</label>
                                <input class="form-control white_bg" id="password" name="password" type="password" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Password</label>
                                <input class="form-control white_bg" id="newpassword" type="password" name="newpassword" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Confirm Password</label>
                                <input class="form-control white_bg" id="confirmpassword" type="password" name="confirmpassword" required>
                            </div>

                            <div class="form-group">
                                <input type="submit" value="Update" name="update" id="submit" class="mybtn btn-block" onclick="CheckPassword(document.chngpwd.newpassword)">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</section>




<?php

require "../shivam/foter.php";    ?>