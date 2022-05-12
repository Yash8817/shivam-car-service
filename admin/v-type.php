<?php require "sidebar.php";

require "../lockscreen/connection.php"; ?>
<main class="h-full pb-16 overflow-y-auto">

  <div class="container grid px-6 mx-auto">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
      Vehicle types
    </h2>



    <div class="px-6 mb-6   flex  justify-start space-x-6  ">
      <a href="../admin/add-v-type.php">
        <button class="items-center    px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
          New vehicle type
          <span class="ml-2" aria-hidden="true">+</span>
      </a>

    </div>
    <!-- With actions -->

    <div class="w-full overflow-hidden rounded-lg shadow-xs">
      <div class="w-full overflow-x-auto">
        <?php
        $limit = 7;
        if (isset($_GET['page'])) {
          $page = $_GET['page'];
        } else {
          $page = 1;
        }
        $offset = ($page - 1) * $limit;
        $sql = "SELECT *  FROM car_type LIMIT {$offset},{$limit}";

        $res = mysqli_query($con, $sql)  or die("quary failed");
        if (mysqli_num_rows($res) > 0) {
        ?>
          <table class="w-full whitespace-no-wrap" id="tbl_body">
            <label class="block text-sm">
              <span class="text-gray-700 dark:text-gray-400">Search service</span>
              <input name="type_find" id="type_find" type="text" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
            </label><br>
            <thead>
              <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                <th class="px-4 py-3">NO</th>
                <th class="px-4 py-3">Type</th>
                <th class="px-4 py-3">Edit </th>

              </tr>
            </thead>
            <?php
            $cnt = 1;
            while ($row =  mysqli_fetch_array($res)) {
            ?>
              <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                <tr class="text-gray-700 dark:text-gray-400">

                  <td class="px-4 py-3"><?php echo $cnt;
                                        $cnt++; ?></td>
                  <td class="px-4 py-3">
                    <div class="flex items-center text-sm">
                      <!-- Avatar with inset shadow -->
                      <div>
                        <p class="font-semibold">
                          <?php echo $row['name']; ?>
                        </p>

                      </div>
                    </div>
                  </td>

                  <td class="px-4 py-3">
                    <div class="flex items-center space-x-4 text-sm">
                      <button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
                        <a href='add-v-type.php?id=<?php echo $row['car_type_id']; ?>'>
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
        <?php } ?>

        <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">

          <!-- Pagination -->
          <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end" id="pagination">
            <?php
            // show pagination
            $sql1 = "SELECT *  FROM car_type";

            $result1 = mysqli_query($con, $sql1) or die("Query Failed.");

            if (mysqli_num_rows($result1) > 0) {

              $total_records = mysqli_num_rows($result1);

              $total_page = ceil($total_records / $limit);


              echo '<ul class="inline-flex items-center">';
              if ($page > 1) {
                echo '<li><a href="v-type.php?page=' . ($page - 1) . '">Prev&nbsp;</a></li>' . "  ";
              }
              for ($i = 1; $i <= $total_page; $i++) {
                if ($i == $page) {
                  $active = "active";
                } else {
                  $active = "";
                }
                echo '<li class="' . $active . ' "> &nbsp; <a href="v-type.php?page=' . $i . '">' . $i  . '&nbsp;</a></li>';
              }
              if ($total_page > $page) {
                echo '<li><a href="v-type.php?page=' . ($page + 1) . '">&nbsp;Next</a></li>';
              }

              echo '</ul>';
            }
            ?>
          </span>
        </div>
      </div>
    </div>

  </div>

  </div>


</main>

</div>

</div>
</body>

</html>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
  $(document).on("keyup", "#type_find", function() {
    var type_find = $("#type_find").val();
    $.ajax({
      url: 'getData.php',
      type: 'POST',
      data: {
        type_find: type_find
      },
      success: function(data) {
        $("#tbl_body").html(data);
        $("#pagination").hide();

      }
    });
  });
</script>