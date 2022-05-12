<?php
require "../shivam/lockscreen/connection.php";
require "../shivam/top.php";
?>


<head>
    <style>
        select {
            width: 513px;
            padding: 5px 35px 5px 5px;
            font-size: 16px;
            border: 1px solid #CCC;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            padding: 10px;
            background-repeat: no-repeat;
            background-image: linear-gradient(45deg, transparent 50%, currentColor 50%), linear-gradient(135deg, currentColor 50%, transparent 50%);
            background-position: right 15px top 1em, right 10px top 1em;
            background-size: 5px 5px, 5px 5px;

        }

        #regForm {
            margin: 10px auto;
            width: 70%;
            min-width: 300px;
        }

        input {
            padding: 10px;
            width: 100%;
            border: 1px solid #aaaaaa;
        }

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
    <script  type="text/javascript">
        function check_select() {
            // var first_select = $("#county").val();
            // var second_select = $("#state").val();
            // var third_select = $("#area").val();


            var first_select = document.getElementById("county");
            var first_optionSelIndex = first_select.options[first_select.selectedIndex].value;

            var second_select = document.getElementById("state");
            var second_optionSelIndex = second_select.options[second_select.selectedIndex].value;

            var third_select = document.getElementById("area");
            var third_optionSelIndex = third_select.options[third_select.selectedIndex].value;

            if (first_optionSelIndex == 0 || second_optionSelIndex == 0 || third_optionSelIndex == 0) {
                alert("Select All Fields");
                return false;
            } else {
                return true;
            }
        }
    </script>
</head>



<div class="page-header" style="padding: 40px; ">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 style="margin-bottom: 10px;">New vihicle</h2>
            </div>
            <div class="col-12">
                <a href="../shivam/">Home</a>
                <a href="">New vihicle</a>
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
                    <h5 class="uppercase underline">add vehicle </h5>

                    <div class="my_vehicles_list">
                        <form id="regForm" action="add-new-vehicle.php" method="POST" onSubmit="return check_select()">

                            <div class="add_vehicle">
                                <!-- <form action="add-vehicle.php" method="POST"> -->
                                <label for="v_RTO">RTO number</label>
                                <p><input id="v_RTO" oninput="this.className = ''" name="v_RTO" required maxlength="10"></p>
                                <div id="uname_response"></div>

                                <label for="v_chassis">Chassic number</label>
                                <p><input id="v_chassis" oninput="this.className = ''" name="v_chassis" required maxlength="17"></p>

                                <label for="v_model">Model name</label>

                                <lable for="type" style="margin-right: 20px;">Car type</lable>

                                <select id="county" name="type required">
                                    <option value="0">select type</option>
                                </select>
                                <br>
                                <br>

                                <lable for="maker" style="margin-right: 92px;">Car maker</lable>
                                <select id="state" name="maker">
                                    <option value="0" disabled selected>select type first </option>
                                </select>
                                <br>
                                <br>
                                <lable for="v_model" style="margin-right: 92px; margin-bottom: 20px; margin-top: 20px;">Car model</lable>
                                <select id="area" name="v_model">
                                    <option value="0" selected disabled>select maker first</option>
                                </select>
                                <br>
                                <br>
                                <!-- select color -->
                                <label for="v_color" style="margin-right: 125px;">Color</label>
                                <?php
                                $sql1 = "SELECT * FROM veh_color";
                                $res1 = mysqli_query($con, $sql1);
                                if (mysqli_num_rows($res1) > 0) {
                                ?>
                                    <select name="v_color" id="v-type" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" oninput="this.className ='' ">
                                        <option value="0" selected disabled>select color</option>
                                        <?php
                                        while ($row2 = mysqli_fetch_assoc($res1)) {
                                            echo "<option value='{$row2['veh_color_id']}'>{$row2['color_name']}</option>";
                                        }
                                        ?>
                                    </select>
                                <?php
                                }
                                ?>
                                <br>

                            </div>


                            <!-- fetching customer id -->
                            <?php
                            $email = $_SESSION['user_login'];
                            $fetch_cid = "SELECT customer.customer_id FROM customer JOIN user  on user.user_id = customer.Useruser_id WHERE user.user_email = '$email'";
                            if (mysqli_num_rows($res = mysqli_query($con, $fetch_cid)) > 0) {
                                $fetch_id = mysqli_fetch_assoc($res);
                                $customer_id = $fetch_id['customer_id'];
                            }

                            ?>
                            <br>

                            <input type="hidden" name="c_id" id="c_id" value="<?php echo $customer_id ?>">
                            <button type="submit" name="add_new_vehicle" class="mybtn" id="btn">New vehicle <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<?php
require "../shivam/foter.php";

?>
<script>
    $(document).ready(function() {

        $("#v_RTO").keyup(function() {

            var username = $(this).val().trim();
            var c_id = $("#c_id").val();


            if (username != '') {

                $.ajax({
                    url: 'check_v_no_ajx.php',
                    type: 'post',
                    data: {
                        username: username,
                        cid: c_id
                    },
                    success: function(response) {

                        $('#uname_response').html(response);

                    }
                });
            } else {
                $("#uname_response").html("");
            }

        });

    });
</script>




<script>
    $(document).ready(function() {
        function LoadData(type, cat_id) {
            $.ajax({
                url: "load-type.php",
                type: "POST",
                data: {
                    type: type,
                    id: cat_id
                },
                success: function(data) {
                    if (type == "statedata") {
                        $("#state").html(data);
                    } else if (type == "area") {
                        $("#area").html(data);
                    } else {
                        $("#county").append(data);
                    }
                }
            });
        }
        LoadData();

        $("#county").on("change", function() {

            var county = $("#county").val();

            if (county != "") {
                LoadData("statedata", county);
            } else {

                $("#state").html("<option selected disabled>select type first  </option>");
                $("#area").html("<option selected disabled>select maker first </option>");
            }


        });


        $("#state").on("change", function() {

            var state = $("#state").val();


            if (state != "") {
                LoadData("area", state);
            } else {
                $("#area").html("");
            }



        });

    });
</script>