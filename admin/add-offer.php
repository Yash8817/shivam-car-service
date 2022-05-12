<?php require "sidebar.php";
require "../lockscreen/connection.php";

$name = "";
$desc = "";
$disscount = "";
$start_date = "";
$end_date = "";
?>
<main class="h-full pb-16 overflow-y-auto">
  <div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
      Add New Offer
    </h2>
    <form action="save-offer.php" method="POST" autocomplete="">
      <?php
      if (isset($_GET['id'])) {
        $offer_id = $_GET['id'];
        $sql = "SELECT * FROM offer WHERE offer_id = {$offer_id}";
        $res = mysqli_query($con, $sql)  or die("quary failed");
        if (mysqli_num_rows($res) > 0) {
          while ($row = mysqli_fetch_assoc($res)) {
            $offer_id = $row['offer_id'];
            $name = $row['offer_name'];
            $desc = $row['offer_desc'];
            $disscount = $row['offer_disscount'];
            $start_date = $row['offer_start_date'];
            $end_date = $row['offer_end_date'];
          }
        }
      }
      else
      {
        // echo "<script> location.href='../admin/offer.php'; </script>";
      }
      ?>
      <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <?php
        if (isset($_GET['id'])) {
        ?>
          <input name="offer-id" type="hidden" value="<?php echo $offer_id ?>">
        <?php
        }
        ?>
        <label class="block text-sm">
          <span class="text-gray-700 dark:text-gray-400">Offer Name</span>
          <input name="offer-name" value="<?php echo $name ?>" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none
                focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Enter offer name" required />
        </label><br>
        <label class="block mt-4 text-sm">
          <span class="text-gray-700 dark:text-gray-400">Offer Description</span>
          <textarea name="offer-desc" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700
               form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" rows="3" placeholder="Offer Details..." required><?php echo $desc ?></textarea>
        </label><br>
        <label class="block text-sm">
          <span class="text-gray-700 dark:text-gray-400">Discount</span>
          <input type="number" value="<?php echo $disscount ?>" min="1" name="offer-discount" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700
               focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray 
               form-input" placeholder="Enter Discount" required />
        </label><br>
        <label class="block text-sm">
          <span class="text-gray-700 dark:text-gray-400"> Start date</span>
          <input name="start-date" value="<?php echo $start_date ?>" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 
              focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray
               form-input" type="date" placeholder="dd-mm-yyyy" min="<?php echo date("Y-m-d"); ?>" required />
        </label><br>
        <label class="block text-sm">
          <span class="text-gray-700 dark:text-gray-400"> End date</span>
          <input name="end-date" value="<?php echo $end_date ?>" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 
              focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray 
              form-input" type="date" placeholder="dd-mm-yyyy" min="<?php echo date("Y-m-d"); ?>" required />
        </label><br>


        <?php
        if (isset($_GET['id'])) {
        ?>
          <span class="text-gray-700 dark:text-gray-400">
            Change status
          </span>
          <br>
          <select name="type" class="block mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700  focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
            <option value="1">Active</option>
            <option value="0">Disabled</option>
          </select>
          </label><br>
        <?php
        }
        ?>
        <div>
          <a href="../admin/offers.php">
            <button name="submit" class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
              Submit
            </button></a>

          <a href="../admin/offers.php">
            <button name="cancel" class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600
                 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" formnovalidate>
              Cancel
            </button></a>

        </div>

        <!-- Validation inputs -->
        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
      </div>
    </form>

  </div>
  </div>
</main>
</div>
</div>
</body>

</html>


<script>
  function getdate()
  {
    
  }
</script>