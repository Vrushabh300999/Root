<?php
include("./../config/connection.php");
$category_id = $_REQUEST['category_id'];
$query = "DELETE FROM tbl_category 
        WHERE id ='$category_id' ";
$result = $db->prepare($query);
$result->execute();
$total = $result->rowcount();
if ($total > 0) {
    header("Location:product_categories.php");
    exit;
}
?>