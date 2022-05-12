<?php require "sidebar.php";
require "../lockscreen/connection.php";
$brand_name = "";


if (isset($_POST['submit'])) {
  $maker_name = mysqli_real_escape_string($con, $_POST['maker-name']);

  //check for update
  if (isset($_GET['id'])) {
    $id  = $_GET["id"];
    $update_sql = "UPDATE maker SET maker_name='$maker_name' WHERE maker_id = $id";
    if (mysqli_query($con, $update_sql)) {
      echo "<script> location.href='../admin/v-brand.php'; </script>";
    } else {
      echo "<script>alert('Error while updating maker...');</script>";
    }
  }


  //dropdown value
  $car_type = mysqli_real_escape_string($con, $_POST['car_type']);


  $match_brand = "select * from maker where maker_name='$maker_name' and car_typecar_type_id =$car_type ";

  if (mysqli_num_rows(mysqli_query($con, $match_brand)) > 0) {
    echo "<script>alert( 'maker already exist...');</script>";
  } else {
    $add_sql = "INSERT INTO maker(maker_id,maker_name, car_typecar_type_id) VALUES ('','$maker_name','$car_type')";
    if (mysqli_query($con, $add_sql)) {
      echo "<script> location.href='../admin/v-brand.php'; </script>";
    } else {
      echo "<script>alert('Error while adding maker...');</script>";
    }
  }
}
if (isset($_POST['cancel'])) {
  echo "<script> location.href='../admin/v-brand.php'; </script>";
}



?>
<main class="h-full pb-16 overflow-y-auto">
  <div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
      New Vehicle Brand
    </h2>
    <?php
    if (isset($_GET["id"])) {
      $id  = $_GET["id"];
      $sql = "SELECT maker.* , car_type.name FROM maker JOIN car_type ON maker.car_typecar_type_id = car_type.car_type_id where maker.maker_id = $id";
      $row = mysqli_fetch_assoc(mysqli_query($con, $sql));
      $type_name = $row['name'];
      $brand_name = $row['maker_name'];
    }
    ?>

    <form action="" method="POST" autocomplete="">
      <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <?php
        if (isset($_GET["id"])) {
        ?>
          <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">Car Type Name</span>
            <input value="<?php echo $type_name; ?>" type="text" name="type-name" id="maker-name" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Enter Car Type" required disabled />
          </label>
        <?php }
        else
        {
           ?>
           <label class="block text-sm">
          <span class="text-gray-700 dark:text-gray-400">Select Car Type</span>
          <?php
      $sql1 = "SELECT *  FROM car_type";
      $res1 = mysqli_query($con, $sql1);
      if (mysqli_num_rows($res1) > 0) {
      ?>

      <select name="car_type" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input">
      <option value="" selected disabled>select type</option>
      <?php

          while ($row1 = mysqli_fetch_assoc($res1)) {
            echo "<option value='{$row1['car_type_id']}'>{$row1['name']}</option>";
          }
          ?>
          </select>
          </label>
         <?php }}?>
        <br>
        <label class="block text-sm">
          <span class="text-gray-700 dark:text-gray-400">maker Name</span>

          <input value="<?php echo $brand_name; ?>" type="text" name="maker-name"  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Enter maker" required ' />
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