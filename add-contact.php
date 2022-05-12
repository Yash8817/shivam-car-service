<?php



if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $uemail = $_POST['email'];
    $uphone = $_POST['subject'];
    $message = $_POST['message'];
    $status = 0;

    $sql = "INSERT INTO query(q_id,email,uphone,message,status) VALUES ('','$uemail','$uphone','$message','$status')";
    if (mysqli_query($con, $sql)) {
        echo 1;
    } else {
        echo 0;
    }
}


?>