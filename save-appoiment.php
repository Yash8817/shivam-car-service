<?php

require "../shivam/lockscreen/connection.php";


if (isset($_POST['submit'])) {

    $user_name = mysqli_real_escape_string($con, $_POST['user_name']);
    $name = trim(preg_replace('/[\t\n\r\s]+/', ' ', $user_name));
    $phone = mysqli_real_escape_string($con, $_POST['staff-phone']);
    $user_phone = mysqli_real_escape_string($con, $_POST['user_phone']);
    $user_email = mysqli_real_escape_string($con, $_POST['user_email']);
    $user_add = mysqli_real_escape_string($con, $_POST['user_add']);
    $app_date = mysqli_real_escape_string($con, $_POST['app_date']);
    $app_time = mysqli_real_escape_string($con, $_POST['app_time']);
    $v_brand = mysqli_real_escape_string($con, $_POST['v_brand']);
    $v_model = mysqli_real_escape_string($con, $_POST['v_model']);
    $v_type = mysqli_real_escape_string($con, $_POST['v_type']);
    $V_rto = mysqli_real_escape_string($con, $_POST['V_rto']);
    $v_chassis = mysqli_real_escape_string($con, $_POST['v_chassis']);
    $v_color = mysqli_real_escape_string($con, $_POST['v_color']);


    $insert_data = "INSERT INTO user( user_id , user_name,  user_pass, user_email,user_phone,companycompany_id)
            VALUES ('','$name'  ,'', '{$email}','{$phone}','{$company_id}')";
    if ($res = mysqli_query($con, $insert_data)) // if query run properly
    {
        $check_email = "SELECT * FROM user WHERE user_email = '$email'";
        $get_id = mysqli_query($con, $check_email);
        if (mysqli_num_rows($get_id) > 0) {
            $fetch = mysqli_fetch_assoc($get_id);
            $fetch_id = $fetch['user_id'];
            $sql = "INSERT INTO staff(staff_id,Useruser_id,job_desc,hire_date,salary,is_mechanic,is_attendee)
                    VALUES ('',{$fetch_id},'{$desc}','{$join_date}','{$salary}','{$is_mechanic}','{$is_attendee}')";
            if (mysqli_query($con, $sql)) // if query run properly
            {
                header('location: staff.php');
            } else {
                echo "<script>alert('Error while updating staff...');</script>";
                // echo "<div class='alert alert-danger'>failed while creating staff</div>";
            }
        }
    }
}



?>