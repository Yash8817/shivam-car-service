<?php require "sidebar.php";
require "../lockscreen/connection.php";
?>
<main class="h-full overflow-y-auto">

  <div class="container grid px-6 mx-auto">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
      Customer Vehicles
    </h2>
    <div class="px-6 mb-6">

    </div>

    <!-- With actions -->

    <div class="w-full overflow-hidden rounded-lg shadow-xs">
      <div class="w-full overflow-x-auto">
        <?php $con or die("connection failed");
        $limit = 7;
        if (isset($_GET['page'])) {
          $page = $_GET['page'];
        } else {
          $page = 1;
        }
        $offset = ($page - 1) * $limit;

        $sql = "SELECT user.user_name , user.user_phone ,vehicle.rto_number, maker.maker_name,
         model.model_name , veh_color.color_name ,car_type.name   FROM user JOIN customer
          ON customer.Useruser_id = user.user_id JOIN vehicle ON vehicle.customer_id = customer.customer_id 
           JOIN model ON vehicle.modelcar_model_id = model.car_model_id JOIN veh_color 
           ON vehicle.veh_color_id = veh_color.veh_color_id JOIN maker on maker.maker_id =model.Makermaker_id 
           JOIN car_type ON maker.car_typecar_type_id = car_type.car_type_id LIMIT {$offset},{$limit}";

        $result = mysqli_query($con, $sql) or die("quary failed");
        if (mysqli_num_rows($result) > 0) {
        ?>

          <table class="w-full whitespace-no-wrap">
            <thead>
              <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                <th class="px-4 py-3">Customer</th>
                <th class="px-4 py-3">Phone</th>
                <th class="px-4 py-3">RTO</th>
                <th class="px-4 py-3">Brand</th>
                <th class="px-4 py-3">Model</th>
                <th class="px-4 py-3">Color</th>
                <th class="px-4 py-3">Type</th>
                <th class="px-4 py-3">Delete</th>
              </tr>
            </thead>
            <?php 
                   while($row = mysqli_fetch_assoc($result))
                   {
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
                  <?php echo $row['user_phone']; ?>
                </td>
                <td class="px-4 py-3 text-xs">
                  <?php echo $row['rto_number']; ?>
                </td>
                <td class="px-4 py-3 text-sm">
                  <?php echo $row['maker_name']; ?>
                </td>
                <td class="px-4 py-3 text-sm">
                  <?php echo $row['model_name']; ?>
                </td>
                <td class="px-4 py-3 text-sm">
                  <?php echo $row['color_name']; ?>
                </td>
                <td class="px-4 py-3 text-sm">
                  <?php echo $row['name']; ?>
                </td>
                <td class="px-4 py-3">
                  <div class="flex items-center space-x-4 text-sm">
                    <button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Delete"
                    onclick="return confirm('Are you sure you want to delete vehicle?');">
                    <a href="delete-vehicle.php?id=<?php echo $row['rto_number']; ?>">
                      <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                      </svg>
                    </a>
                    </button>
                  </div>
                </td>
              </tr>
              <?php } ?>
            </tbody>
          </table>
        <?php } ?>

        
      <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">

<!-- Pagination -->
<span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
  <?php
  // show pagination
  $sql1 = "SELECT * FROM vehicle";
  $result1 = mysqli_query($con, $sql1) or die("Query Failed.");

  if (mysqli_num_rows($result1) > 0) {

    $total_records = mysqli_num_rows($result1);

    $total_page = ceil($total_records / $limit);


    echo '<ul class="inline-flex items-center">';
    if ($page > 1) {
      echo '<li><a href="Vehicle.php?page=' . ($page - 1) . '">Prev&nbsp;</a></li>' . "  ";
    }
    for ($i = 1; $i <= $total_page; $i++) {
      if ($i == $page) {
        $active = "active";
      } else {
        $active = "";
      }
      echo '<li class="' . $active . ' "> &nbsp; <a href="Vehicle.php?page=' . $i . '">' . $i  . '&nbsp;</a></li>';
    }
    if ($total_page > $page) {
      echo '<li><a href="Vehicle.php?page=' . ($page + 1) . '">&nbsp;Next</a></li>';
    }

    echo '</ul>';
  }
  ?>
</span>
</div>
      


      </div>
    </div>

  </div>
</main>
</div>
</div>
</body>

</html>