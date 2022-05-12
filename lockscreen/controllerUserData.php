<?php
session_start();
require "connection.php";
$user_email = "";
$user_name = "";
$errors = array();


// admin login check
if (isset($_POST['admin-login'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $check_email = "SELECT * FROM user WHERE user_email = '$email'";
    $res = mysqli_query($con, $check_email);
    if (mysqli_num_rows($res) > 0) {
        $fetch = mysqli_fetch_assoc($res);
        $fetch_pass = $fetch['user_pass'];
        $fetch_id = $fetch['user_id'];
        $check_admin = "SELECT * FROM administrator WHERE Useruser_id = '$fetch_id'";
        $check_acess = mysqli_query($con, $check_admin);
        if (mysqli_num_rows($check_acess) > 0) {
            if ($password ==  $fetch_pass) {
                $_SESSION['admin_login'] = $email;
                header('location: ../admin/Dassboard.php');
            } else {
                $errors['admin_invalid_password'] = "Incorrect email or password!";
            }
        } else {
            $errors['not_admin'] = "It's look like you are not admin, you don't have access.";
        }
    } else {
        $errors['no_access'] = "It's look like you are not admin, you don't have access.";
    }
}




// admin attendee check
if (isset($_POST['admin-attendee'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $check_email = "SELECT * FROM user WHERE user_email = '$email'";
    $res = mysqli_query($con, $check_email);
    if (mysqli_num_rows($res) > 0) {
        $fetch = mysqli_fetch_assoc($res);
        $fetch_pass = $fetch['user_pass'];
        $fetch_id = $fetch['user_id'];
        $check_admin = "SELECT * FROM staff WHERE Useruser_id = '$fetch_id' and is_attendee = '1'";
        $check_acess = mysqli_query($con, $check_admin);
        if (mysqli_num_rows($check_acess) > 0) {
            if ($password ==  $fetch_pass) {
                $_SESSION['attendee_login'] = $email;
                header('location: ../Attendee/appointment.php');
            } else {
                $errors['attendee_invalid_password'] = "Incorrect email or password!";
            }
        } else {
            $errors['not_attendee'] = "It's look like you are not staff, you don't have access.";
        }
    } else {
        $errors['no_access'] = "It's look like you are not staff, you don't have access.";
    }
}





// admin mechanic check
if (isset($_POST['admin-mechanic'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $check_email = "SELECT * FROM user WHERE user_email = '$email'";
    $res = mysqli_query($con, $check_email);
    if (mysqli_num_rows($res) > 0) {
        $fetch = mysqli_fetch_assoc($res);
        $fetch_pass = $fetch['user_pass'];
        $fetch_id = $fetch['user_id'];
        $check_admin = "SELECT * FROM staff WHERE Useruser_id = '$fetch_id' and is_mechanic = '1'";
        $check_acess = mysqli_query($con, $check_admin);
        if (mysqli_num_rows($check_acess) > 0) {
            if ($password ==  $fetch_pass) {
                $_SESSION['mechanic_login'] = $email;
                header('location: ../mechanic/Newjobcard.php');
            } else {
                $errors['mechanic_invalid_password'] = "Incorrect email or password!";
            }
        } else {
            $errors['not_mechanic'] = "It's look like you are not staff, you don't have acces.";
        }
    } else {
        $errors['not_access'] = "It's look like you are not staff, you don't have access.";
    }
}

//if user click login button
if (isset($_POST['login'])) {

    $email = mysqli_real_escape_string($con, $_POST['email']);
    //echo $email;
    $password = mysqli_real_escape_string($con, $_POST['password']);
    //echo $password;
    $check_email = "SELECT * FROM user WHERE user_email = '$email'";
    $res = mysqli_query($con, $check_email);
    if (mysqli_num_rows($res) > 0) {
        $fetch = mysqli_fetch_assoc($res);
        $fetch_pass = $fetch['user_pass'];
        $fetch_id = $fetch['user_id'];
        $check_admin = "SELECT * FROM customer WHERE Useruser_id = '$fetch_id'";
        //echo $fetch_id;
        $check_acess = mysqli_query($con, $check_admin);

        if (mysqli_num_rows($check_acess) > 0) {
            if ($password ==  $fetch_pass) {
                $_SESSION['user_login'] = $email;
                header('location: ../index.php ');
            } else {
                $errors['email'] = "Incorrect email or password!";
            }
        } else {
            $errors['email'] = "It's look like you're not yet a member! Click on the bottom link to signup.";
        }
    } else {
        $errors['email'] = "It's look like you're not yet a member! Click on the bottom link to signup.";
    }
}

function validate_mobile($mobile)
{
    return preg_match('/^[6-9]\d{9}$/', $mobile);
}



//if user signup button
if (isset($_POST['signup'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $Unumber = mysqli_real_escape_string($con, $_POST['number']);
    $SecQues = mysqli_real_escape_string($con, $_POST['SecQuestion']);
    $SeqAns = mysqli_real_escape_string($con, $_POST['SecAnswer']);
    $company_id = 10;
    if ($password !== $cpassword) {
        $errors['password'] = "Confirm password not matched!";
    }
    if (!validate_mobile($Unumber)) {
        $errors['invalid_phone'] = "Invalid Phone number!";
    }
    if (strlen($password) <= '8') {
        $errors['passwordlength'] = "Your Password Must Contain At Least 8 Characters!";
    } elseif (!preg_match("#[A-Z]+#", $password)) {
        $errors['password_cap'] =  "Your Password Must Contain At Least 1 Capital Letter!";
    }

    $email_check = "SELECT * FROM user WHERE user_email = '$email'";
    $res = mysqli_query($con, $email_check);
    if (mysqli_num_rows($res) > 0) {
        $errors['email_exist'] = "Email that you have entered is already exist!";
    }
    $email_check = "SELECT * FROM user WHERE user_phone = '$Unumber'";
    $res = mysqli_query($con, $email_check);
    if (mysqli_num_rows($res) > 0) {
        $errors['email_exist'] = "Mobile number that you have entered is already exist!";
    }
    if (count($errors) === 0) {
        //  $encpass = password_hash($password, PASSWORD_BCRYPT);
        $insert_data = "INSERT INTO user( user_id , user_name,  user_pass, user_email, user_add,user_phone,user_sec_ques,user_sec_ans,companycompany_id)
        VALUES('','{$name}'  ,'{$password}', '{$email}','{$address}', '{$Unumber}', '{$SecQues}','{$SeqAns}' , '{$company_id}')";
        if (mysqli_query($con, $insert_data)) // if query run properly
        {
            $check_email = "SELECT * FROM user WHERE user_email = '$email'";
            $get_id = mysqli_query($con, $check_email);
            if (mysqli_num_rows($get_id) > 0) {
                $fetch = mysqli_fetch_assoc($get_id);
                $fetch_id = $fetch['user_id'];
                $date = date('Y-m-d');
                

                $sql = "INSERT INTO customer(customer_id, Useruser_id , reg_date) VALUES ('',{$fetch_id} , '{$date}')";
                if (mysqli_query($con, $sql)) // if query run properly
                {
                    $_SESSION['user_login'] = $email;
                    header('location:  ../index.php ');
                } else {
                    $errors['db-error'] = "Failed to create your account!";
                }
            }
        } else {
            $errors['db-error'] = "Failed while inserting data into database!";
        }
    }
}

//if user click continue button in forgot password form
if (isset($_POST['check-email'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $check_email = "SELECT * FROM user WHERE user_email='$email'";
    $_SESSION['email'] = $email;

    $res = mysqli_query($con, $check_email);
    if (mysqli_num_rows($res) > 0) {
        header('location: change-password.php');
    } else {
        $errors['db-error'] = "Email is not registred!";
    }
}



if (isset($_POST['update-password'])) {
    $email = $_SESSION['email']; //getting this email using session

    $sql = "SELECT * FROM user WHERE user_email='$email'";




    $sec_ans = mysqli_real_escape_string($con, $_POST['check-sec-ans']);
    echo $sec_ans;

    $rpassword = mysqli_real_escape_string($con, $_POST['rpassword']);
    $crpassword = mysqli_real_escape_string($con, $_POST['crpassword']);

    $ques_res = mysqli_query($con, $sql);
    if (mysqli_num_rows($ques_res) > 0) {
        $fetch_data = mysqli_fetch_assoc($ques_res);
        $fetch_code = $fetch_data['user_sec_ans'];

        $answer = $fetch_data['user_sec_ans'];
        echo $answer;
        if ($answer !== $sec_ans) {
            $errors['email'] = "This answer is not matched!";
        } else {
            if ($rpassword != $crpassword) {
                $errors['password'] = "Confirm password not matched!";
            } else {
                $update_pass = "UPDATE user SET user_pass = '$rpassword' WHERE user_email = '$email'";
                if (mysqli_query($con, $update_pass)) // if query run for update runs
                {
                    header('location: ../lockscreen/login-user.php');
                    $_SESSION['email'] = $email;
                } else {
                    $errors['db-error'] = "unable to change password!";
                }
            }
        }
    }
}







//if login now button click
if (isset($_POST['login-now'])) {
    header('Location: login-user.php');
}
