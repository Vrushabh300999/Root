<?php

function imguplode($folder, $imgname)
{
    $target_dir = $folder;
    $target_file = basename($imgname['name']);
    $filepath = $target_dir . $target_file;
    if (file_exists($filepath)) {
        $path_parts = pathinfo($imgname['name']);
        $filename = $path_parts['filename'];
        $extention = $path_parts['extension'];
        $target_file = $filename . "_" . rand() . "." . $extention;
        $filepath = $target_dir . $target_file;
    }
    if (move_uploaded_file($imgname["tmp_name"], $filepath)) {
        return $target_file;
    }
}
function pagination($query, $records_per_page, $req_pageno, $file_name, $pagination_param)
{
    $pos = strrpos($query, "LIMIT");
    if ($pos !== false) {
        $query = substr($query, 0, $pos);
    }
    global $conn;
    $result = $conn->prepare($query);
    $result->execute();
    $total_rows = $result->rowcount();

    $str = '';
    $total_rows_pages = ceil($total_rows / $records_per_page);
    if ($req_pageno > 1) {
        $str .= "<a href='$file_name?page=" . ($req_pageno - 1) . $pagination_param . "'>Prev&nbsp;</a>";
    }
    for ($i = 1; $i <= $total_rows_pages; $i++) {
        $str .= '<a href = "' . $file_name . '?page=' . $i . $pagination_param . '">' . $i . ' </a>';
    }
    if ($req_pageno < $total_rows_pages) {
        $str .= "<a href='$file_name?page=" . ($req_pageno + 1) . $pagination_param . "'>Next</a>";
    }
    return $str;
}
?>