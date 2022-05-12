<?php
require "./lockscreen/connection.php";
require "../shivam/top.php";

$msg = "";
if (strlen($_SESSION['user_login']) == 0) {
    header('location: index.php');
} else {
    if (isset($_POST['updateprofile'])) {

        $name = $_POST['fullname'];
        $mobileno = $_POST['mobilenumber'];
        $adress = $_POST['address'];
        $email = $_SESSION['user_login'];
        $sql1 = "UPDATE user SET user_name='$name',user_add='$adress',user_phone='$mobileno' WHERE user_email = '$email'";
        $result  = mysqli_query($con, $sql1);
        if ($result) {
            $msg = "Profile Updated Successfully";
        }
    }
}

?>

<head>
    <style>
        .text-bold {
            font-weight: 600;
        }

        .errorWrap {
            padding: 10px;
            margin: 0 0 20px 0;
            background: #fff;
            border-left: 4px solid #dd3d36;
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

        #btn {
            background: #6054c2 none repeat scroll 0 0;
            fill: #6054c2;
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
    <script>
        function phonenumber(inputtxt) {
            var phoneno = /^\d{10}$/;
            if((inputtxt.value.match(phoneno))) 
            {
                    return true;
                } else {
                    alert("Inavalid mobile");
                    return false;
                }
            }
    </script>
</head>

<div class="page-header" style="padding: 40px; ">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 style="margin-bottom: 10px;">Your profile</h2>
            </div>
            <div class="col-12">
                <a href="../shivam/">Home</a>
                <a href="">profile</a>
            </div>
        </div>
    </div>
</div>


<div class="container">
    <section class="user_profile inner_pages" style="background-color: white;">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3" style="padding-right: 15px;">
                    <?php include('../shivam/include/sidebar.php'); ?>
                    <div class="col-md-6 col-sm-8 text">
                        <div class="profile_wrap">
                            <h5 class="uppercase underline text-bold">Genral Settings</h5>
                            <?php if ($msg) { ?>
                                <div class="succWrap">
                                    <strong>SUCCESS</strong>:
                                    <?php echo $msg; ?>
                                </div>
                                <?php }
                            $user_email = $_SESSION['user_login'];
                            $sql = "SELECT *, customer.reg_date FROM user  JOIN customer ON user.user_id =  customer.Useruser_id WHERE user.user_email ='$user_email'";
                            $res = mysqli_query($con, $sql);
                            if (mysqli_num_rows($res) > 0) {
                                while ($row = mysqli_fetch_assoc($res)) {
                                ?>
                                    <form method="post" name="profile" onSubmit="return phonenumber(document.profile.mobilenumber)">
                                        <div class="form-group">
                                            <label class="control-label">Reg Date : <?php echo $row['reg_date']; ?></label>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Full Name</label>
                                            <input class="form-control white_bg" name="fullname" value="<?php echo $row['user_name']; ?>" id="fullname" type="text" required>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Email Address</label>
                                            <input class="form-control white_bg" value="<?php echo $row['user_email']; ?>" name="emailid" id="email" type="email" required readonly>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Phone Number</label>
                                            <input class="form-control white_bg" name="mobilenumber" value="<?php echo $row['user_phone']; ?>" id="phone-number" type="text" required>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label">Your Address</label>
                                            <textarea class="form-control white_bg" name="address" rows="4"><?php echo $row['user_add']; ?></textarea>
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" name="updateprofile" id="btn" >Save Changes <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
                                        </div>
                                    </form>
                                    
                            <?php
                                }
                            }

                            ?>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>

</div>


<?php

require "../shivam/foter.php";  ?>