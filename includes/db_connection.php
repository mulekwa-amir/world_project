<?php

$servername = "localhost";
$username = "root";
$password = "";
$database_name = "world_project";


$db = new mysqli($servername, $username, $password, $database_name);
if ($db->connect_errno) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
  }


?>