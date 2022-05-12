<head>
    <link rel="stylesheet" href="css/style.css">
</head>
<?php
require "sidebar2.php";
require "../lockscreen/connection.php";
$j_id  = 0;
$a_id = 0;
$stf = 0;
$ptf  = 0;



if (isset($_GET['id'])) {
    $a_id =  $_GET['id'];
    $check = "SELECT *  FROM job_card WHERE job_card.appointmentappointment_id = $a_id";
    
    $get_id = mysqli_query($con, $check);
    if (mysqli_num_rows($get_id) > 0) {
        $fetch = mysqli_fetch_array($get_id);
        $j_id = $fetch['jobcard_id'];
        $_SESSION['j_id'] = $j_id;
        if (isset($_POST["submit"])) {
            //get the sum of service total
            $st = "SELECT sum(job_card_servics.price) as ST FROM job_card_servics WHERE job_card_servics.Job_cardjobcard_id = $j_id";
            if ($row = mysqli_query($con, $st)) {
                $st_fetch = mysqli_fetch_assoc($row);
                $stf = $st_fetch['ST'];
                if (empty($stf)) {
                    $stf = 0;
                }
            }
            //get the sum of parts total
            $pt = "SELECT sum(job_card_parts.price)  as PT FROM job_card_parts WHERE job_card_parts.Job_cardjobcard_id = $j_id";
            if ($row1 = mysqli_query($con, $pt)) {
                $st_fetch = mysqli_fetch_assoc($row1);
                $ptf = $st_fetch['PT'];
                if (empty($ptf)) {
                    $ptf = 0;
                }
            }
            //update jobcard
            $update_price = "UPDATE job_card SET job_card.price = ($stf + $ptf) WHERE job_card.jobcard_id =  $j_id";
            if (mysqli_query($con, $update_price)) {
                echo "<script> location.href='../attendee/appointment.php'; </script>";
            } else {
                echo "locha";
            }
        }
        if (isset($_POST["Cancel"])) {
            echo "<script> location.href='../attendee/appointment.php'; </script>";
        }
    } else {
        // Return current date from kolkata
        date_default_timezone_set('Asia/Kolkata');
        $date = date('Y-m-d  ');
        $time = date(' h:i:s');
        $price = 0;
        $status = 0;
        $completed_date = "0000-00-00";
        $sql1 = "INSERT INTO job_card (jobcard_id,jobcard_date,jobcard_time,price,appointmentappointment_id,status ,completed_date)
  VALUES('','{$date}'  ,'{$time}', '{$price}','{$a_id}','{$status}','{$completed_date}')";
        $create =  mysqli_query($con, $sql1) or die("can't create jobcard");
        $check1 = "SELECT *  FROM job_card WHERE job_card.appointmentappointment_id = $a_id";
        $get_id1 = mysqli_query($con, $check1);
        if (mysqli_num_rows($get_id) > 0) {
            $fetch1 = mysqli_fetch_array($get_id1);
            $j_id = $fetch['jobcard_id'];
            $_SESSION['j_id'] = $j_id;
        }
    }
}
//  else {
//     echo "<script> location.href='../attendee/appointment.php'; </script>";
// }
?>
<main class="h-full pb-16 overflow-y-auto">
    <form name="hello" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" autocomplete="">
        <?php
        $sql = "SELECT * , model.model_name, user.user_name , user.user_phone,vehicle.rto_number FROM job_card JOIN appointment ON appointment.appointment_id =job_card.appointmentappointment_id JOIN vehicle ON vehicle.rto_number = appointment.Vehicle_rto_number JOIN customer ON customer.customer_id = appointment.customercustomer_id JOIN user ON user.user_id = customer.Useruser_id  JOIN  model ON model.car_model_id = vehicle.modelcar_model_id  WHERE job_card.jobcard_id  =
        $j_id";
        // echo $sql;
        $res = mysqli_query($con, $sql)  or die("quary failed");
        if (mysqli_num_rows($res) > 0) {
            while ($row = mysqli_fetch_assoc($res)) {
        ?>
                <div class="container px-6 mx-auto grid ">
                    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
                        Job Card
                    </h2>
                    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                        <?php
                        if (isset($_GET['id'])) {
                        ?>
                            <input name="jobcard" type="hidden" value="<?php echo $j_id ?>">
                        <?php
                        }
                        ?>
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Name of Customer</span>
                            <input value="<?php echo $row['user_name'] ?>" class="block mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" type="text" placeholder="Enter name of employee" disabled />
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
                        </label>
    </form>
    <form id="addform" method="POST">
        <!-- dropdown list -->
        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">
                Service
            </span>
            <?php
                $sql2 = "SELECT *  FROM servics  WHERE servics.is_active = 1";
                $result = mysqli_query($con, $sql2);
                if (mysqli_num_rows($result) > 0) {
                    echo '<select id="service_id" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-multiselect focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" >
                  <option value="" selected disabled>select service</option>';
                    while ($row1 = mysqli_fetch_assoc($result)) {
                        echo "<option value='{$row1['service_id']}'>{$row1['service_name']}</option>";
                    }
                    echo "</select>";
                }
            ?>
        </label><br>
        <div>
            <button id="service-add" class="px-2 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                Add service
            </button>
        </div>
        <!-- puru dropdown -->
        </br>

        <table class="w-full whitespace-no-wrap " id="table-data">
        </table>


        <!--  -->
        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">
                Parts
            </span>
            <?php
                $sql3 = "SELECT * ,part_img.part_img_path FROM parts JOIN part_img ON parts.parts_id = part_img.partsparts_id  WHERE parts.qty > 0";
                $result2 = mysqli_query($con, $sql3);
                if (mysqli_num_rows($result2) > 0) {
                    echo '<select id="parts_id"  class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-multiselect focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" >
                                <option value="" selected disabled>select parts</option>';
                    while ($row2 = mysqli_fetch_assoc($result2)) {
                        echo "<option value='{$row2['parts_id']}'>{$row2['part_name']}</option>";
                    }
                    echo "</select>";
                }
            ?>
        </label>
        <!-- puru dropdown -->
        </br>
        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">quantity</span>
            <input id="p_qty" name="price" type="number" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700
        focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray
        form-input" value="1" min="1"  max=""/>
        </label><br>
        <div>
            <button id="parts-add" class="px-2 py-2 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                Add parts
            </button>
        </div>

        <table class="w-full whitespace-no-wrap" id="parts-data">
        </table>

        <br>
        <!--  -->
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
        <div id="error-message"></div>
        <div id="success-message"></div>
        </div>
        </div>
        </div>
    </form>
<?php }
        } ?>
