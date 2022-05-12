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
                <h2 style="margin-bottom: 10px;">My appointment</h2>
            </div>
            <div class="col-12">
                <a href="../shivam/">Home</a>
                <a href="my-appointment.php">my appointment</a>
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
                    <h5 class="uppercase underline">My appointment </h5>
                </div>

                <div class="profile_wrap">
                    <?php
                    $a_id = $_GET['a_id'];
                    $sql = "SELECT appointment.* ,vehicle.rto_number,vehicle.chassis_no, model.model_name ,appointment.statusstatus_id  FROM appointment  JOIN vehicle ON appointment.Vehicle_rto_number = vehicle.rto_number JOIN model ON model.car_model_id = vehicle.modelcar_model_id  WHERE  appointment.appointment_id =$a_id";
                    $res = mysqli_query($con, $sql);
                    if (mysqli_num_rows($res) > 0) {
                        while ($row = mysqli_fetch_assoc($res)) {
                    ?>
                            <div class="form-group">
                                <label class="control-label">Appoiment Date : <?php echo $row['app_date']; ?></label>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Appoiment Time : <?php echo $row['app_time']; ?></label>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Vehicle RTO number</label>
                                <input class="form-control white_bg" name="fullname" value="<?php echo $row['Vehicle_rto_number']; ?>" id="fullname" type="text" required readonly>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Vehicle chassis no</label>
                                <input class="form-control white_bg" value=" <?php echo $row['chassis_no']; ?> " name="emailid" id="email" type="email" required readonly>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Model</label>
                                <input class="form-control white_bg" name="mobilenumber" value=" <?php echo $row['model_name']; ?> " id="phone-number" type="text" readonly>
                            </div>

                            <div class="form-group">
                                <label class="control-label">Appoiment status</label>
                                <input class="form-control white_bg" name="mobilenumber" value='
                                            <?php
                                            if ($row['statusstatus_id']  == 1) {
                                                echo "Not Confirm yet";
                                            } else if ($row['statusstatus_id']  == 2) {

                                                echo "Confirmed";
                                            } else if ($row['statusstatus_id']  == 3) {

                                                echo "Cancelled";
                                            }
                                            ?>
                                                ' id="phone-number" type="text" readonly>
                            </div>
                            <?php
                            $sql_check = "SELECT * FROM job_card WHERE job_card.appointmentappointment_id = $a_id";
                            if(mysqli_num_rows(mysqli_query($con,$sql_check)) == 0)
                            {
                                ?>
                            <div class="form-group">
                                <a href="cancel_appoiment.php?a_id=<?php echo $row['appointment_id']; ?> ">
                                    <button type="submit" name="Cancel_appoiment" id="btn" onclick=" return confirm('Are you sure you want to cancel appoiment?');">Cancel appoiment <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
                                </a>
                            </div>

                    <?php
                        }
                    }
                    }

                    ?>
                </div>


            </div>
        </div>
    </div>
</section>




<?php
require "../shivam/foter.php";
?>