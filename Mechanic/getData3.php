<?php


require_once "../lockscreen/connection.php";


// 
if (isset($_POST['new_jobcard_find'])) {
    
    $new_jobcard_find_param = mysqli_real_escape_string($con, $_POST['new_jobcard_find']);
    $new_jobcard_find_sql = "SELECT * , appointment.app_date,appointment.app_time,user.user_name, vehicle.rto_number, user.user_email,user.user_phone FROM job_card JOIN appointment on appointment.appointment_id = job_card.appointmentappointment_id JOIN customer on appointment.customercustomer_id = customer.customer_id JOIN user ON user.user_id = customer.Useruser_id JOIN vehicle ON customer.customer_id = vehicle.customer_id WHERE appointment.statusstatus_id = 2
     AND job_card.status = 0 and user.user_name LIKE '%$new_jobcard_find_param%'";
    $new_jobcard_find_query = mysqli_query($con, $new_jobcard_find_sql);
    $output = '';
    if (mysqli_num_rows($new_jobcard_find_query) > 0) {
      $output = '  <thead>
        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
        <th class="px-4 py-3">No</th>
        <th class="px-4 py-3">Customer Name</th>
                <th class="px-4 py-3">Phone</th>
                <th class="px-4 py-3">Date</th>
                <th class="px-4 py-3">Time</th>
                <th class="px-4 py-3">Vehicle RTO</th>
                <th class="px-4 py-3">Total Price</th>
                <th class="px-4 py-3">Edit</th>
        </tr>
      </thead>';
      $i = 1;
      while ($row = mysqli_fetch_assoc($new_jobcard_find_query)) {
        $id = $row['jobcard_id'];
  
        $output .= '
        <tr class="text-gray-700 dark:text-gray-400">
        <td class="px-4 py-3">
          <div class="flex items-center text-sm">
            <!-- Avatar with inset shadow -->
            <div>
  
              <p class="font-semibold">
              ' . $i  . '
              </p>
            </div>
          </div>
        </td>
        <td class="px-4 py-3 text-sm">
        ' . $row['user_name'] . '
        </td>
  
        <td class="px-4 py-3 text-sm">
        ' . $row['user_phone'] . '
        </td>
  
        <td class="px-4 py-3 text-sm">
        ' . $row['jobcard_date'] . '
        </td>
  
        <td class="px-4 py-3 text-sm">
        ' . $row['jobcard_time'] . '
        </td>
  
        <td class="px-4 py-3 text-sm">
        ' . $row['rto_number'] . '
        </td>
  
        <td class="px-4 py-3 text-sm">
        ' . $row['price'] . '
        </td>
  
        <td class="px-4 py-3">
          <div class="flex items-center space-x-4 text-sm">
            <button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
            <a href="updatejobcard.php?id=' . $id . '">
                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                </svg>
              </a>
            </button>
          </div>
        </td>
      </tr>';
        $i++;
      }
    } else {
      $output = '
  <tr>
    <td colspan="5" style="color:white"> No result found. </td>   
  </tr>';
    }
    echo $output;
  }
