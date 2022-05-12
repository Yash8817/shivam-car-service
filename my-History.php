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
                <h2 style="margin-bottom: 10px;">My History</h2>
            </div>
            <div class="col-12">
                <a href="../shivam/">Home</a>
                <a href="">my History</a>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-3 col-sm-3">
        <?php include('../shivam/include/sidebar.php'); ?>

        <div class="col-md-6 col-sm-8">
            <div class="profile_wrap">
                <h5 class="uppercase underline">My history </h5>
               
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
                        $sql = "SELECT * ,user.user_name , user.user_phone,vehicle.rto_number ,vehicle.chassis_no FROM job_card JOIN appointment ON appointment.appointment_id =job_card.appointmentappointment_id JOIN vehicle ON vehicle.rto_number = appointment.Vehicle_rto_number JOIN customer ON customer.customer_id = appointment.customercustomer_id JOIN user ON user.user_id = customer.Useruser_id WHERE appointment.statusstatus_id = 2 AND appointment.customercustomer_id = $customer_id ORDER BY `job_card`.`status`";

                        $jobcard_res = mysqli_query($con, $sql);
                        if (mysqli_num_rows($jobcard_res) > 0) {
                        ?>
                            <!--Table head-->
                            <thead>

                                <tr>
                                    <th>#</th>
                                    <th>Job card Date</th>
                                    <th>Vehicle RTO number</th>
                                    <th>chassis no</th>
                                    <th>Total amount</th>
                                    <th class="w">Job card</th>
                                </tr>
                            </thead>
                            <!--Table head-->
                            <?php
                            $count = 1;
                            while ($row = mysqli_fetch_assoc($jobcard_res)) {
                            ?>
                                <!--Table body-->
                                <tbody>
                                    <tr style="padding: 0px;">
                                        <th scope="row"><?php echo $count;$count++; ?></th>
                                        <td><?php echo $row['jobcard_date']; ?></td>
                                        <td><?php echo $row['rto_number']; ?></td>
                                        <td><?php echo $row['chassis_no']; ?></td>
                                        <td><?php echo $row['price']; ?></td>
                                        <td>
                                                <!-- view jobcard -->
                                                 <!-- view jobcard -->
                                                 <?php
                                                $sql1 = "SELECT * FROM job_card JOIN appointment  on appointment.appointment_id = job_card.appointmentappointment_id WHERE job_card.appointmentappointment_id = {$row['appointment_id']} ";
                                                if (mysqli_num_rows($res = mysqli_query($con, $sql1)) > 0) {
                                                    $fetch_jid = mysqli_fetch_assoc($res);
                                                    $jid = $fetch_jid['jobcard_id'];
                                                ?>
                                                    <div class="vehicle_status"> <a href="my-jobcard.php?jid=<?php echo $jid ?>" class="btn outline btn-xs">View</a>
                                                    <?php
                                                } else {
                                                    echo "Not created";
                                                }
                                                    ?>
                                            </td>
                                    </tr>
                                </tbody>
                                <!--Table body-->
                            <?php  } ?>

                    </table>
                    <!--Table-->
                <?php

                        } else {
                ?>

                    <div style="font-size: xx-large; color: red; ">No appointment found</div>
                <?php
                        } ?>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
require_once "../shivam/foter.php";
?>