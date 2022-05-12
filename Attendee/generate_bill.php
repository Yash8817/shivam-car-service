<?php
require "sidebar2.php";
require "../lockscreen/connection.php";


$staff_email = $_SESSION['attendee_login'];
$sql_atnf = "SELECT * FROM user JOIN staff ON staff.Useruser_id = user.user_id WHERE user.user_email = '$staff_email'";
$staff_res = mysqli_query($con, $sql_atnf);
if (mysqli_num_rows($staff_res) > 0) {
    $staff_ary = mysqli_fetch_assoc($staff_res);
    $staff_id = $staff_ary['staff_id'];
}



$final_payment = 0;
$j_id = $_GET['id'];
$service_total_sql = "SELECT SUM(job_card_servics.price) as stotal from job_card_servics WHERE job_card_servics.Job_cardjobcard_id = ' $j_id' ";
$res1 = mysqli_query($con, $service_total_sql);
$res_total = mysqli_fetch_assoc($res1);
$rtotal = $res_total['stotal'];



$part_total_sql = "SELECT SUM(job_card_parts.price) as ptotal from job_card_parts WHERE job_card_parts.Job_cardjobcard_id = ' $j_id' ";
$res2 = mysqli_query($con, $part_total_sql);
$part_total = mysqli_fetch_assoc($res2);
$ptotal = $part_total['ptotal'];



if (isset($_POST['submit'])) {
    $date = date('Y-m-d  ');
    $typepayment_type_id = 1;
    $labour_charge = $_POST['labour_charge'];
    $total_amount = $rtotal + $ptotal + $labour_charge;
    $make_payment = "UPDATE job_card SET labour_charge ='$labour_charge' , complete = '1'  WHERE job_card.jobcard_id = $j_id;";
    $make_payment .= "INSERT INTO payment(payment_id,amount,payment_date,Job_cardjobcard_id,staffstaff_id,typepayment_type_id)
     VALUES ('','$total_amount','$date','$j_id','$staff_id','$typepayment_type_id')";

    if (mysqli_multi_query($con, $make_payment)) {
        echo "<script> location.href='payment.php'; </script>";
    } else {
        die("error in payment");
    }
}

