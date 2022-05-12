<?php
require "sidebar.php" ;
require "../lockscreen/connection.php";
require "save-staff.php";

$staff_id = "";
 $name = "";
 $phone= "";
 $job_desc ="";
 $hire_date = "";
 $salary = "";
 $is_mechanic ="";
 $is_attendee = "";
 $email = ""; 
 ?>
<head>
<script type="text/javascript" src="validation.js"></script>
</head>
<main class="h-full pb-16 overflow-y-auto">
  <div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
      Add staff
    </h2>
    <form action="save-staff.php" method="POST" autocomplete="">
   
    <?php
    
    

    if (isset($_GET['id'])) {
        $staff_id = $_GET['id'];
        $sql = "SELECT * FROM user JOIN staff ON staff.Useruser_id = user.user_id WHERE staff.staff_id = $staff_id";
        $res = mysqli_query($con, $sql)  or die("quary failed");
        if (mysqli_num_rows($res) > 0) {
          while ($row = mysqli_fetch_assoc($res)) {
            $staff_id = $row['staff_id'];
            $user_id = $row['user_id'];
            $name = $row['user_name'];
            $phone= $row['user_phone'];
            $job_desc = $row['job_desc'];
            $hire_date = $row['hire_date'];
            $salary = $row['salary'];
            $is_mechanic = $row['is_mechanic'];
            $is_attendee = $row['is_attendee'];
            $email = $row['user_email'];
          }
        }
      }
    

      ?>
      <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
      <?php
        if (isset($_GET['id'])) {
        ?>
          <input name="staff-id" type="hidden" value="<?php echo $staff_id ?>">
          <input name="user_id" type="hidden" value="<?php echo $user_id  ?>">
        <?php
        }
        ?>
        <label class="block text-sm">
          <span class="text-gray-700 dark:text-gray-400"> Name</span>&nbsp;&nbsp;&nbsp;<span id='name_message'></span><br>
          <input name="staff-name" id="name" value="<?php echo $name; ?>" class="block w-full mt-1 text-sm dark:border-gray-600 
        dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple
         dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Enter your name" required />
        </label><br>
        <label class="block text-sm">
          <span class="text-gray-700 dark:text-gray-400">Phone</span>&nbsp;&nbsp;&nbsp;<span id='phone_message'></span><br>
          <input name="staff-phone" id="mobile" onkeyup='check_phone();' value="<?php echo $phone;?>" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400
         focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Enter your phone number" required min="1" type="number" />
        </label>
        <label class="block mt-4 text-sm">
          <span class="text-gray-700 dark:text-gray-400">Job Description</span>
          <textarea name="staff-desc"  class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 
          form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" rows="3" placeholder="Details of work" required>
          <?php echo trim($job_desc);?>
        </textarea>
        </label><br>
        <label class="block text-sm">
          <span class="text-gray-700 dark:text-gray-400"> Join date</span>
          <input name="join-date" value="<?php echo $hire_date;?>" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400
           focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" type="date" placeholder="dd-mm-yyyy" min="<?php echo date("Y-m-d"); ?>" required />
        </label><br>
        <label class="block text-sm">
          <span class="text-gray-700 dark:text-gray-400">Salary</span>
          <input name="staff-salary" value="<?php echo $salary?>" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400
           focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Enter Salary" required type="number" min="1" />
        </label><br>
        <h2 class="text-gray-700 dark:text-gray-400">Staff Login Details</h2> <label class="block mt-4 text-sm">
          <span class="text-gray-700 dark:text-gray-400">
              <?php
            if($is_mechanic == 1)
            {
              $Designation = "mechanic";
            } 
            else
            {
              $Designation = "Attendee";
            }
            ?>
            Designation  : 
            <?php 
              if (isset($_GET['id'])) {
            echo $Designation;}?>
          </span>
          <br>
          <select name="type" class="block mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700  focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
            <option value="0">Attendee</option>
            <option value="1">Mechanic</option>
          </select>
        </label><br>
        <label class="block text-sm">
          <span class="text-gray-700 dark:text-gray-400"> Email</span>
          <input name="email" type="email" value="<?php echo $email ?>" class="block w-full mt-1 text-sm dark:border-gray-600 
        dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple
         dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Enter your name" required />
        </label><br>
        <?php 
              if (isset($_GET['id'])) {
                $type = "hidden";
              }
              else
              {
              ?>


        <label class="block mt-4 text-sm " >
          <span class="text-gray-700 dark:text-gray-400">Password</span>
          <input name="password" id="password" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 
          focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300
           dark:focus:shadow-outline-gray form-input" placeholder="***************" type="password" required min="1" />
        </label>
        <label class="block mt-4 text-sm">
          <span class="text-gray-700 dark:text-gray-400">Confirm Password</span> <span class="ml-5" id='pass_message'></span><br>
          <input name="cpassword"  onkeyup='check_pass();' id="cpassword" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 
          focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300
           dark:focus:shadow-outline-gray form-input" placeholder="***************" type="password" required min="1" />
           </label><br>
        <?php }?>
        <div>

          <a href="../admin/Staff.php">
            <button name="submit" class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
              Submit
            </button></a>

          <a href="../admin/staff.php">
            <button name="cancel" class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent
             rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" formnovalidate>
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
