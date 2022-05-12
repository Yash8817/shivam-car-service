<?php
require "../lockscreen/connection.php";
// session_start();
$j_id =  $_POST["Id"];

$sql = "SELECT * FROM servics  JOIN job_card_servics ON servics.service_id = job_card_servics.Servicsservice_id WHERE job_card_servics.Job_cardjobcard_id = $j_id ";
$result = mysqli_query($con, $sql) or die("SQL Query Failed.");
$output = "";
if (mysqli_num_rows($result) > 0) {
$output = '<table border="1" width="100%" cellspacing="0" cellpadding="10px">
              <tr class=" text-gray-500 font-semibold uppercase border-b ">
                <th  width="60px">Name</th>
                <th width="90px">price</th>
                </tr>
                ';
  while ($row = mysqli_fetch_assoc($result)) {
    $output .= "<tr class=' font-semibold text-gray-700 dark:text-gray-200'><td align='center'>{$row["service_name"]}</td> <td align='center'>{$row["service_price"]}</td>
    </tr>";
  }
  $output .= "<br></table>";
  mysqli_close($con);
  echo $output;
} else {
  echo "<h2 class='text-gray-700 dark:text-gray-400' >No service Found.</h2>";
}

// <th width="90px">update</th>
  // <td align='center'><button Class='delete-btn' data-id='{$row["service_id"]}'>Done</button></td>