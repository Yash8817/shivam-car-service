<?php
require_once "../lockscreen/connection.php";






if (isset($_POST['partName'])) {

    $Pname = mysqli_real_escape_string($con, $_POST['partName']);
    $name = trim(preg_replace('/[\t\n\r\s]+/', ' ', $Pname));

    $part_check = "SELECT * FROM parts WHERE part_name = '$name'";
    $response = "";
    if (mysqli_num_rows(mysqli_query($con, $part_check)) > 0) {
        $response = "<span style='color: red;'>part already exist.</span>";
    }
    echo $response;
    die;
}





if (isset($_POST['submit'])) {

    if (empty($_FILES['fileToUpload']['name'])) {
        $target = $_POST['old-image'];
    } else {
        $errors = array();

        $file_name = $_FILES['fileToUpload']['name'];
        $file_size = $_FILES['fileToUpload']['size'];
        $file_tmp = $_FILES['fileToUpload']['tmp_name'];
        $file_type = $_FILES['fileToUpload']['type'];
        $ext = explode('.', $file_name);
        $file_ext = end($ext);

        $extensions = array("jpeg", "jpg", "png");

        $new_name = time() . "-" . basename($file_name);
        $target = "Part-images/" . $new_name;

        move_uploaded_file($file_tmp, $target);
    }



    if (isset($_POST['part_id'])) {
        $id = ($_POST['part_id']);
        $name = $_POST["part-name"];
        // $name = trim(preg_replace('/[\t\n\r\s]+/', ' ', $Pname));
        $desc = $_POST["part-desc"];
        // $desc = trim(preg_replace('/[\t\n\r\s]+/', ' ', $Pdesc));


        $sql = "UPDATE  parts SET  part_name='$name',part_desc='$desc',
        part_price='{$_POST["price"]}',purchase_date='{$_POST["Pdate"]}',qty={$_POST["qty"]} 
         where parts_id = $id;";
        $sql .= "update part_img SET part_img_path =  '$target' WHERE partsparts_id =  $id";

        echo "<script language='javascript'>alert('$sql');</script>";
        if (mysqli_multi_query($con, $sql)) // if query run properly
        {
            header('location: parts.php');
        } else {
            echo "<script language='javascript'>alert('Error while updating parts!');</script>";
        }
    } else {
        $Pname = mysqli_real_escape_string($con, $_POST['part-name']);
        $name = trim(preg_replace('/[\t\n\r\s]+/', ' ', $Pname));
        $pdesc = mysqli_real_escape_string($con, $_POST['part-desc']);
        $desc = trim(preg_replace('/[\t\n\r\s]+/', ' ', $pdesc));
        $pdate = mysqli_real_escape_string($con, $_POST['Pdate']);
        $price = mysqli_real_escape_string($con, $_POST['price']);
        $qty = mysqli_real_escape_string($con, $_POST['qty']);

        $sql = "INSERT INTO parts(parts_id,part_name,part_desc,part_price,purchase_date,qty)
VALUES('','{$name}','{$desc}','{$price}','{$pdate}','{$qty}');";

        if (mysqli_query($con, $sql)) {
            $get_id = "SELECT * FROM parts WHERE part_name = '$name'";
            $result = mysqli_query($con, $get_id);
            if (mysqli_num_rows($result) > 0) {
                $fetch = mysqli_fetch_assoc($result);
                $fetch_id = $fetch['parts_id'];
                $sql1 = "INSERT INTO part_img(part_img_id, part_img_path, partsparts_id)
        VALUES('','{$target}','{$fetch_id}');";

                if (mysqli_query($con, $sql1)) {
                    header('location: ../admin/parts.php');
                } else {
                    // echo "<div class='alert alert-danger'> Failed.</div>";
                    echo "<script>alert('Error while inserting new part!');</script>";
                }
            }
        } else {
            echo "<script>alert('Error while inserting new part!');</script>";
        }
    }
}
if (isset($_POST['cancel'])) {
    header('location: ../admin/parts.php');
}
