<?php
require "../lockscreen/connection.php";
// session_start();
$j_id =  $_POST["Id"]; ;
$sql = "SELECT * ,  job_card_parts.part_used_qty FROM parts  JOIN job_card_parts ON  parts.parts_id =job_card_parts.partsparts_id WHERE job_card_parts.Job_cardjobcard_id = $j_id";
$result = mysqli_query($con, $sql) or die("SQL Query Failed.");
$output = "";
if(mysqli_num_rows($result) > 0 ){
  $output = '<table border="1" width="100%" cellspacing="0" cellpadding="10px">
              <tr class=" text-gray-500 font-semibold uppercase border-b ">
                <th width="60px">Name</th>
                <th width="90px">price</th>
                <th width="90px">quantity</th>
                </tr>';
                while($row = mysqli_fetch_assoc($result)){
                $output .= "<tr  class=' font-semibold text-gray-700 dark:text-gray-200'><td align='center'>{$row["part_name"]}</td> <td align='center'>{$row["part_price"]}</td>  <td align='center'>{$row["part_used_qty"]}</td> 
                </tr>";
              }
    $output .= "</table>";
    mysqli_close($con);
    echo $output;
  }else{
    echo "<h2 class='text-gray-700 dark:text-gray-400'> <br>No parts Found.</h2>";
  }
  ?>

<!-- <th width="90px">Delete</th> -->
  <!-- <td align='center'><button Class='delete-btn2' data-id='{$row["parts_id"]}'>Delete</button></td> -->