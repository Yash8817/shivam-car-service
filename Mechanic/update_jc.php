<?php 


require "../lockscreen/connection.php" ;

if(isset($_POST['submit']))
{
    $date = date('Y-m-d  ');
    $jid = mysqli_real_escape_string($con, $_POST['jobcardId']);
    $sql = "UPDATE  job_card_servics SET status = 1  WHERE Job_cardjobcard_id = $jid;";
    $sql .= "UPDATE  job_card_parts SET status = 1  WHERE Job_cardjobcard_id = $jid;";
    $sql = "UPDATE  job_card SET status = 1 , completed_date = '$date' WHERE jobcard_id = $jid";
    
    if(mysqli_multi_query($con,$sql))
    {
        echo "<script> location.href='../mechanic/jobcard.php'; </script>";
    }
    else
    {
        echo "loca";
    }
}

if(isset($_POST['Cancel']))
{
    echo "<script> location.href='../mechanic/jobcard.php'; </script>";
}



?>