<?php
session_start();

if (isset($_SERVER['SERVER_NAME']) && $_SERVER['SERVER_NAME'] == 'grocery.whf.bz') {
    $host = "localhost";
    $username = "groceryw_develop";
    $password = "bpP3FKSZQkrz";
    $dbname = "groceryw_dev";
} else {
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_grocery";
}

$db = new PDO("mysql:host=" . $host . ";dbname=" . $dbname . "", $username, $password);

date_default_timezone_set("Asia/Kolkata");
define("RECORDS_PER_PAGE", 4);
define("ROOT", "/");
include("functions.php");

// if ($db == true) {
// 	echo "Connection success";
// } else {
// 	echo "Error";
// }
// ?>