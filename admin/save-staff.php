<?php
require_once "../lockscreen/connection.php";
$errors = array();


if (isset($_POST['submit'])) {
    if (isset($_POST['staff-id'])) {
        $Sname = $_POST["staff-name"];
        $name = trim(preg_replace('/[\t\n\r\s]+/', ' ', $Sname));


        $sql = "UPDATE  user SET user_name='$name',user_email='{$_POST["email"]}',
        user_phone='{$_POST["staff-phone"]}' WHERE user_id={$_POST["user_id"]};";

        if (mysqli_query($con, $sql)) {
            $staf_type = mysqli_real_escape_string($con, $_POST['type']);
            if ($staf_type == 0) {
                $is_mechanic = 0;
                $is_attendee = 1;
            } else {
                $is_mechanic = 1;
                $is_attendee = 0;
            }

            $desc = $_POST["staff-desc"];
            $descrition = trim(preg_replace('/[\t\n\r\s]+/', ' ', $desc));

            $sql1 = "UPDATE  staff SET job_desc='$descrition',hire_date='{$_POST["join-date"]}',
            salary='{$_POST["staff-salary"]}',is_mechanic='$is_mechanic',is_attendee='$is_attendee'
             WHERE staff_id={$_POST["staff-id"]};";
            if (mysqli_query($con, $sql1)) // if query run properly
            {
                header('location: staff.php');
            } else {
                // echo "<div class='alert alert-danger'>failed while creating staff</div>";
                echo "<script language='javascript'>alert('Error while inserting new staff!');</script>";
            }
        } else {
            echo "<script language='javascript'>alert('Error while inserting new staff!');</script>";
            // echo "<div class='alert alert-danger'>Query Failed.</div>";
        }
    }
    if (!isset($_POST['staff-id'])) {
        $checkemail = mysqli_real_escape_string($con, $_POST['email']);

        $email_check = "SELECT * FROM user WHERE user_email = '$checkemail'";
        $res = mysqli_query($con, $email_check);
        if (mysqli_num_rows($res) > 0) {
            echo "<script>alert('Staff exist');</script>";
            echo "<script> location.href='../admin/add-staff.php'; </script>";
        } else {
            // echo "yash";
            $SFname = mysqli_real_escape_string($con, $_POST['staff-name']);
            $name = trim(preg_replace('/[\t\n\r\s]+/', ' ', $SFname));
            $phone = mysqli_real_escape_string($con, $_POST['staff-phone']);
            $desc = mysqli_real_escape_string($con, $_POST['staff-desc']);
            $join_date = mysqli_real_escape_string($con, $_POST['join-date']);
            $salary = mysqli_real_escape_string($con, $_POST['staff-salary']);
            $staf_type = mysqli_real_escape_string($con, $_POST['type']);
            $email = mysqli_real_escape_string($con, $_POST['email']);
            $password = mysqli_real_escape_string($con, $_POST['password']);
            $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
            $company_id = 10;
            if ($staf_type == 0) {
                $is_mechanic = 0;
                $is_attendee = 1;
            } else {
                $is_mechanic = 1;
                $is_attendee = 0;
            }
            $insert_data = "INSERT INTO user( user_id , user_name,  user_pass, user_email,user_phone,companycompany_id)
                    VALUES ('','$name'  ,'{$password}', '{$email}','{$phone}','{$company_id}')";
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
    }
}

if (isset($_POST['cancel'])) {
    header('location: staff.php');
}
