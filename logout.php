<?php

include("include/configuration.php");

session_destroy();
header("Location:login.php");
exit;
?>