<?php 


require "../shivam/lockscreen/connection.php";




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
    while($row = mysqli_fetch_assoc($qry))
    {
        $srt .= "<option value='{$row['maker_id']}'>{$row['maker_name']}</option>";
    }
}else if($_POST['type'] == "area")
{
    $sql = "SELECT * FROM model where Makermaker_id = {$_POST['id']}";
    $qry  = mysqli_query($con , $sql) or die("cant not run sql");
    $srt = "";
    while($row = mysqli_fetch_assoc($qry))
    {
        $srt .= "<option value='{$row['car_model_id']}'>{$row['model_name']}</option>";
    }
}

echo $srt;


?>