<?php
session_start();

if ($_SERVER['SERVER_NAME'] == "localhost") {
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_grocery";
} else if ($_SERVER["SERVER_NAME"] == "cloud3.googiehost") {
    $host = "cloud3.googiehost";
    $username = "groceryw_develop";
    $password = "bpP3FKSZQkrz";
    $dbname = "groceryw_dev"; //hostname()
}

$db = new PDO("mysql:host=" . $host . ";dbname=" . $dbname . "", $username, $password);
return $db;

?>