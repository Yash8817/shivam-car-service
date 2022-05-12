<?php

require_once "sidebar.php";
require_once "../lockscreen/connection.php";
?>
<main class="h-full overflow-y-auto">
  <div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
      WELCOME,
      <?php
      $email = $_SESSION['admin_login']; //getting this email using session
      $get_username = "SELECT user_name FROM user WHERE user_email = '$email'";
      $res = mysqli_query($con, $get_username);
      $username = mysqli_fetch_array($res);
      echo $username['user_name'];
      ?>

    </h2>

    <!-- Card -->
    <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4 ">



      <!-- Card -->
      <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800 ">
        <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
            <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path>
          </svg>
        </div>
        <div>
          <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200">
            Service
          </p>
          <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
            <?php
            $sql = "SELECT * FROM servics";
            if ($res = mysqli_query($con, $sql)) {
              $rowcount = mysqli_num_rows($res);
              echo $rowcount;
            }
            ?>
          </p>
        </div>
      </div>




      <!-- Card -->
      <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
          </svg>
        </div>
        <div>
          <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200">
            Parts
          </p>
          <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
            <?php
            $sql = "SELECT * ,part_img.part_img_path FROM parts JOIN part_img ON parts.parts_id = part_img.partsparts_id ";
            if ($res = mysqli_query($con, $sql)) {
              $rowcount = mysqli_num_rows($res);
              echo $rowcount;
            }
            ?>
          </p>
        </div>
      </div>

      <!-- Card -->
      <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <div class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500">
          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd"></path>
          </svg>
        </div>
        <div>
          <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200">
            Offers
          </p>
          <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
            <?php
            $sql = "SELECT * FROM offer";
            if ($res = mysqli_query($con, $sql)) {
              $rowcount = mysqli_num_rows($res);
              echo $rowcount;
            }
            ?>
          </p>
        </div>
      </div>


      <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
            <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path>
          </svg>
        </div>
        <div>
          <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200">
            Membership
          </p>
          <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
            <?php
            $sql = "SELECT * FROM membership_details";
            if ($res = mysqli_query($con, $sql)) {
              $rowcount = mysqli_num_rows($res);
              echo $rowcount;
            }
            ?>
          </p>
        </div>
      </div>

      <!-- Card -->
      <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <div class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500">
          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
          </svg>
        </div>
        <div>
          <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200">
            Staff
          </p>
          <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
            <?php
            $sql = "SELECT * FROM staff";
            if ($res = mysqli_query($con, $sql)) {
              $rowcount = mysqli_num_rows($res);
              echo $rowcount;
            }
            ?>
          </p>
        </div>
      </div>


      <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
            <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path>
          </svg>
        </div>
        <div>
          <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200">
            Pending Appointment
          </p>
          <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
            <?php
            $sql = "SELECT * FROM `appointment` WHERE appointment.statusstatus_id = 1";
            if ($res = mysqli_query($con, $sql)) {
              $rowcount = mysqli_num_rows($res);
              echo $rowcount;
            }
            ?>
          </p>
        </div>
      </div>






      <!-- Card -->
      <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <div class="p-3 mr-4 text-teal-500 bg-teal-100 rounded-full dark:text-teal-100 dark:bg-teal-500">
          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M18 5v8a2 2 0 01-2 2h-5l-5 4v-4H4a2 2 0 01-2-2V5a2 2 0 012-2h12a2 2 0 012 2zM7 8H5v2h2V8zm2 0h2v2H9V8zm6 0h-2v2h2V8z" clip-rule="evenodd"></path>
          </svg>
        </div>
        <div>
          <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200">
            Type
          </p>
          <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
            <?php
            $sql = "SELECT * FROM car_type";
            if ($res = mysqli_query($con, $sql)) {
              $rowcount = mysqli_num_rows($res);
              echo $rowcount;
            }
            ?>
          </p>
        </div>
      </div>

      

      <!-- Card -->
      <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <div class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">
          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
            <path d="M3 1a1 1 0 000 2h1.22l.305 1.222a.997.997 0 00.01.042l1.358 5.43-.893.892C3.74 11.846 4.632 14 6.414 14H15a1 1 0 000-2H6.414l1-1H14a1 1 0 00.894-.553l3-6A1 1 0 0017 3H6.28l-.31-1.243A1 1 0 005 1H3zM16 16.5a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0zM6.5 18a1.5 1.5 0 100-3 1.5 1.5 0 000 3z"></path>
          </svg>
        </div>
        <div>
          <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400 hover:text-gray-800 dark:hover:text-gray-200">
            Maker
          </p>
          <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
            <?php
            $sql = "SELECT * FROM maker";
            if ($res = mysqli_query($con, $sql)) {
              $rowcount = mysqli_num_rows($res);
              echo $rowcount;
            }
            ?>
          </p>
        </div>
      </div>




    </div>

    <!-- New Table -->
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
      <div class="w-full overflow-x-auto">
        <?php
        $sql = "SELECT USER.user_name, USER.user_phone,vehicle.rto_number,vehicle.chassis_no,
                model.model_name,membership.membership_id,model.model_name,appointment.app_date,appointment.app_time,
                status.status FROM USER JOIN customer ON customer.Useruser_id = USER.user_id 
                JOIN vehicle ON vehicle.customer_id = customer.customer_id 
                JOIN model ON vehicle.modelcar_model_id = model.car_model_id 
                JOIN membership ON membership.customercustomer_id = membership.customercustomer_id 
                JOIN appointment ON appointment.customercustomer_id = customer.customer_id 
                JOIN status ON status.status_id = appointment.statusstatus_id LIMIT 7" ;

        $res = mysqli_query($con, $sql)  or die("quary failed");
        if (mysqli_num_rows($res) > 0) {
        ?>
          <table class="w-full whitespace-no-wrap">
            <thead>
              <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                <th class="px-4 py-3">Name</th>
                <th class="px-4 py-3">Appointment Date</th>
                <th class="px-4 py-3">Appointment Time</th>
                <th class="px-4 py-3">Vehicle RTO</th>
                <th class="px-4 py-3">Model</th>
                <th class="px-4 py-3">Status</th>

                <!-- <th class="px-4 py-3">Status</th> -->
              </tr>
            </thead>
            <?php
            while ($row =  mysqli_fetch_array($res)) {
            ?>
              <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                <tr class="text-gray-700 dark:text-gray-400">
                  <td class="px-4 py-3">
                    <div class="flex items-center text-sm">
                      <!-- Avatar with inset shadow -->
                      <div>
                        <p class="font-semibold">
                          <?php echo $row['user_name']; ?>
                        </p>
                      </div>
                    </div>
                  </td>
                  <td class="px-4 py-3 text-sm">
                    <?php echo $row['app_date']; ?>
                  </td>
                  <td class="px-4 py-3 text-sm">
                    <?php echo $row['app_time']; ?>
                  </td>
                  <td class="px-4 py-3 text-sm">
                    <?php echo $row['rto_number']; ?>
                  </td>
                  <td class="px-4 py-3 text-sm">
                    <?php echo $row['model_name']; ?>

                  </td>
                  <td class="px-4 py-3 text-xs">
                   
<?php 
                    $status  = $row['status'];
                  if($status == 'accept'){
                    $c1="text-green-700 bg-green-100";
                    $c2="dark:text-green-100 dark:bg-green-700";
                  }
                  else{
                    $c1="text-red-700 bg-red-100";
                    $c2="dark:text-red-100 dark:bg-red-700";
                  }
 
                  ?>
                      <span class="px-2 py-1 font-semibold leading-tight <?php echo $c1; ?> rounded-full <?php echo $c2; ?>">
                        <?php echo $row['status'];?>
                      </span>
                  </td>

                  <!-- <td class="px-4 py-3 text-xs">
                  <span
                    class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100"
                  >
                    DONE
                  </span>
                </td> -->
                </tr>
              </tbody>
            <?php  } ?>
          </table>
        <?php } ?><br><br>
      </div>
    </div>
</main>
</div>
</div>
</body>

</html>