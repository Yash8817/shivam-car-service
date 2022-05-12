<?php require "sidebar.php";

require "../lockscreen/connection.php";

  if(isset($_GET['qid']))
  {
      $qid = $_GET['qid'];
      $update = "update query SET status = 1 where q_id = $qid";
    //   die($update);
      if(!mysqli_query($con,$update))
      {
        echo "<script language='javascript'>alert('Error in updating !!!');</script>";
        echo "<script> location.href='../shivam/admin/Contact_Us_Queries.php'; </script>";
      }
  }




?>

<main class="h-full pb-16 overflow-y-auto">
  <div class="container grid px-6 mx-auto">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
      Manage Contact Us Queries
    </h2>

  

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

        $sql = "SELECT * FROM query LIMIT {$offset},{$limit}";
        $res = mysqli_query($con, $sql)  or die("quary failed");
        if (mysqli_num_rows($res) > 0) {
        ?>
          <table class="w-full whitespace-no-wrap">
            <thead>
              <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                <th class="px-4 py-3">Name</th>
                <th class="px-4 py-3">Email</th>
                <th class="px-4 py-3">Phone</th>
                <th class="px-4 py-3">message</th>
                <th class="px-4 py-3">Action</th>

              </tr>
            </thead>
            <?php
            while ($row =  mysqli_fetch_array($res)) {
            ?>
              <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                <tr class="text-gray-700 dark:text-gray-400">
                  <td class="px-4 py-3 text-sm  text-truncate">
                  <?php echo $row['name']; ?>
                  </td>

                  <td class="px-4 py-3 text-sm  text-truncate">
                  <?php echo $row['email']; ?>
                  </td>
                 
                  <td class="px-4 py-3 text-sm  text-truncate">
                  <?php echo $row['uphone']; ?>
                  </td>
                  
                  <td class="px-4 py-3 text-sm  text-truncate">
                  <?php echo $row['message']; ?>
                  </td>

                  <td class="px-4 py-3">
                    <div class="flex items-center space-x-4 text-sm">

                    <?php 
                    if( $row['status']  ==  0)
                    {
                        ?>
                    <button name="edit-Q&S" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
                        <a href='Contact_Us_Queries.php?qid=<?php echo $row['q_id']; ?>'>
                          Update
                        </a>
                      </button>

                        <?php
                    }
                    else
                    {

                        echo "Read";
                    }
                    ?>
                      
                    
                    </div>
                  </td>
                </tr>
              </tbody>
            <?php } ?>
          </table>
        <?php } ?>

        <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">

          <!-- Pagination -->
          <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
            <?php
            // show pagination
            $sql1 = "SELECT * FROM qands";
            $result1 = mysqli_query($con, $sql1) or die("Query Failed.");

            if (mysqli_num_rows($result1) > 0) {

              $total_records = mysqli_num_rows($result1);

              $total_page = ceil($total_records / $limit);


              echo '<ul class="inline-flex items-center">';
              if ($page > 1) {
                echo '<li><a href="Q&S.php?page=' . ($page - 1) . '">Prev&nbsp;</a></li>' . "  ";
              }
              for ($i = 1; $i <= $total_page; $i++) {
                if ($i == $page) {
                  $active = "active";
                } else {
                  $active = "";
                }
                echo '<li class="' . $active . ' "> &nbsp; <a href="Q&S.php?page=' . $i . '">' . $i  . '&nbsp;</a></li>';
              }
              if ($total_page > $page) {
                echo '<li><a href="Q&S.php?page=' . ($page + 1) . '">&nbsp;Next</a></li>';
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