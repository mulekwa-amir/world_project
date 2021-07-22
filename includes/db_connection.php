<?php

$servername = "localhost";
$username = "root";
$password = "";
$database_name = "world_project";


$db = mysqli_connect($servername, $username, $password, $database_name);
if (!$db) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
  }


?>