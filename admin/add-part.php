<?php require "sidebar.php";
require "../lockscreen/connection.php";
$part_id = "";
$name = "";
$desc = "";
$date = "";
$Quantity = "";
$Price = "";
?>
<main class="h-full pb-16 overflow-y-auto">
  <div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
      Add Parts
    </h2>
    <form action="save-part.php" method="POST" enctype="multipart/form-data">
      <?php
      if (isset($_GET['id'])) {
        $part_id = $_GET['id'];
        $sql = "SELECT * ,part_img.part_img_path FROM parts JOIN part_img ON parts.parts_id = part_img.partsparts_id
        where parts.parts_id = $part_id";
        $res = mysqli_query($con, $sql)  or die("quary failed");
        if (mysqli_num_rows($res) > 0) {
          while ($row = mysqli_fetch_assoc($res)) {
            $part_id = $row['parts_id'];
            $name = $row['part_name'];
            $desc = $row['part_desc'];
            $date = $row['purchase_date'];
            $Quantity = $row['qty'];
            $Price = $row['part_price'];
            $path = $row['part_img_path'];
          }
        }
      } else {
        // echo "<script> location.href='../admin/add-part.php'; </script>";
      }

      ?>
      <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <?php
        if (isset($_GET['id'])) {
        ?>
          <input name="part_id" type="hidden" value="<?php echo $part_id  ?>">
        <?php
        }
        ?>

        <label class="block text-sm">
          <span class="text-gray-700 dark:text-gray-400">Part Name </span>
          <input name="part-name" id="part-name"  value="<?php echo $name; ?>" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Enter your name" required />
          <br><div id="uname_response"></div>
        </label>

        <label class="block mt-4 text-sm">
          <span class="text-gray-700 dark:text-gray-400">Part Description</span>
          <textarea name="part-desc" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" rows="3" placeholder="Details of work" required>
          <?php echo $desc; ?>
          </textarea>
        </label>
        <br>
        <label class="block text-sm">
          <span class="text-gray-700 dark:text-gray-400">Purchase date</span>
          <input name="Pdate" value="<?php echo $date; ?>" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" type="date" placeholder="dd-mm-yyyy" max="<?php echo date("Y-m-d"); ?>" required />
        </label><br>
        <label class="block mt-4 text-sm">
          <span class="text-gray-700 dark:text-gray-400">
            Quantity
          </span>
          <input type="number" value="<?php echo $Quantity; ?>" name="qty" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" min="1" placeholder="" required />
        </label><br>
        <label class="block text-sm">
          <span class="text-gray-700 dark:text-gray-400">Price</span>
          <input type="number" value="<?php echo $Price; ?>" name="price" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Enter Price" required min="1" />
        </label><br>
        <label class="block mt-4 text-sm">
          <span class="text-gray-700 dark:text-gray-400">Pictures</span><br>
          <input name="fileToUpload" id="fileToUpload" type="file" onchange="return fileValidation()">
          <div id="imagePreview"></div>
          <script>
            function fileValidation() {
              var fileInput =
                document.getElementById('fileToUpload');

              var filePath = fileInput.value;



              // Allowing file type
              var allowedExtensions =
                /(\.jpg|\.jpeg|\.png)$/i;

              var size = parseFloat(fileInput.files[0].size / (1024 * 1024)).toFixed(2);
              if (size > 2) {
                alert('Please select image size less than 2 MB');
                return false;
              } else if (!allowedExtensions.exec(filePath)) {
                alert('This extension file not allowed, Please choose a JPG , jpeg or PNG file.');
                fileInput.value = '';
                return false;
              } else {

                // Image preview
                if (fileInput.files && fileInput.files[0]) {
                  var reader = new FileReader();
                  reader.onload = function(e) {
                    document.getElementById(
                        'imagePreview').innerHTML =
                      '<img src="' + e.target.result +
                      '"/>';
                  };

                  reader.readAsDataURL(fileInput.files[0]);
                }
              }
            }
          </script>

          <?php
          if (isset($_GET['id'])) {

          ?>
            <!-- <?php echo $path ?> -->
            <input type="hidden" name="old-image" value="<?php echo $path ?>">
            <img src="<?php echo $path ?>" height="150px" width="150px" alt="image not availabe">
          <?php
          }
          ?>
        </label><br>
        <div>
          <a href="../admin/parts.php">
            <button name="submit" class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
              Submit
            </button></a>

          <a href="../admin/parts.php">
            <button name="cancel" class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" formnovalidate>
              Cancel
            </button></a>
          </button>
        </div>

        <!-- Validation inputs -->
        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">


    </form>
  </div>
  </div>
  </div>
</main>
</div>
</div>
</body>

</html>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {

        $("#part-name").keyup(function() {

            var partName = $(this).val().trim();

            if (partName != '') {

                $.ajax({
                    url: 'save-part.php',
                    type: 'post',
                    data: {
                      partName: partName,
                    },
                    success: function(response) {

                        $('#uname_response').html(response);

                    }
                });
            } else {
                $("#uname_response").html("");
            }

        });

    });
</script>

