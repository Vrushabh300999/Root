<?php
include("./../config/connection.php");
$product_id = $_REQUEST['product_id'];
$query = "DELETE FROM tbl_products 
        WHERE id ='$product_id' ";
$result = $db->prepare($query);
$result->execute();
$total = $result->rowcount();
if ($total > 0) {
    header("Location:products.php");
    exit;
}
?>