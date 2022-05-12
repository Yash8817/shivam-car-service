<?php

use function PHPSTORM_META\type;

require_once "../Attendee/sidebar2.php"; 
require "../lockscreen/connection.php"; 

?>
<html>
    <head>
    </head>
    <body>

    <main class="h-full pb-16 overflow-y-auto">
  <div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
      Appointment details
    </h2>
    <!-- <div class="example">
				<div class="meta">
					<button id="bookappmnt" class="bordered" >Confirm appointment!</button>
				</div>
			</div> -->
    <form name="hello" action="save-update-appmnt.php" method="POST" autocomplete="">
    <?php
            $appmnt = $_GET['id'];
            $sql = "SELECT *, status.status,vehicle.rto_number,model.model_name , user.user_name ,user.user_phone FROM appointment JOIN status ON status.status_id = appointment.statusstatus_id JOIN vehicle ON vehicle.rto_number = appointment.Vehicle_rto_number JOIN model ON model.car_model_id = vehicle.modelcar_model_id JOIN customer ON customer.customer_id = appointment.customercustomer_id JOIN user ON user.user_id = customer.Useruser_id WHERE appointment.appointment_id ='{$appmnt}'";
             $res = mysqli_query($con, $sql)  or die("quary failed");
             if (mysqli_num_rows($res) > 0) {
                 while ($row = mysqli_fetch_assoc($res)) {

            ?>
      <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
      <input type="hidden" name="a-id" value="<?php echo $row['appointment_id']; ?>" placeholder="">
      <label class="block text-sm">
          <span class="text-gray-700 dark:text-gray-400"> Appointment date</span>
          <input name="join-date" value="<?php echo $row['app_date'];  ?>"  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400
           focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" type="date" placeholder="dd-mm-yyyy" min="1980-01-01" max="2040-01-01"  disabled/>
        </label><br>
        <label class="block text-sm">
          <span class="text-gray-700 dark:text-gray-400"> Appointment time</span>
          <input name="join-date" value="<?php echo $row['app_time']; ?>" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400
           focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" type="time" placeholder="dd-mm-yyyy" min="1980-01-01" max="2040-01-01" required disabled/>
        </label><br>
        <label class="block text-sm">
          <span class="text-gray-700 dark:text-gray-400">Vehicle RTO Number</span>
          <input type="text" name="staff-name" value="<?php echo $row['rto_number']; ?>" class="block w-full mt-1 text-sm dark:border-gray-600 
        dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple
         dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="" required disabled/>
        </label><br>
        <label class="block text-sm">
          <span class="text-gray-700 dark:text-gray-400">Vehicle Chessis Number</span>
          <input type="text" name="staff-name" value="<?php echo $row['chassis_no']; ?>" class="block w-full mt-1 text-sm dark:border-gray-600 
        dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple
         dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="" required disabled/>
        </label><br>
        <label class="block text-sm">
          <span class="text-gray-700 dark:text-gray-400">Customer Name</span>
          <input type="text" name="staff-name" value="<?php echo $row['user_name']; ?>" class="block w-full mt-1 text-sm dark:border-gray-600 
        dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple
         dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="" required disabled/>
        </label><br>
        <label class="block text-sm">
          <span class="text-gray-700 dark:text-gray-400">Phone</span>
          <input name="staff-phone" value="<?php echo $row['user_phone']; ?>" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400
         focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="" required min="1" type="number" disabled/>
        </label></br>
        <label class="block text-sm">
          <span class="text-gray-700 dark:text-gray-400"> Email</span>
          <input name="email" type="email" value="<?php echo $row['user_email']; ?>" class="block w-full mt-1 text-sm dark:border-gray-600 
        dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple
         dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="" required disabled/>
        </label></br>
        <label class="block mt-4 text-sm">
          <span class="text-gray-700 dark:text-gray-400">Address</span>
          <textarea name="staff-desc"  class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 
          form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" rows="3" placeholder="Details of work" required disabled>
          <?php echo $row['user_add']; ?>
        </textarea></br>

        <?php if($row['statusstatus_id'] == 1) 
        {?>
        <div>
          <input type='image' name="confirm" src='book.png' class='del' style="height: 50px; " alt='Submit Form' onclick="return confirm('Are you sure you want to Update appoitment?');" />
        </div>
        <?php }
        else
        {?>
         <span class="text-gray-700 dark:text-gray-400 " style="margin-right: 10px;">
            Current status : &nbsp;
            <?php echo $row['status'] . "ed"; ?>
            &nbsp;&nbsp;
            Change status to
          </span>
          <select  name="status" class="text-sm dark:text-gray-300 dark:border-gray-600
           dark:bg-gray-700  focus:border-purple-400 focus:outline-none focus:shadow-outline-purple
            dark:focus:shadow-outline-gray" >
            <option value="1">Pending</option>
            <option value="3">Deny</option>
          </select>
        </label>
        <div>
          <input type='image' name="confirm" src='Update.png' class='del' style="height: 50px; " alt='Submit Form' onclick="return confirm('Are you sure you want to update appoitment?');" />
        </div>
        <?php 
        }
         ?>
      </div>

    </form>
    	
			
    <?php
     } 
    }
    ?>
  </div>
  </div>
  
</main>

    </body>  
</html>