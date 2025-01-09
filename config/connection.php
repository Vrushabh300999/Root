<?php
session_start();

$host = "localhost";
$username = "root";
$password = "";
$dbname = "db_grocery";

$db = new PDO("mysql:host=" . $host . ";dbname=" . $dbname . "", $username, $password);
return $db;


// if ($db == true) {
// 	echo "Connection success";
// } else {
// 	echo "Error";
// }
// ?>