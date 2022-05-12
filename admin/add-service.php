<?php require "sidebar.php";

?>
<main class="h-full pb-16 overflow-y-auto">
  <div class="container px-6 mx-auto grid">
    <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
      Add New Service
    </h2>
    <form action="save-service.php" method="POST" autocomplete="">
      <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <label class="block text-sm">
          <span class="text-gray-700 dark:text-gray-400">Service Name</span>
          <input name="service-name" id="service-name" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Enter your service name" required ' />
          <div id="uname_response"></div>
        </label>
          <br>
        <label class="block text-sm">
          <span class="text-gray-700 dark:text-gray-400">Price</span>
          <input name="service-desc" type="number" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Enter price of service." required min="1" />
        </label><br>
        <label class="block mt-4 text-sm">
          <span class="text-gray-700 dark:text-gray-400">Service Description</span>
          <textarea name="service-price" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" rows="3" placeholder="Enter some details of service." required minlength="1"></textarea>
        </label><br>
        <div>
          <a href="../admin/service.php">
            <button name="submit" class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
              Submit
            </button></a>
          <a href="../admin/service.php">
            <button name="cancel" class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg 
            active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" formnovalidate>
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


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {

        $("#service-name").keyup(function() {

            var service = $(this).val().trim();

            if (service != '') {

                $.ajax({
                    url: 'save-service.php',
                    type: 'post',
                    data: {
                      service: service,
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

