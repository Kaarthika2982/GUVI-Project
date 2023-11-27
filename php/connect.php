<?php
$servername = "localhost"; 
$username = "root";
$password = "";
$database = "guvi db";

$mysqli = new mysqli($servername, $username, $password, $database);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

echo "successfully connected";

?>
