<?php require "sidebar.php" ; 
require "../lockscreen/connection.php";

  //define total number of results you want per page  
   /* Calculate Offset Code */
   
   ?>

<main class="h-full overflow-y-auto">
  <div class="container grid px-6 mx-auto">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
      Customer Details
    </h2>
    <!-- With avatar -->
    
    <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
      <div class="w-full overflow-x-auto">
        
        <?php 
               $limit = 10;
               if(isset($_GET['page'])){
                 $page = $_GET['page'];
               }else{
                 $page = 1;
               }
               $offset = ($page - 1) * $limit;
               $sql = "SELECT USER.user_name, USER.user_phone,vehicle.rto_number,vehicle.chassis_no, 
               model.model_name,model.model_name FROM USER JOIN customer ON customer.Useruser_id = USER.user_id 
               JOIN vehicle ON vehicle.customer_id = customer.customer_id 
               JOIN model ON vehicle.modelcar_model_id = model.car_model_id LIMIT  {$offset},{$limit}"  ;

                $res = mysqli_query($con , $sql)  or die("quary failed");
                if(mysqli_num_rows($res)> 0)
                {
                ?>
              <table class="w-full whitespace-no-wrap">
                <thead>
                  <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="px-4 py-3">Name</th>
                    <th class="px-4 py-3">Phone</th>
                    <th class="px-4 py-3">Vehicle RTO</th>
                    <th class="px-4 py-3">Model</th>
                  </tr>
                </thead>
                <?php 
                    while($row =  mysqli_fetch_array($res))
                    {
                  ?>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                  <tr class="text-gray-700 dark:text-gray-400">
                    <td class="px-4 py-3">
                      <div class="flex items-center text-sm">
                        <div>
                          <p class="font-semibold">
                          <?php echo $row['user_name'];?>
                        </p>
                        
                      </div>
                    </div>
                  </td>
                  <td class="px-4 py-3 text-sm">
                    <?php echo $row['user_phone'];?>
                  </td>
                 
                    <td class="px-4 py-3 text-sm">
                      <?php echo $row['rto_number'];?>
                    </td>
                    <td class="px-4 py-3 text-sm">
                      <?php echo $row['model_name'];?>
                    </td>
                  
                  
                  </tr>
                </tbody>
                <?php
               }
                ?>
              </table>
            <?php }?>

            
      <!-- Pagination -->
      <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">

<span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
  <?php
  // show pagination
  $sql1 = "SELECT * FROM customer JOIN vehicle ON customer.customer_id = vehicle.customer_id";
  $result1 = mysqli_query($con, $sql1) or die("Query Failed.");

  if (mysqli_num_rows($result1) > 0) {

    $total_records = mysqli_num_rows($result1);

    $total_page = ceil($total_records / $limit);


    echo '<ul class="inline-flex items-center">';
    if ($page > 1) {
      echo '<li><a href="Customer-details.php?page=' . ($page - 1) . '">Prev&nbsp;</a></li>' . "  ";
    }
    for ($i = 1; $i <= $total_page; $i++) {
      if ($i == $page) {
        $active = "active";
      } else {
        $active = "";
      }
      echo '<li class="' . $active . ' "> &nbsp; <a href="Customer-details.php?page=' . $i . '">' . $i  . '&nbsp;</a></li>';
    }
    if ($total_page > $page) {
      echo '<li><a href="Customer-details.php?page=' . ($page + 1) . '">&nbsp;Next</a></li>';
    }

    echo '</ul>';
  }
  ?>
</span>
</div>

           

      </main>
    