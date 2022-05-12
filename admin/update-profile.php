w<?php include "sidebar.php";
?>
<main class="h-full pb-16 overflow-y-auto">
  <div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
      Update profile
    </h2>
    <form action="save-update-profile.php" method="POST" autocomplete="">
       <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
       <?php 
      require "../lockscreen/connection.php";
      $admin_id = $_GET['id'];
      
      $sql = "SELECT *  FROM user JOIN administrator on user.user_id =  administrator.Useruser_id 
      WHERE administrator.admin_id='$admin_id'";
      
      $res = mysqli_query($con, $sql);
      if (mysqli_num_rows($res) > 0) {
          $row = mysqli_fetch_assoc($res);
        }
          
      ?>
       <input type="hidden" name="id" value="<?php echo $row['user_id']; ?>" placeholder="">
        <label class="block text-sm">
          <span class="text-gray-700 dark:text-gray-400">Name </span>
          <input name="user_name" value="<?php echo $row['user_name'];?>"  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400
           focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray 
           form-input" placeholder="Enter Membership name" required/>
        </label><br>

        <label class="block text-sm">
          <span class="text-gray-700 dark:text-gray-400">Phone </span>
          <input name="phone" value="<?php echo $row['user_phone'];?>"  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400
           focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray 
           form-input" placeholder="Enter Membership name" required/>
        </label><br>

        <label class="block text-sm">
          <span class="text-gray-700 dark:text-gray-400">Email </span>
          <input name="email" value="<?php echo $row['user_email'];?>"  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400
           focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray 
           form-input" placeholder="Enter Membership name" required/>
        </label><br>

        
        <label class="block mt-4 text-sm">
          <span class="text-gray-700 dark:text-gray-400">Address</span>
          <textarea name="address"  class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 
          dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple 
          dark:focus:shadow-outline-gray" rows="3" placeholder="Membership details..." required>
          <?php echo trim($row['user_add']);?>
        </textarea>
          
        </label>
        <br>

        <div>
          
            <button name="submit" class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
              Submit
            </button>

          
            <button name="cancel" class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" formnovalidate>
              Cancel
            </button>
        </div>
        
    </form>
  </div>
  </div>
  </div>
</main>
      <?php 
      require "../lockscreen/connection.php";
      $admin_id = $_GET['id'];
      $sql = "SELECT *  FROM user JOIN administrator on user.user_id =  administrator.Useruser_id 
      WHERE user.user_email='$admin_id'";
      $res = mysqli_query($con, $sql)  or die("quary failed");
      if (mysqli_num_rows($res) > 0) {
        {
            $row = mysqli_fetch_assoc($res);
      ?>
       <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
       <input type="hidden" name="id" value="<?php echo $row['admin_id']; ?>" placeholder="">
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
          <?php echo trim($row['mem_desc']);?>
        </textarea>
          
        </label>
        <br>
        <label class=" text-sm">
          <span class="text-gray-700 dark:text-gray-400">
            Validity
          </span>
          <select name="duration" class="block  mt-1 text-sm dark:text-gray-300 dark:border-gray-600
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
        
        <label class="block mt-4 text-sm">
          <span class="text-gray-700 dark:text-gray-400">
            Disscount
          </span>
          <select name="discount" class=" block  mt-1 text-sm dark:text-gray-300 dark:border-gray-600
           dark:bg-gray-700 form-multiselect focus:border-purple-400 focus:outline-none focus:shadow-outline-purple
            dark:focus:shadow-outline-gray" required>
            <?php
            echo "<option>{$row['mem_disscount']  }%</option>";
              ?>
            <option value="5">5%</option>
            <option value="10">10%</option>
            <option value="15">15%</option>
            <option value="20">20%</option>
          </select>
        </label>
        <label class="block mt-4 text-sm">
          <span class="text-gray-700 dark:text-gray-400">
            car wash
          </span>
          <select name="car-wash" class=" block  mt-1 text-sm dark:text-gray-300 dark:border-gray-600
           dark:bg-gray-700 form-multiselect focus:border-purple-400 focus:outline-none focus:shadow-outline-purple
            dark:focus:shadow-outline-gray" required>
            <?php
            echo "<option>{$row['no_car_wash']  }</option>";
              ?>
            <option value="5">3</option>
            <option value="5">5</option>
            <option value="10">10</option>
            <option value="15">15</option>
            <option value="20">20</option>
          </select>
        </label>

        <label class="block mt-4 text-sm">
          <span class="text-gray-700 dark:text-gray-400">
            oil change
          </span>
          <select name="oil-change" class=" block  mt-1 text-sm dark:text-gray-300 dark:border-gray-600
           dark:bg-gray-700 form-multiselect focus:border-purple-400 focus:outline-none focus:shadow-outline-purple
            dark:focus:shadow-outline-gray" required>
            <?php
            echo "<option>{$row['no_oil_change']  }</option>";
              ?>
            <option value="5">3</option>
            <option value="5">5</option>
            <option value="10">10</option>
            <option value="15">15</option>
            <option value="20">20</option>
          </select>
        </label>

        <label class="block mt-4 text-sm">
          <span class="text-gray-700 dark:text-gray-400">
            Road Assistance
          </span>
          <select name="r-assist" class=" block  mt-1 text-sm dark:text-gray-300 dark:border-gray-600
           dark:bg-gray-700 form-multiselect focus:border-purple-400 focus:outline-none focus:shadow-outline-purple
            dark:focus:shadow-outline-gray" required>
            <?php
            echo "<option>{$row['no_road_assist']  }</option>";
              ?>
            <option value="5">3</option>
            <option value="5">5</option>
            <option value="10">10</option>
            <option value="15">15</option>
            <option value="20">20</option>
          </select>
        </label>
        <label class="block mt-4 text-sm">
          <span class="text-gray-700 dark:text-gray-400">
            Oil filter check
          </span>
          <select name="oil-filter" class=" block  mt-1 text-sm dark:text-gray-300 dark:border-gray-600
           dark:bg-gray-700 form-multiselect focus:border-purple-400 focus:outline-none focus:shadow-outline-purple
            dark:focus:shadow-outline-gray" required>
            <?php
            echo "<option>{$row['no_oil_filter_check']  }</option>";
              ?>
            <option value="5">3</option>
            <option value="5">5</option>
            <option value="10">10</option>
            <option value="15">15</option>
            <option value="20">20</option>
          </select>
        </label>
        <label class="block mt-4 text-sm">
          <span class="text-gray-700 dark:text-gray-400">
            Air filter check
          </span>
          <select name="air-filter" class=" block  mt-1 text-sm dark:text-gray-300 dark:border-gray-600
           dark:bg-gray-700 form-multiselect focus:border-purple-400 focus:outline-none focus:shadow-outline-purple
            dark:focus:shadow-outline-gray" required>
            <?php
            echo "<option>{$row['no_air_filter']  }</option>";
              ?>
            <option value="5">3</option>
            <option value="5">5</option>
            <option value="10">10</option>
            <option value="15">15</option>
            <option value="20">20</option>
          </select>
        </label><br>

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