<?php 


require "../lockscreen/connection.php";


if($_POST['type'] == "")
{
    $sql = "SELECT * FROM car_type";
    $qry  = mysqli_query($con , $sql) or die("cant not run sql");
    $srt = "";
    while($row = mysqli_fetch_assoc($qry))
    {
        $srt .= "<option value='{$row['car_type_id']}'>{$row['name']}</option>";
    }
    
}else if($_POST['type'] == "statedata")
{
    $sql = "SELECT * FROM maker where car_typecar_type_id = {$_POST['id']}";
    $qry  = mysqli_query($con , $sql) or die("cant not run sql");
    $srt = "";
    if(mysqli_num_rows($qry)>0)
    {
        while($row = mysqli_fetch_assoc($qry))
        {
            $srt .= "<option value='{$row['maker_id']}'>{$row['maker_name']}</option>";
        }
    }else
    {
        $srt .= "<option value=''>No maker found</option>";

    }
}

echo $srt;


?>