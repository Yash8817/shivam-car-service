<?php require "sidebar.php";
require "../lockscreen/connection.php" ?>
<main class="h-full pb-16 overflow-y-auto">
    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Update Service
        </h2>
        <form action="save-update-service.php" method="POST" enctype="multipart/form-data">
            <?php
            $service_id = $_GET['id'];
            $sql = "select *  from servics WHERE service_id = '{$service_id}'";
            $res = mysqli_query($con, $sql)  or die("quary failed");
            if (mysqli_num_rows($res) > 0) {
                while ($row = mysqli_fetch_assoc($res)) {
            ?>
                    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                        <input type="hidden" name="service_id" value="<?php echo $row['service_id']; ?>" placeholder="">
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Service Name</span>
                            <input name="service-name" value="<?php echo $row['service_name']; ?>" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Enter your service name" required />
                        </label><br>
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Price</span>
                            <input name="service-price" value="<?php echo $row['service_price']; ?>" type="number" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Enter price of service." required min="1" />
                        </label><br>
                        <label class="block mt-4 text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Service Description</span>
                            <textarea name="service-desc" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" rows="3" required>
                            <?php echo trim($row['service_desc']); ?>
                            </textarea>
                        </label><br>
                        <span class="text-gray-700 dark:text-gray-400">
                            Change status
                        </span>
                        <br>
                        <select name="type" class="block mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700  focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                            <option value="0">Active</option>
                            <option value="1">Disabled</option>
                        </select>
                        </label><br>
                        <div>
                            <a href="../admin/service.php">
                                <button name="submit" class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                                onclick="return confirm('Are you sure you want to update service?');">
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
<?php
                }
            }
?>
    </div>
    </div>
</main>
</div>
</div>
</body>

</html>