?>
<main class="h-full pb-16 overflow-y-auto">
    <form name="hello" action="" method="POST" autocomplete="">
        <?php
        if (isset($_GET['id'])) {
            $j_id = $_GET['id'];
            $sql = "SELECT u.user_name, u.user_phone , v.rto_number, m.model_name ,j.jobcard_id  FROM user as u 
         JOIN  customer as c ON c.Useruser_id = u.user_id JOIN vehicle as v ON c.customer_id = v.customer_id 
         JOIN model as m ON v.modelcar_model_id  = m.car_model_id JOIN appointment as a ON  a.Vehicle_rto_number =v.rto_number
          JOIN job_card as j ON j.appointmentappointment_id = a.appointment_id WHERE j.jobcard_id = $j_id";
            $res = mysqli_query($con, $sql)  or die("quary failed");
            if (mysqli_num_rows($res) > 0) {
        ?>
                <div class="container px-6 mx-auto grid ">
                    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                        Job Card
                    </h2>
                    <?php
                    while ($row = mysqli_fetch_assoc($res)) {
                    ?>
                        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Name of Customer</span>
                                <input value="<?php echo $row['user_name'] ?>" class="block mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" type="text" placeholder="Enter name of employee" disabled />
                                <input type="hidden" id="jc_id" value="<?php echo $row['jobcard_id'] ?>" disabled />
                            </label><br>
                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Contact no</span>
                                <input value="<?php echo $row['user_phone'] ?>" class="block  mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" type="number" placeholder="Enter Contact number" disabled />
                            </label><br>
                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Vehicle RTO No</span>
                                <input value="<?php echo $row['rto_number'] ?>" class="block  mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Enter RTO number" disabled />
                            </label><br>
                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Model</span>
                                <input value="<?php echo $row['model_name'] ?>" class="block  mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Enter Worker name" disabled />
                                <input type="hidden" name="jobcardId" value="<?php echo $row['jobcard_id'] ?>" />
                            </label><br>
                        </div>
                <?php
                    }
                }
                ?>


                <p style="margin-bottom: 10px;color:white"> service  done</p>
                <?php
                $sql = "SELECT servics.* , job_card_servics.price  FROM servics  JOIN job_card_servics ON servics.service_id = job_card_servics.Servicsservice_id WHERE job_card_servics.Job_cardjobcard_id = $j_id";
                $res = mysqli_query($con, $sql) or die("quary failed");
                if (mysqli_num_rows($res) > 0) {
                ?>
                    <!-- /php  -->
                    <table class="w-full whitespace-no-wrap">
                        <thead class="border-b  bg-white">
                            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3">service Name</th>
                                <th class="px-4 py-3">service price</th>
                                <th class="px-4 py-3">description</th>
                            </tr>
                        </thead>
                        <?php
                        while ($row =  mysqli_fetch_array($res)) {
                        ?>
                            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                <tr class="text-gray-700 dark:text-gray-400">
                                    <td class="px-4 py-3 text-sm">
                                        <?php echo $row['service_name']; ?>
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        <?php echo $row['price']; ?>
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        <?php echo $row['service_desc']; ?>
                                    </td>
                                </tr>
                            </tbody>
                        <?php } ?>
                    </table>

                <?php } else {
                ?>
                    <h2 class='text-gray-700 dark:text-gray-400'> <br>No service Found.</h2>
                <?php
                }

                ?>
                <br>

                <p style="margin-bottom: 10px;color:white"> service total</p>
                <input type="number" value="<?php echo $rtotal; ?>" class="mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                <br>
                <p style="margin-bottom: 0;color:white">parts changed</p>
                <br>
                <?php
                $sql = "SELECT * ,  job_card_parts.part_used_qty , job_card_parts.price FROM parts  JOIN job_card_parts ON  parts.parts_id =job_card_parts.partsparts_id WHERE job_card_parts.Job_cardjobcard_id =$j_id";
                $res = mysqli_query($con, $sql) or die("quary failed");
                if (mysqli_num_rows($res) > 0) {
                ?>
                    <!-- /php  -->
                    <table class="w-full whitespace-no-wrap">
                        <thead>
                            <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3">part Name</th>
                                <th class="px-4 py-3">qty</th>
                                <th class="px-4 py-3">price</th>
                                <th class="px-4 py-3">description</th>
                            </tr>
                        </thead>
                        <?php
                        while ($row =  mysqli_fetch_array($res)) {
                        ?>
                            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                <tr class="text-gray-700 dark:text-gray-400">
                                    <td class="px-4 py-3 text-sm">
                                        <?php echo $row['part_name']; ?>
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        <?php echo $row['part_used_qty']; ?>
                                    </td>

                                    <td class="px-4 py-3 text-sm">
                                        <?php echo $row['price']; ?>
                                    </td>

                                    <td class="px-4 py-3 text-sm">
                                        <?php echo $row['part_desc']; ?>
                                    </td>
                                </tr>
                            </tbody>
                        <?php }
                        ?>
                    </table>

                    <br>
                    <p style="margin-bottom: 10px;color:white"> parts total</p>
                    <input type="number" value="<?php echo $ptotal; ?>" class="mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />
                    <br>
                <?php } else {
                ?>
                    <h2 class='text-gray-700 dark:text-gray-400'> <br>No parts Found.</h2>
            <?php
                }
            } else {
                echo "<script> location.href='../jobcard.php'; </script>";
            }
            ?>
            <hr>
            <p style="margin-bottom: 10px;color:white"> Add labour charges</p>
            <input type="text" name="labour_charge" id="labour_charge" class="mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" />

            <br>
            <div>
                <a href="jobcard.php">
                    <button name="submit" class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                        Submit
                    </button>
                </a>
                <a href="jobcard.php">
                    <button name="Cancel" class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                        Cancel
                    </button></a>
            </div>
            </table>

                </div>
                </div>
                </div>


    </form>

</main>
</div>
</div>
</body>

</html>