<?php
    require "../lockscreen/connection.php";
    $id = $_GET['id'];
    


       
    $sql2 = "SELECT * FROM parts AS p JOIN job_card_parts AS jp ON p.parts_id = jp.partsparts_id WHERE jp.partsparts_id={$id}";
    $res = mysqli_query($con , $sql2);
    if(mysqli_num_rows($res) > 0)
    {
        echo "<script>alert('part is exist in jobcard, can't delete it');</script>";
        echo "<script> location.href='  ../admin/parts.php'; </script>";

    }
    
    
        $sql = "SELECT * FROM parts AS p JOIN part_img AS pi ON p.parts_id = pi.partsparts_id WHERE pi.partsparts_id={$id}";
        $res = mysqli_query($con , $sql);
        if(mysqli_num_rows($res) > 0)
        {
            $sql1 = "DELETE FROM part_img WHERE part_img.partsparts_id = {$id}";
            if(!mysqli_query($con , $sql1))
            {
                die("error :delete parts img ");
            }
        }
     
        



    //delete image from folderr
    $qsl5 = " SELECT * FROM part_img WHERE part_img.partsparts_id = {$id}";
    $ress = mysqli_query($con , $qsl5) or die("failed");
    $fetch = mysqli_fetch_assoc($ress);
    unlink($fetch['part_img_path']);



   
    $sql4 = "DELETE FROM parts WHERE parts.parts_id = {$id}";
    
    
    
    if(mysqli_query($con , $sql4))
    {
        echo "<script> location.href='  ../admin/parts.php'; </script>";

    }
    else
    {
        echo "<script>alert('part is exist in jobcard, can't delete it');</script>";
    }
    
    
    ?>