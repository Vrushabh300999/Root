<?php
include("./../config/connection.php");
if (isset($_SESSION['id'])) {
	session_destroy();
	header("location:index.php");
}
?>