<?php


require_once "../lockscreen/connection.php";


if (isset($_POST['service_find'])) {
  $search_param = mysqli_real_escape_string($con, $_POST['service_find']);
  $seach_sql = "SELECT *  FROM servics  WHERE servics.service_name like '%$search_param %' order by servics.service_id ";
  $search_query = mysqli_query($con, $seach_sql);
  $output = '';
  if (mysqli_num_rows(mysqli_query($con, $seach_sql)) > 0) {
    $output = '  <thead>
        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
          <th class="px-4 py-3">Service Name</th>
          <th class="px-4 py-3">Description</th>
          <th class="px-4 py-3">price</th>
          <th class="px-4 py-3">Is Active</th>
          <th class="px-4 py-3">Edit</th>
        </tr>
      </thead>';
    while ($row = mysqli_fetch_assoc($search_query)) {
      $id = $row['service_id'];

      $output .= '
        <tr class="text-gray-700 dark:text-gray-400">
        <td class="px-4 py-3">
          <div class="flex items-center text-sm">
            <!-- Avatar with inset shadow -->
            <div>

              <p class="font-semibold">
              ' . $row['service_name'] . '
              </p>
            </div>
          </div>
        </td>
        <td class="px-4 py-3 text-sm">
        ' . $row['service_desc'] . '
        </td>
        <td class="px-4 py-3 text-sm">
        ' . $row['service_price'] . '
        </td>
        <td class="px-4 py-3 text-xs">

        <div class="flex items-center space-x-4 text-sm">
            <button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
            <a href="update-service.php?id=' . $id . '">
                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                </svg>
              </a>
            </button>
          </a>
        </td>
        <td class="px-4 py-3">
          <div class="flex items-center space-x-4 text-sm">
            <button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
            <a href="update-service.php?id=' . $id . '">
                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                  <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                </svg>
              </a>
            </button>

            <button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Delete" onclick="return confirm("Are you sure you want to delete service?");">
            <a href="update-service.php?id=' . $id . '">
                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                </svg>
              </a>
            </button>
          </div>
        </td>
      </tr>';
    }
  } else {
    $output = '
  <tr>
    <td colspan="5"> No result found. </td>   
  </tr>';
  }
  echo $output;
}



