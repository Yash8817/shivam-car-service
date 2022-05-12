<?php require_once "sidebar.php";
require "../lockscreen/connection.php" ?>
<main class="h-full overflow-y-auto">

  <div class="container grid px-6 mx-auto">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
      Service
    </h2>
    <div class="px-6 mb-6">
      <a href="../admin/add-service.php">
        <button class="flex items-center   px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
          New Service
          <span class="ml-2" aria-hidden="true">+</span>
      </a>
      </button>
    </div>

    <!-- With actions -->

    <div class="w-full overflow-hidden rounded-lg shadow-xs">
      <div class="w-full overflow-x-auto">
        <?php
        //pagination purpose
        $limit = 5;
        if (isset($_GET['page'])) {
          $page = $_GET['page'];
        } else {
          $page = 1;
        }
        $offset = ($page - 1) * $limit;


        $sql = "select *  from servics  LIMIT {$offset},{$limit}";
        $res = mysqli_query($con, $sql)  or die("quary failed");
        if (mysqli_num_rows($res) > 0) {
        ?>
          <table class="w-full whitespace-no-wrap" id="tbl_body">
            <label class="block text-sm">
              <span class="text-gray-700 dark:text-gray-400">Search service</span>
              <input name="service_find" id="service_find" type="text" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
            </label><br>
            <thead>
              <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                <th class="px-4 py-3">Service Name</th>
                <th class="px-4 py-3">Description</th>
                <th class="px-4 py-3">price</th>
                <th class="px-4 py-3">Is Active</th>
                <th class="px-4 py-3">Edit</th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
              <?php
              while ($row =  mysqli_fetch_array($res)) {
              ?>
                <tr class="text-gray-700 dark:text-gray-400">
                  <td class="px-4 py-3">
                    <div class="flex items-center text-sm">
                      <!-- Avatar with inset shadow -->
                      <div>

                        <p class="font-semibold">
                          <?php echo $row['service_name']; ?>
                        </p>
                      </div>
                    </div>
                  </td>
                  <td class="px-4 py-3 text-sm">
                    <?php echo substr($row['service_desc'], 0, 50) . "<br>" . substr($row['service_desc'], 50, 100) . "..."; ?>

                  </td>
                  <td class="px-4 py-3 text-sm">
                    <?php echo $row['service_price']; ?>
                  </td>
                  <td class="px-4 py-3 text-xs">
                    <a href="save-update-service.php?update-id=<?php echo $row['service_id']; ?>">
                      <?php
                      $status  = $row['is_active'];
                      if ($status == 1) {
                        $c1 = "text-green-700 bg-green-100";
                        $c2 = "dark:text-green-100 dark:bg-green-700";
                      } else {
                        $c1 = "text-red-700 bg-red-100";
                        $c2 = "dark:text-red-100 dark:bg-red-700";
                      }

                      ?>
                      <span class="px-2 py-1 font-semibold leading-tight <?php echo $c1; ?> rounded-full <?php echo $c2; ?>" onclick="return confirm('Are you sure you want change status?');">
                        <?php
                        $status  = $row['is_active'];
                        if ($status == 1) {
                          echo " Active";
                        } else {
                          echo "Diactive";
                        }
                        ?>
                    </a>
                  </td>
                  <td class="px-4 py-3">
                    <div class="flex items-center space-x-4 text-sm">
                      <button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
                        <a href="update-service.php?id=<?php echo $row['service_id']; ?>">
                          <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                          </svg>
                        </a>
                      </button>

                      <button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Delete" onclick="return confirm('Are you sure you want to delete service?');">
                        <a href="delete-service.php?id=<?php echo $row['service_id']; ?>">
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
      </div>

      <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">


        <!-- Pagination -->
        <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end" id="pagination">
          <?php
          // show pagination
          $sql1 = "SELECT * FROM servics";
          $result1 = mysqli_query($con, $sql1) or die("Query Failed.");

          if (mysqli_num_rows($result1) > 0) {

            $total_records = mysqli_num_rows($result1);

            $total_page = ceil($total_records / $limit);

            echo '<ul class="inline-flex items-center">';
            if ($page > 1) {
              echo '<li><a href="service.php?page=' . ($page - 1) . '">Prev&nbsp;</a></li>' . "  ";
            }
            for ($i = 1; $i <= $total_page; $i++) {
              if ($i == $page) {
                $active = "active";
              } else {
                $active = "";
              }
              echo '<li class="' . $active . ' "> &nbsp; <a href="service.php?page=' . $i . '">' . $i  . '&nbsp;</a></li>';
            }
            if ($total_page > $page) {
              echo '<li><a href="service.php?page=' . ($page + 1) . '">&nbsp;Next</a></li>';
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





<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
  $(document).on("keyup", "#service_find", function() {
    var service_find = $("#service_find").val();
    $.ajax({
      url: 'getData.php',
      type: 'POST',
      data: {
        service_find: service_find
      },
      success: function(data) {
        $("#tbl_body").html(data);
        $("#pagination").hide();

      }
    });
  });
</script>