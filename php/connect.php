<?php
$servername = "localhost"; // usually "localhost" if the database is on the same server
$username = "root";
$password = "";
$database = "guvi db";

// Create connection
$mysqli = new mysqli($servername, $username, $password, $database);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

echo "successfully connected";

?>