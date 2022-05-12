<?php

$output .= '<div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
<span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end" id="pagination">

';

// <!-- Pagination -->


    $total_records = mysqli_num_rows($result1);

    $total_page = ceil($total_records / $limit);

    echo '<ul class="inline-flex items-center">';
    if ($page > 1) {
        echo '<li><a href="service.php?page=' . ($page - 1) . '">Prev&nbsp;</a></li>' . "  ";
    }
    for ($i = 1; $i <= $total_page; $i++) {
        if ($i == $page) {
            $active = "active";
        } else {
            $active = "";
        }
        echo '<li class="' . $active . ' "> &nbsp; <a href="service.php?page=' . $i . '">' . $i  . '&nbsp;</a></li>';
    }
    if ($total_page > $page) {
        echo '<li><a href="service.php?page=' . ($page + 1) . '">&nbsp;Next</a></li>';
    }

    echo '</ul>';


$output .= '</span></div>';


?>
