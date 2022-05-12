<?php
require "../shivam/lockscreen/connection.php";
require "../shivam/top.php";


if (isset($_POST['v-delete'])) {
    $v_id = $_POST['v_id'];
    $sql = "DELETE FROM vehicle WHERE rto_number='$v_id'";
    if (mysqli_query($con, $sql)) {
        echo "<script> location.href=' ../'; </script>";
    } else {
        echo "<script>alert('can not delete vehicle !');</script>";
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
    </style>
</head>



<div class="page-header" style="padding: 40px; ">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 style="margin-bottom: 10px;">Add vehicle</h2>
            </div>
            <div class="col-12">
                <a href="../shivam/">Home</a>
                <a href="">New vehicle</a>
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
                    <h5 class="uppercase underline">My vehicle </h5>
                    <a href="../shivam/new_vehicle.php">
                        <button type="submit" name="updateprofile" class="mybtn" id="btn">New vehicle <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>
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
                            $sql = "SELECT *,model.model_name ,maker.maker_name , car_type.name  FROM vehicle JOIN model ON vehicle.modelcar_model_id =  model.car_model_id JOIN maker ON maker.maker_id = model.Makermaker_id JOIN car_type ON car_type.car_type_id = maker.car_typecar_type_id WHERE vehicle.customer_id = $customer_id";
                            $appointment_res = mysqli_query($con, $sql);
                            if (mysqli_num_rows($appointment_res) > 0) {
                            ?>
                                <!--Table head-->
                                <thead>

                                    <tr>
                                        <th>#</th>
                                        <th>Vehicle RTO number</th>
                                        <th>chassis no</th>
                                        <th>Model</th>
                                        <th>type</th>
                                        <th>maker</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <!--Table head-->
                                <?php
                                $count = 1;
                                while ($row = mysqli_fetch_assoc($appointment_res)) {
                                ?>
                                    <!--Table body-->
                                    <tbody>
                                        <tr style="padding: 0px;">
                                            <th scope="row"><?php echo $count;
                                                            $count++; ?></th>
                                            <td><?php echo $row['rto_number']; ?></td>
                                            <td><?php echo $row['chassis_no']; ?></td>
                                            <td><?php echo $row['model_name']; ?></td>
                                            <td><?php echo $row['name']; ?></td>
                                            <td><?php echo $row['maker_name']; ?></td>
                                            <td>
                                                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                                    <input type="hidden" name="v_id" value="<?php echo $row['rto_number']; ?>">
                                                    <button type="submit" class="btn" name="v-delete" onclick="return confirm('Are you sure you want to delete vehicle?');">Delete</button>
                                                </form>
                                            </td>
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
require "../shivam/foter.php";
?>