<?php require "sidebar.php";
require "../lockscreen/connection.php";
$model_name = "";



if (isset($_POST['submit'])) {

  $model_name = mysqli_real_escape_string($con, $_POST['model-name']);
  
  if (isset($_GET['id'])) {
    $id  = $_GET["id"];
    $update_sql = "UPDATE model SET model_name='$model_name' WHERE car_model_id = $id";
    if (mysqli_query($con, $update_sql)) {
      echo "<script> location.href='../admin/v-model.php'; </script>";
    } else {
      echo "<script>alert('Error while updating type...');</script>";
    }
  }
  
  
  $maker_id = mysqli_real_escape_string($con, $_POST['car_maker']);
  $add_sql = "INSERT INTO model(car_model_id,model_name,Makermaker_id) VALUES ('','$model_name', '$maker_id')";
  if (mysqli_query($con, $add_sql)) {
    echo "<script> location.href='../admin/v-model.php'; </script>";
  } else {
    echo "<script>alert('Error while model type...');</script>";
  }

}


if (isset($_POST['cancel'])) {
  echo "<script> location.href='../admin/v-model.php'; </script>";
}




?>
<main class="h-full pb-16 overflow-y-auto">
  <div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
      New vehicle Model
    </h2>
    <?php
    if (isset($_GET["id"])) {
      $id  = $_GET["id"];
      $sql = "SELECT model.* , maker.maker_name ,car_type.name   from model JOIN maker ON model.Makermaker_id = maker.maker_id JOIN car_type ON maker.car_typecar_type_id = car_type.car_type_id where model.car_model_id = $id";
      $row = mysqli_fetch_assoc(mysqli_query($con, $sql));
      $type_name = $row['name'];
      $brand_name = $row['maker_name'];
      $model_name = $row['model_name'];
    }
    ?>
    <form action="" method="POST" autocomplete="">
      <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <?php
        if (isset($_GET["id"])) {
        ?>
          <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400"> Type </span>
            <input value="<?php echo $type_name; ?>" type="text" name="type-name" id="maker-name" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Enter Car Type" required disabled />
          </label><br>
          <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400"> maker Name</span>
            <input value="<?php echo $brand_name; ?>" type="text" name="type-name" id="maker-name" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Enter Car Type" required disabled />
          </label>

        <?php } else {
        ?>



          <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Select Car Type</span>


            <select name="car_type" id="county" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
              <option value="">select type</option>
            </select>


          </label>
          <br>
          <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Select maker</span>



            <select name="car_maker" id="state" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
              <option value="" selected disabled>select maker</option>
            </select>




          </label>
        <?php  } ?>



        <br>
        <label class="block text-sm">
          <span class="text-gray-700 dark:text-gray-400">model name</span>

          <input value="<?php echo $model_name; ?>" type="text" name="model-name" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Enter maker" required ' />
       </label>
          <br> 
      



      <div>
        <a href="">
          <button name="submit" class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
            Submit
          </button></a>
        <a href="">
          <button name="cancel" class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg 
            active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" formnovalidate>
            Cancel
          </button></a>
      </div>
      <!-- Validation inputs -->

      </div>
    </form>
  </div>
  </div>
</main>
</div>
</div>
</body>

</html>



<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script>  
    $(document).ready(function() {
        function LoadData(type, cat_id) {
            $.ajax({
                url: "load-type.php",
                type: "POST",
                data: {
                    type: type,
                    id: cat_id
                },
                success: function(data) {
                    if (type == "statedata") {
                        $("#state").html(data);
                    }else {
                        $("#county").append(data);
                    }
                }
            });
        }
        LoadData();

        $("#county").on("change", function() {

            var county = $("#county").val();

            if (county != "") {
                LoadData("statedata", county);
            } else {
                $("#state").html("");
                $("#area").html("");
            }
        });



    });
</script>