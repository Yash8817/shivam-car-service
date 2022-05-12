<?php require "sidebar.php" ?>
<main class="h-full pb-16 overflow-y-auto">
  <div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
      Add New Membership
    </h2>
    <form action="save-update-membership.php" method="POST" autocomplete="">
      <?php 
      require "../lockscreen/connection.php";
      $mem_id = $_GET['id'];
      $sql = "SELECT * FROM membership_details WHERE mem_details_id = {$mem_id}";
      $res = mysqli_query($con, $sql)  or die("quary failed");
      if (mysqli_num_rows($res) > 0) {
        while ($row = mysqli_fetch_assoc($res))
        {
      ?>
       <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
       <input type="hidden" name="id" value="<?php echo $row['mem_details_id']; ?>" placeholder="">
        <label class="block text-sm">
          <span class="text-gray-700 dark:text-gray-400">Membership Name </span>
          <input name="mem-name" value="<?php echo $row['mem_name'];?>"  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400
           focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray 
           form-input" placeholder="Enter Membership name" required/>
        </label>

        <label class="block mt-4 text-sm">
          <span class="text-gray-700 dark:text-gray-400">Membership Description</span>
          <textarea name="mem-desc"  class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 
          dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple 
          dark:focus:shadow-outline-gray" rows="3" placeholder="Membership details..." required>
          <?php echo trim($row['mem_desc']);?></textarea>
          
        </label>
        <br>
        <label class=" text-sm">
          <span class="text-gray-700 dark:text-gray-400">
            Duration
          </span>
          <select name="duration" class="  mt-1 text-sm dark:text-gray-300 dark:border-gray-600
           dark:bg-gray-700 form-multiselect focus:border-purple-400 focus:outline-none focus:shadow-outline-purple
            dark:focus:shadow-outline-gray" required>
            <?php
            echo "<option>{$row['mem_duration']  } month</option>";
              ?>
               <option value="2">2 Month</option>
            <option value="3">3 Month</option>
            <option value="4">4 Month</option>
            <option value="6">6 Month</option>
            <option value="9">9 Month</option>
            <option value="12">12 Month</option>
          </select>
        
        <label class=" mt-4 text-sm">
          <span class="text-gray-700 dark:text-gray-400">
          Labour discount
          </span>
          <select name="discount" class="   mt-1 text-sm dark:text-gray-300 dark:border-gray-600
           dark:bg-gray-700 form-multiselect focus:border-purple-400 focus:outline-none focus:shadow-outline-purple
            dark:focus:shadow-outline-gray" required>
            <?php
            echo "<option>{$row['Labour_discount']  }%</option>";
              ?>
            <option value="5">5%</option>
            <option value="10">10%</option>
            <option value="15">15%</option>
            <option value="20">20%</option>
          </select>
        </label>

        <label class=" mt-4 text-sm">
          <span class="text-gray-700 dark:text-gray-400">
          All filter check
          </span>
          <select name="All_filter_check" class="   mt-1 text-sm dark:text-gray-300 dark:border-gray-600
           dark:bg-gray-700 form-multiselect focus:border-purple-400 focus:outline-none focus:shadow-outline-purple
            dark:focus:shadow-outline-gray" required>
            <?php
                      $status  = $row['all_filter_check'];
                      if ($status == 1) {
                        echo "<option>Yes</option>";
                        echo "<option value='0'>No</option>";
                      } else {
                        echo "<option>No</option>";
                        echo "<option value='1'>Yes</option>";
                      }
                      ?>
            <?php
              ?>
          </select>
        </label>

        <label class=" mt-4 text-sm">
          <span class="text-gray-700 dark:text-gray-400">
          Tire rotation
          </span>
          <select name="tire_rotation" class="   mt-1 text-sm dark:text-gray-300 dark:border-gray-600
           dark:bg-gray-700 form-multiselect focus:border-purple-400 focus:outline-none focus:shadow-outline-purple
            dark:focus:shadow-outline-gray" required>
            <?php
                      $status  = $row['tire_rotation'];
                      if ($status == 1) {
                        echo "<option>Yes</option>";
                        echo "<option value='0'>No</option>";
                      } else {
                        echo "<option>No</option>";
                        echo "<option value='1'>Yes</option>";
                      }
                      ?>
            <?php
              ?>
          </select>
        </label>


        <label class=" mt-4 text-sm">
          <span class="text-gray-700 dark:text-gray-400">
          Road assistance
          </span>
          <select name="no_road_assist" class="   mt-1 text-sm dark:text-gray-300 dark:border-gray-600
           dark:bg-gray-700 form-multiselect focus:border-purple-400 focus:outline-none focus:shadow-outline-purple
            dark:focus:shadow-outline-gray" required>
            <?php
                      $status  = $row['no_road_assist'];
                      if ($status == 1) {
                        echo "<option>Yes</option>";
                        echo "<option value='0'>No</option>";
                      } else {
                        echo "<option>No</option>";
                        echo "<option value='1'>Yes</option>";
                      }
                      ?>
            <?php
              ?>
          </select>
        </label>

        <label class="block text-sm">
          <span class="text-gray-700 dark:text-gray-400">Price</span>
          <input name="price" value="<?php echo $row['price'];?>"  type="number" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700
           focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray
            form-input" placeholder="Enter price of service." required min="1" />
        </label><br>
        <div>
          <a href="../admin/membership.php">
            <button name="submit" class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
              Submit
            </button></a>

          <a href="../admin/membership.php">
            <button name="cancel" class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" formnovalidate>
              Cancel
            </button></a>
        </div>
        <?php } } ?>
    </form>
  </div>
  </div>
  </div>
</main>
</div>
</div>
</body>

</html>
