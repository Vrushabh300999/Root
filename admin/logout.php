<?php
include("../config/connection.php");
session_start();
if (isset($_SESSION['id'])) {
	session_destroy();
	header("location:index.php");
}
?>