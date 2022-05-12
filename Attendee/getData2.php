<?php


require_once "../lockscreen/connection.php";


// 
if (isset($_POST['new_appoiment_find'])) {
    
    $new_appoiment_find_param = mysqli_real_escape_string($con, $_POST['new_appoiment_find']);
    $new_appoiment_sql = "SELECT *, status.status,vehicle.rto_number,model.model_name , user.user_name ,user.user_phone FROM appointment JOIN status ON status.status_id = appointment.statusstatus_id JOIN vehicle ON vehicle.rto_number = appointment.Vehicle_rto_number
     JOIN model ON model.car_model_id = vehicle.modelcar_model_id JOIN customer ON customer.customer_id = appointment.customercustomer_id JOIN user ON user.user_id = customer.Useruser_id WHERE appointment.statusstatus_id = 1 
     AND user.user_name LIKE '%$new_appoiment_find_param%'";
    $new_appoiment_query = mysqli_query($con, $new_appoiment_sql);
    $output = '';
    if (mysqli_num_rows($new_appoiment_query) > 0) {
      $output = '  <thead>
        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
        <th class="px-4 py-3">No</th>
        <th class="px-4 py-3">Name</th>
        <th class="px-4 py-3">Phone</th>
        <th class="px-4 py-3">Appointment Date</th>
        <th class="px-4 py-3">Appointment Time</th>
        <th class="px-4 py-3">Vehicle RTO</th>
        <th class="px-4 py-3">Vehicle Type</th>
        <th class="px-4 py-3">Edit</th>
        </tr>
      </thead>';
      $i = 1;
      while ($row = mysqli_fetch_assoc($new_appoiment_query)) {
        $id = $row['appointment_id'];
  
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
        ' . $row['app_date'] . '
        </td>
  
        <td class="px-4 py-3 text-sm">
        ' . $row['app_time'] . '
        </td>
  
        <td class="px-4 py-3 text-sm">
        ' . $row['rto_number'] . '
        </td>
  
        <td class="px-4 py-3 text-sm">
        ' . $row['model_name'] . '
        </td>
  
        <td class="px-4 py-3">
          <div class="flex items-center space-x-4 text-sm">
            <button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
            <a href="update-appoiment.php?id=' . $id . '">
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



  // 
  
// 
if (isset($_POST['appoiment_find'])) {
    
  $appoiment_find_param = mysqli_real_escape_string($con, $_POST['appoiment_find']);
  $sid = mysqli_real_escape_string($con, $_POST['sid']);
  $appoiment_sql = "SELECT appointment.*, status.status,vehicle.rto_number,model.model_name , user.user_name ,user.user_phone FROM appointment 
  JOIN status ON status.status_id = appointment.statusstatus_id JOIN vehicle ON vehicle.rto_number = appointment.Vehicle_rto_number 
  JOIN model ON model.car_model_id = vehicle.modelcar_model_id JOIN customer ON customer.customer_id = appointment.customercustomer_id
   JOIN user ON user.user_id = customer.Useruser_id WHERE appointment.staffstaff_id = $sid and appointment.statusstatus_id = 2
   AND user.user_name LIKE '%$appoiment_find_param%'";

  $appoiment_query = mysqli_query($con, $appoiment_sql);
  $output = '';
  if (mysqli_num_rows($appoiment_query) > 0) {
    $output = '  <thead>
      <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
      <th class="px-4 py-3">Name</th>
      <th class="px-4 py-3">Phone</th>
      <th class="px-4 py-3">Appointment Date</th>
      <th class="px-4 py-3">Appointment Time</th>
      <th class="px-4 py-3">Vehicle RTO</th>
      <th class="px-4 py-3">Vehicle Type</th>
      <th class="px-4 py-3">Edit</th>
      <th class="px-4 py-3">Create <br>job card</th>
      </tr>
    </thead>';
    $i = 1;
    while ($row = mysqli_fetch_assoc($appoiment_query)) {
      $aid = $row['appointment_id'];

      $output .= '
      <tr class="text-gray-700 dark:text-gray-400">

      <td class="px-4 py-3 text-sm">
      ' . $row['user_name'] . '
      </td>

      <td class="px-4 py-3 text-sm">
      ' . $row['user_phone'] . '
      </td>

      <td class="px-4 py-3 text-sm">
      ' . $row['app_date'] . '
      </td>

      <td class="px-4 py-3 text-sm">
      ' . $row['app_time'] . '
      </td>

      <td class="px-4 py-3 text-sm">
      ' . $row['rto_number'] . '
      </td>

      <td class="px-4 py-3 text-sm">
      ' . $row['model_name'] . '
      </td>

      <td class="px-4 py-3">
        <div class="flex items-center space-x-4 text-sm">
          <button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
          <a href="update-appoiment.php?id=' . $aid . '">
              <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
              </svg>
            </a>
          </button>
        </div>
      </td>
      <td class="px-4 py-3">
        <div class="flex items-center space-x-4 text-sm">
          <button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
          <a href="addjobcard.php?id=' . $aid . '">
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


// 


// 
if (isset($_POST['jobcard_find'])) {
    
  $jobcard_param = mysqli_real_escape_string($con, $_POST['jobcard_find']);
  $sid = mysqli_real_escape_string($con, $_POST['sid']);
  $jobcard_sql = "SELECT * ,user.user_name , user.user_phone,vehicle.rto_number FROM job_card JOIN appointment ON appointment.appointment_id =job_card.appointmentappointment_id JOIN vehicle ON vehicle.rto_number = appointment.Vehicle_rto_number JOIN customer ON customer.customer_id = appointment.customercustomer_id JOIN user ON user.user_id = customer.Useruser_id WHERE appointment.statusstatus_id = 2  AND appointment.staffstaff_id  = $sid
   AND user.user_name LIKE '%$jobcard_param%'";

  $jobcard_query = mysqli_query($con, $jobcard_sql);
  $output = '';
  if (mysqli_num_rows($jobcard_query) > 0) {
    $output = '  <thead>
      <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
      <th class="px-4 py-3">Jobcard ID</th>
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
    while ($row = mysqli_fetch_assoc($jobcard_query)) {
      $aid = $row['appointment_id'];

      $output .= '
      <tr class="text-gray-700 dark:text-gray-400">

      <td class="px-4 py-3 text-sm">
      ' . $row['jobcard_id'] . '
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
          <a href="addjobcard.php?id=' . $aid . '">
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


