<?php
require "../shivam/lockscreen/connection.php";

$j_id = 1;

$pt = "SELECT sum(job_card_parts.price)  as PT FROM job_card_parts WHERE job_card_parts.Job_cardjobcard_id = $j_id";
if ($row1 = mysqli_query($con, $pt)) {
    $st_fetch = mysqli_fetch_assoc($row1);
    $ptf = $st_fetch['PT'];
    if (empty($ptf)) {
        $ptf = 0;
    }
    echo $ptf;
}
