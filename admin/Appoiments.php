<?php require_once "sidebar.php";
require "../lockscreen/connection.php" ?>
<main class="h-full overflow-y-auto">

    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Appoiments
        </h2>
        
        
        <!-- With actions -->

        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                    <table class="w-full whitespace-no-wrap" id="tbl_body">

                        <?php

                        $sql1 = "SELECT staff.*,user.user_name FROM staff JOIN user on user.user_id = staff.Useruser_id WHERE staff.is_attendee = 1";
                        $res1 = mysqli_query($con, $sql1);
                        if (mysqli_num_rows($res1) > 0) {
                        ?>
                            <select name="staff_id" id="staff_id" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
                                <option value="" selected disabled>select type</option>
                                <?php
                                while ($row2 = mysqli_fetch_assoc($res1)) {
                                    echo "<option value='{$row2['staff_id']}'>{$row2['user_name']}</option>";
                                }
                                ?>
                            </select>
                            <br>
                        <?php
                        }
                        ?>
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                            <tr>
                                <td style=" color: white;">
                                Select Attendee to view appoiments
                                </td>
                            </tr>
                        </tbody>
                    </table>
            </div>


        </div>
    </div>
    </div>
</main>






<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
  $(document).on("change", "#staff_id", function() {
      var staff_id = $("#staff_id").val();
    $.ajax({
      url: 'getData.php',
      type: 'POST',
      data: {
        dropdown: staff_id
      },
      success: function(data) {
        $("#tbl_body").html(data);
        $("#pagination").hide();

      }
    });
  });
</script>