// 
if (isset($_POST['part_find'])) {
  $part_param = mysqli_real_escape_string($con, $_POST['part_find']);
  $part_sql = "SELECT * ,part_img.part_img_path FROM parts JOIN part_img ON parts.parts_id = part_img.partsparts_id  WHERE parts.part_name LIKE '%$part_param%'";
  $part_query = mysqli_query($con, $part_sql);
  $output = '';
  if (mysqli_num_rows($part_query) > 0) {
    $output = '  <thead>
      <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
      <th class="px-4 py-3">Part name</th>
      <th class="px-4 py-3">Description</th>
      <th class="px-4 py-3">Purchase date</th>
      <th class="px-4 py-3">Quantity</th>
      <th class="px-4 py-3">Price</th>
      <th class="px-4 py-3">Edit</th>
      </tr>
    </thead>';
    while ($row = mysqli_fetch_assoc($part_query)) {
      $id = $row['parts_id'];

      $output .= '
      <tr class="text-gray-700 dark:text-gray-400">
      <td class="px-4 py-3">
        <div class="flex items-center text-sm">
          <!-- Avatar with inset shadow -->
          <div>

            <p class="font-semibold">
            ' . $row['part_name'] . '
            </p>
          </div>
        </div>
      </td>
      <td class="px-4 py-3 text-sm">
      ' . substr($row['part_desc'], 0, 50)  . '
      </td>
      <td class="px-4 py-3 text-sm">
      ' . $row['purchase_date'] . '
      </td>
      <td class="px-4 py-3 text-sm">
      ' . $row['qty'] . '
      </td>
      <td class="px-4 py-3 text-sm">
      ' . $row['part_price'] . '
      </td>
      <td class="px-4 py-3">
        <div class="flex items-center space-x-4 text-sm">
          <button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
          <a href="add-part.php?id=' . $id . '">
              <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
              </svg>
            </a>
          </button>

          <button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Delete" onclick="return confirm("Are you sure you want to delete service?");">
          <a href="delete-parts.php?id= ' . $id . '">
              <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
              </svg>
            </a>
          </button>
        </div>
      </td>
    </tr>';
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
if (isset($_POST['offer_find'])) {
  $offer_param = mysqli_real_escape_string($con, $_POST['offer_find']);
  $offer_sql = "select * from offer WHERE offer.offer_name LIKE '%$offer_param%'";
  $offer_query = mysqli_query($con, $offer_sql);
  $output = '';
  if (mysqli_num_rows($offer_query) > 0) {
    $output = '  <thead>
      <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
      <th class="px-4 py-3">Offer name</th>
                <th class="px-4 py-3">Description</th>
                <th class="px-4 py-3">Discount</th>
                <th class="px-4 py-3">Start date</th>
                <th class="px-4 py-3">End date</th>
                <th class="px-4 py-3">Edit</th>
      </tr>
    </thead>';
    while ($row = mysqli_fetch_assoc($offer_query)) {
      $id = $row['offer_id'];

      $output .= '
      <tr class="text-gray-700 dark:text-gray-400">
      <td class="px-4 py-3">
        <div class="flex items-center text-sm">
          <!-- Avatar with inset shadow -->
          <div>

            <p class="font-semibold">
            ' . $row['offer_name'] . '
            </p>
          </div>
        </div>
      </td>
      <td class="px-4 py-3 text-sm">
      ' . substr($row['offer_desc'], 0, 50)  . '
      </td>
      <td class="px-4 py-3 text-sm">
      ' . $row['offer_disscount'] . '
      </td>
      <td class="px-4 py-3 text-sm">
      ' . $row['offer_start_date'] . '
      </td>
      <td class="px-4 py-3 text-sm">
      ' . $row['offer_end_date'] . '
      </td>
    
      <td class="px-4 py-3">
        <div class="flex items-center space-x-4 text-sm">
          <button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
          <a href="add-offer.php?id=' . $id . '">
              <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
              </svg>
            </a>
          </button>

          <button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Delete" onclick="return confirm("Are you sure you want to delete service?");">
          <a href="delete-offer.php?id= ' . $id . '">
              <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
              </svg>
            </a>
          </button>
        </div>
      </td>
    </tr>';
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
if (isset($_POST['type_find'])) {
  $type_param = mysqli_real_escape_string($con, $_POST['type_find']);
  $type_sql = "SELECT *  FROM car_type WHERE car_type.name LIKE '%$type_param%'";
  $type_query = mysqli_query($con, $type_sql);
  $output = '';
  if (mysqli_num_rows($type_query) > 0) {
    $output = '  <thead>
      <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
      <th class="px-4 py-3">NO</th>
      <th class="px-4 py-3">Type</th>
      <th class="px-4 py-3">Edit </th>
      </tr>
    </thead>';
    $i = 1;
    while ($row = mysqli_fetch_assoc($type_query)) {
      $id = $row['car_type_id'];

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
      ' . $row['name'] . '
      </td>

      <td class="px-4 py-3">
        <div class="flex items-center space-x-4 text-sm">
          <button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
          <a href="add-v-type.php?id=' . $id . '">
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
if (isset($_POST['maker_find'])) {
  $maker_param = mysqli_real_escape_string($con, $_POST['maker_find']);
  $maker_sql = "SELECT maker.* , car_type.name FROM maker JOIN car_type ON maker.car_typecar_type_id = car_type.car_type_id WHERE maker.maker_name LIKE '%$maker_param%'
  ";
  $maker_query = mysqli_query($con, $maker_sql);
  $output = '';
  if (mysqli_num_rows($maker_query) > 0) {
    $output = '  <thead>
      <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
      <th class="px-4 py-3">No</th>
      <th class="px-4 py-3">Car Type</th>
      <th class="px-4 py-3">maker</th>
      <th class="px-4 py-3">Edit </th>
      </tr>
    </thead>';
    $i = 1;
    while ($row = mysqli_fetch_assoc($maker_query)) {
      $id = $row['maker_id'];

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
      ' . $row['name'] . '
      </td>
      <td class="px-4 py-3 text-sm">
      ' . $row['maker_name'] . '
      </td>

      <td class="px-4 py-3">
        <div class="flex items-center space-x-4 text-sm">
          <button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
          <a href="add_v_brand.php?id=' . $id . '">
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
if (isset($_POST['dropdown'])) {
  $staff_id = mysqli_real_escape_string($con, $_POST['dropdown']);
  $staff_appoiment_sql = "SELECT appointment.* , user.user_name ,user.user_phone, vehicle.rto_number , model.model_name  FROM appointment  JOIN customer ON customer.customer_id = appointment.customercustomer_id JOIN user ON user.user_id = customer.Useruser_id JOIN vehicle ON vehicle.customer_id = customer.customer_id JOIN model ON model.car_model_id = vehicle.modelcar_model_id WHERE appointment.staffstaff_id = $staff_id";
  $staff_appoiment_query = mysqli_query($con, $staff_appoiment_sql);
  $output = '';
  if (mysqli_num_rows($staff_appoiment_query) > 0) {
    $output = '  <thead>
      <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
      <th class="px-4 py-3">No</th>
      <th class="px-4 py-3">Name</th>
      <th class="px-4 py-3">Phone</th>
      <th class="px-4 py-3">Appointment Date</th>
      <th class="px-4 py-3">Appointment Time</th>
      <th class="px-4 py-3">Vehicle RTO</th>
      <th class="px-4 py-3">Vehicle Type</th>
      </tr>
    </thead>';
    $i = 1;
    while ($row = mysqli_fetch_assoc($staff_appoiment_query)) {

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
      ' . $row['Vehicle_rto_number'] . '
      </td>
      <td class="px-4 py-3 text-sm">
      ' . $row['model_name'] . '
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
if (isset($_POST['model_find'])) {
  $model_param = mysqli_real_escape_string($con, $_POST['model_find']);
  $model_sql = "SELECT model.* , maker.maker_name ,car_type.name from model JOIN maker ON model.Makermaker_id = maker.maker_id JOIN car_type ON maker.car_typecar_type_id = car_type.car_type_id WHERE model.model_name LIKE '%$model_param%'";
  $model_query = mysqli_query($con, $model_sql);
  $output = '';
  if (mysqli_num_rows($model_query) > 0) {
    $output = '  <thead>
      <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
      <th class="px-4 py-3">NO</th>
                <th class="px-4 py-3">Type</th>
                <th class="px-4 py-3">Brand</th>
                <th class="px-4 py-3">Model </th>
                <th class="px-4 py-3">Edit</th>
      </tr>
    </thead>';
    $i = 1;
    while ($row = mysqli_fetch_assoc($model_query)) {
      $id = $row['car_model_id'];

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
      ' . $row['name'] . '
      </td>
      <td class="px-4 py-3 text-sm">
      ' . $row['maker_name'] . '
      </td>
      <td class="px-4 py-3 text-sm">
      ' . $row['model_name'] . '
      </td>

      <td class="px-4 py-3">
        <div class="flex items-center space-x-4 text-sm">
          <button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
          <a href="add-v-model.php?id=' . $id . '">
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
