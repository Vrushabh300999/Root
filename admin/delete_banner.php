<?php
include("./../config/connection.php");
$banner_id = $_REQUEST['banner_id'];
$query = "DELETE FROM tbl_banner 
        WHERE id ='$banner_id' ";
$result = $db->prepare($query);
$result->execute();
$total = $result->rowcount();
if ($total > 0) {
    header("Location:banners.php");
    exit;
}
?>