</main>
</div>
</div>
</body>

</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // Load Table Records
        function loadTable() {
            $.ajax({
                url: "ajax-load.php",
                type: "POST",
                success: function(data) {
                    $("#table-data").html(data);
                }
            });
        }
        loadTable(); // Load Table Records on Page Load
        function loadParts() {
            $.ajax({
                url: "ajax-load-parts.php",
                type: "POST",
                success: function(data) {
                    $("#parts-data").html(data);
                }
            });
        }
        loadParts(); // Load Table Records on Page Load
        // 
        // Insert New service
        $("#service-add").on("click", function(e) {
            $("#error-message").html("All fields are required.").slideDown();
            $("#success-message").slideUp();
            var service_id = $("#service_id").val();
            if (service_id == null) {
                alert("select service first")
            } else {
                $.ajax({
                    url: "ajax-insert.php",
                    type: "POST",
                    data: {
                        sid: service_id
                    },
                    success: function(data) {
                        if (data == 1) {
                            loadTable();
                        } else {
                            alert("Can't add service.");
                        }
                    }
                });
            }
        });


        $('#parts_id').change(function() 
        {
            var Id = $(this).val();
            $.ajax({
                type: "POST",
                url: "ajax-p-price.php",
                data: {
                    Id: Id},
                success: function(data) {
                    if(data != 0)
                    {

                    // document.write(data);
                    // var b = document.querySelector("p_qty");
                    // // const b = document.getElementById('p_qty');
                    // b.setAttribute("max", data);

                    document.getElementById("parts_id").setAttribute("max", data);
                    }
                    else
                    {
                        document.write("as");
                    }
                }
            });
        });



        // Insert New parts
        $("#parts-add").on("click", function(e) {
            var parts_id = $("#parts_id").val();
            var parts_qty = $("#p_qty").val();
            if (parts_id == null) {
                alert("select parts first")
            } else {
                $.ajax({
                    url: "ajax-insert-parts.php",
                    type: "POST",
                    data: {
                        pid: parts_id,
                        qty: parts_qty
                    },
                    success: function(data) {
                        if(data == false)
                        {
                            console.write("aai");
                        }
                        if (data == 1) {
                            loadParts();
                        } else {
                            alert("Can't add Parts.");
                        }
                    }
                });
            }
        });


        //delete service service
        $(document).on("click", ".delete-btn", function() {
            if (confirm("Do you really want to delete this service ?")) {
                var serviceId = $(this).data("id");
                var element = this;
                $.ajax({
                    url: "ajax-delete.php",
                    type: "POST",
                    data: {
                        id: serviceId
                    },
                    success: function(data) {
                        if (data == 1) {
                            $(element).closest("tr").fadeOut();
                            // loadTable();
                        } else {
                            alert("can't delete record");
                        }
                    }
                });
            }
        });

        
        //delete service parts
        $(document).on("click", ".delete-btn2", function() {
            if (confirm("Do you really want to delete this service ?")) {
                var partsId = $(this).data("id");
                var element = this;
                $.ajax({
                    url: "ajax-delete-parts.php",
                    type: "POST",
                    data: {
                        id: partsId
                    },
                    success: function(data) {
                        if (data == 1) {
                            $(element).closest("tr").fadeOut();
                            // loadTable();
                        } else {
                            alert("can't delete record");
                        }
                    }
                });
            }
        });



    });
</script>