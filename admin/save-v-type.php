<?php
require_once "../lockscreen/connection.php";

if (isset($_POST['submit'])) {

    $maker = mysqli_real_escape_string($con, $_POST['maker-name']);
    $model = mysqli_real_escape_string($con, $_POST['maker-model']);
    $type = mysqli_real_escape_string($con, $_POST['maker-type']);

    $maker_check = "SELECT model.model_name , maker.maker_name FROM model  JOIN maker ON model.Makermaker_id = maker.maker_id WHERE maker.maker_name = '$maker'";

    $res = mysqli_query($con, $maker_check);
    if (mysqli_num_rows($res) > 0) {
        echo "<script language='javascript'>alert('type exist');</script>";
        echo "<script> location.href='../admin/add-v-type.php'; </script>";
    } else {
        
        $sql =" INSERT INTO car_type(car_type_id,name) VALUES ('','$type')";
        if (mysqli_query($con, $sql)) 
        {
            $get_type_id = "select * from car_type where name = '$type'";
            if(mysqli_num_rows($res = mysqli_query($con,$get_type_id))>0)
            {
                $fetch = mysqli_fetch_assoc($res);
                $type_id = $fetch['car_type_id'];
                $sql1 = "INSERT INTO maker(maker_id,maker_name,car_typecar_type_id) VALUES ('','$maker','$type_id')";
                if (mysqli_query($con, $sql1)) 
                {
                    $get_maker_id = "select * from maker where maker_name = '$maker'";
                    if(mysqli_num_rows($res1 = mysqli_query($con,$get_maker_id))>0)
                    {
                    $fetch1 = mysqli_fetch_assoc($res1);
                        $maker_id = $fetch1['maker_id'];
                        $sql2 ="INSERT INTO model(car_model_id,model_name,Makermaker_id) VALUES ('','$model','$maker_id')";
                        if( mysqli_query($con,$sql2))
                        {
                            echo "<script> location.href='../admin/v-type.php'; </script>";

                        }else
                        {
                            echo "<script language='javascript'>alert('Error while adding new model!');</script>";
                        }
                    }
                }
                else
                {
                    echo "<script language='javascript'>alert('Error while adding new maker!');</script>";
                }
            }
        } 
        else
        {
            echo "<script language='javascript'>alert('Error while adding new type!');</script>";
        }
    }
}

if (isset($_POST['cancel'])) {
    echo "<script> location.href='../admin/v-type.php'; </script>";
}
