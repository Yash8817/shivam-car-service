<?php
require "../shivam/lockscreen/connection.php";
require "../shivam/top.php";
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
    </style>
</head>

<div class="page-header" style="padding: 40px; ">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 style="margin-bottom: 10px;">My membership</h2>
            </div>
            <div class="col-12">
                <a href="../shivam/">Home</a>
                <a href="">my membership</a>
            </div>
        </div>
    </div>
</div>



<section class="user_profile inner_pages">
    <div class="row">
        <div class="col-md-3 col-sm-3">
            <?php include('../shivam/include/sidebar.php'); ?>

            <div class="col-md-6 col-sm-8">
                <div class="profile_wrap">
                    <h5 class="uppercase underline">My membership </h5>
                    <a href="../shivam/bestplan.php">
                        <button type="submit" name="updateprofile" class="mybtn" id="btn">New membership <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
                    </a>
                    <div class="my_vehicles_list">
                        <!--Table-->
                        <!-- fetching customer id -->
                        <?php
                        $email = $_SESSION['user_login'];
                        $fetch_cid = "SELECT customer.customer_id FROM customer JOIN user  on user.user_id = customer.Useruser_id WHERE user.user_email = '$email'";
                        if (mysqli_num_rows($res = mysqli_query($con, $fetch_cid)) > 0) {
                            $fetch_id = mysqli_fetch_assoc($res);
                            $customer_id = $fetch_id['customer_id'];
                        }

                        ?>
                        <!--  -->
                        <?php ?>
                        <table class="table table-hover table-fixed">
                            <?php
                            $sql = "SELECT m.start_date , m.end_date , md.mem_duration ,md.mem_desc ,md.Labour_discount,md.mem_name FROM membership  as m JOIN membership_details as md on md.mem_details_id = m.membership_details_id JOIN customer on customer.customer_id = m.customercustomer_id WHERE m.customercustomer_id =$customer_id";
                            $mem_res = mysqli_query($con, $sql);
                            if (mysqli_num_rows($mem_res) > 0) {
                            ?>
                                <!--Table head-->
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>description</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Duration</th>
                                    </tr>
                                </thead>
                                <!--Table head-->
                                <?php
                                $count = 1;
                                while ($row = mysqli_fetch_assoc($mem_res)) {
                                ?>
                                    <!--Table body-->
                                    <tbody>
                                        <tr>
                                            <th scope="row"><?php echo $count;
                                                            $count++; ?></th>
                                            <td><?php echo $row['mem_name']; ?></td>
                                            <td><?php echo $row['mem_desc']; ?></td>
                                            <td><?php echo $row['start_date']; ?></td>
                                            <td><?php echo $row['end_date']; ?></td>
                                            <td><?php echo $row['mem_duration']; ?></td>
                                        </tr>
                                    </tbody>
                                    <!--Table body-->
                                <?php  } ?>

                        
                        <!--Table-->
                    <?php

                            } else {
                    ?>

                        <tbody>
                            <tr>
                                <td colspan="6">No record found..</td>
                            </tr>
                        </tbody>
                    <?php
                            } ?>
                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>







<?php
require "../shivam/foter.php"; ?>