<?php
session_start();
// error_reporting(0);

$host = "localhost";
$username = "root";
$password = "";
$dbname = "db_grocery";

$db = new PDO("mysql:host=" . $host . ";dbname=" . $dbname . "", $username, $password);

date_default_timezone_set("Asia/Kolkata");
define("RECORDS_PER_PAGE", 4);
define("ROOT", dirname(__FILE__));
include("functions.php");

// if ($db == true) {
// 	echo "Connection success";
// } else {
// 	echo "Error";
// }
// ?>