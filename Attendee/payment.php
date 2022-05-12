<?php require "sidebar2.php";
require "../lockscreen/connection.php";


$staff_email = $_SESSION['attendee_login'];
$sql_atnf = "SELECT * FROM user JOIN staff ON staff.Useruser_id = user.user_id WHERE user.user_email = '$staff_email'";
$staff_res = mysqli_query($con, $sql_atnf);
if (mysqli_num_rows($staff_res) > 0) {
  $staff_ary = mysqli_fetch_assoc($staff_res);
  $staff_id = $staff_ary['staff_id'];
}

?>

<main class="h-full overflow-y-auto">
  <div class="container grid px-6 mx-auto">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
      Job card
    </h2>


    <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
      <div class="w-full overflow-x-auto">
        <!-- php  -->
        <?php
        $limit = 7;
        if (isset($_GET['page'])) {
          $page = $_GET['page'];
        } else {
          $page = 1;
        }
        $offset = ($page - 1) * $limit;
        $sql = "SELECT * ,user.user_name , user.user_phone,vehicle.rto_number FROM job_card JOIN appointment ON appointment.appointment_id =job_card.appointmentappointment_id JOIN vehicle ON vehicle.rto_number = appointment.Vehicle_rto_number JOIN customer ON customer.customer_id = appointment.customercustomer_id JOIN user ON user.user_id = customer.Useruser_id WHERE appointment.statusstatus_id = 2  AND appointment.staffstaff_id  = $staff_id AND job_card.complete = 0 and job_card.status = 1 \n"
          . "ORDER BY `job_card`.`status` ASC LIMIT {$offset},{$limit}";

        $res = mysqli_query($con, $sql)  or die("quary failed");

        if (mysqli_num_rows($res) > 0) {
        ?>
          <!-- /php  -->
          <table class="w-full whitespace-no-wrap" id="tbl_body">
            
            <thead>
              <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                <th class="px-4 py-3">Jobcard ID</th>
                <th class="px-4 py-3">Customer Name</th>
                <th class="px-4 py-3">Phone</th>
                <th class="px-4 py-3">Date</th>
                <th class="px-4 py-3">Time</th>
                <th class="px-4 py-3">Vehicle RTO</th>
                <th class="px-4 py-3">Total Price</th>
                <th class="px-4 py-3">Status</th>
                <th class="px-4 py-3">Edit</th>
              </tr>
            </thead>
            <?php
            while ($row =  mysqli_fetch_array($res)) {
            ?>
              <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">




                <tr class="text-gray-700 dark:text-gray-400">
                  <td class="px-4 py-3 text-sm">
                    <?php echo $row['jobcard_id']; ?>
                  </td>
                  <td class="px-4 py-3 text-sm">
                    <?php echo $row['user_name']; ?>
                  </td>
                  <td class="px-4 py-3 text-sm">
                    <?php echo $row['user_phone']; ?>
                  </td>
                  <td class="px-4 py-3 text-sm">
                    <?php echo $row['jobcard_date']; ?>
                  </td>
                  <td class="px-4 py-3 text-sm">
                    <?php echo $row['jobcard_time']; ?>
                  </td>

                  <td class="px-4 py-3 text-sm">
                    <?php echo $row['rto_number']; ?>
                  </td>

                  <td class="px-4 py-3 text-sm">
                    <?php echo $row['price']; ?>
                  </td>
                  <td class="px-4 py-3 text-xs">
                    <?php
                    $status  = $row['status'];
                    if ($status == 1) {
                      $c1 = "text-green-700 bg-green-100";
                      $c2 = "dark:text-green-100 dark:bg-green-700";
                    } else {
                      $c1 = "text-red-700 bg-red-100";
                      $c2 = "dark:text-red-100 dark:bg-red-700";
                    }
                    ?>
                    <span class="px-2 py-1 font-semibold leading-tight <?php echo $c1; ?> rounded-full <?php echo $c2; ?>">
                      <?php
                      $status  = $row['status'];
                      if ($status == 1) {
                        echo " Done";
                      } else {
                        echo "Pending";
                      }
                      ?>
                  </td>

                  <td class="px-4 py-3">
                    <div class="flex items-center space-x-4 text-sm">
                      <button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
                        <a href="generate_bill.php?id=<?php echo $row['jobcard_id']; ?>">
                          <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                          </svg>
                        </a>
                      </button>
                    </div>
                  </td>
                </tr>
              </tbody>
            <?php } ?>
          </table>
      </div>
    <?php } ?>
    <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
      <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end" id="pagination">
        <?php
        // show pagination
        $sql1 = "SELECT * ,user.user_name , user.user_phone,vehicle.rto_number FROM job_card JOIN appointment ON appointment.appointment_id =job_card.appointmentappointment_id JOIN vehicle ON vehicle.rto_number = appointment.Vehicle_rto_number JOIN customer ON customer.customer_id = appointment.customercustomer_id JOIN user ON user.user_id = customer.Useruser_id WHERE appointment.statusstatus_id = 2  AND appointment.staffstaff_id  = $staff_id ";
        $result1 = mysqli_query($con, $sql1) or die("Query Failed.");

        if (mysqli_num_rows($result1) > 0) {

          $total_records = mysqli_num_rows($result1);

          $total_page = ceil($total_records / $limit);


          echo '<ul class="inline-flex items-center">';
          if ($page > 1) {
            echo '<li><a href="payment.php?page=' . ($page - 1) . '">Prev&nbsp;</a></li>' . "  ";
          }
          for ($i = 1; $i <= $total_page; $i++) {
            if ($i == $page) {
              $active = "active";
            } else {
              $active = "";
            }
            echo '<li class="' . $active . ' "> &nbsp; <a href="payment.php?page=' . $i . '">' . $i  . '&nbsp;</a></li>';
          }
          if ($total_page > $page) {
            echo '<li><a href="payment.php?page=' . ($page + 1) . '">&nbsp;Next</a></li>';
          }

          echo '</ul>';
        }
        ?>
      </span>
    </div>
    </div>
</main>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $(document).on("keyup", "#jobcard_find", function() {
        var jobcard_find = $("#jobcard_find").val();
        $.ajax({
            url: 'getData2.php',
            type: 'POST',
            data: {
              jobcard_find: jobcard_find  ,sid : <?php echo $staff_id?>
            },
            success: function(data) {
                $("#tbl_body").html(data);
                $("#pagination").hide();

            }
        });
    });
</script>