<?php require "sidebar.php" ;
require_once "save-Q&S.php"; ?>
<main class="h-full pb-16 overflow-y-auto">
    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            New Blog
        </h2>
        <form action="save-Q&S.php" method="POST" autocomplete="">
                  
            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400"> Question</span>
                    <input name="heading" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700
                 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 
                 dark:focus:shadow-outline-gray form-input" required />

                    <label class="block mt-4 text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Awnser</span>
                        <textarea name="desc" class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600
                     dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple
                      dark:focus:shadow-outline-gray" rows="3" required></textarea>
                    </label><br>
                    <div>
                        <a href="../admin/Q&S.php">
                            <button name="submitQ&S" class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 
                            border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none 
                            focus:shadow-outline-purple ">
                                Submit
                            </button></a>

                        <a href="">
                            <button name="cancel" class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 
                            border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none
                             focus:shadow-outline-purple" formnovalidate>
                                Cancel
                            </button></a>
                    </div>
            </div>
        </form>
    </div>
    </div>
</main>
</div>
</div>
</body>
</html>