<?php
    require "../lockscreen/connection.php";
    if(isset($_GET['update-id']))
    {
         $Sql1 = "select *  from servics where service_id ={$_GET["update-id"]};";
        $res = mysqli_query($con , $Sql1);
        if(mysqli_num_rows($res)>0)
        {
            
            $fetch = mysqli_fetch_assoc($res);
            $status = $fetch['is_active'];
            
            if($status == 0 )
            {
                $status = 1;
            }
            else
            {
                $status = 0;
            }
            $sql = "UPDATE servics SET is_active='{$status}' WHERE service_id={$_GET["update-id"]};";
        
            $result = mysqli_query($con,$sql);
            if($result){
                header('location: ../admin/service.php');
            }else{
            echo "Query Failed";
            echo "<script language='javascript'>alert('Error while update service , try again!!!');</script>";
            echo "<script> location.href='../admin/service.php'; </script>";
            }
        }
    }
    if($_POST["type"] == 0)
    {
        $is_active = 1;
    }
    else
    {
        $is_active = 0;
    }
    $text_to_clean_up = $_POST["service-name"];
    $service_name = trim(preg_replace('/[\t\n\r\s]+/', ' ', $text_to_clean_up));
    $text_to_clean_up1 = $_POST["service-desc"];
    $service_desc = trim(preg_replace('/[\t\n\r\s]+/', ' ', $text_to_clean_up1));
    $sql = "UPDATE servics SET service_name='$service_name',service_desc='$service_desc',service_price={$_POST["service-price"]},
    is_active='{$is_active}' WHERE service_id={$_POST["service_id"]};";

    $result = mysqli_query($con,$sql);
    if($result){
        header('location: ../admin/service.php');
    }else{
    echo "Query Failed";
    }
?>