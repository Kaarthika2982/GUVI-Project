<?php
$servername = "localhost";
$username = "root";
$password = " ";
$dbname = "guvi";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function storeData($email, $password) {
    global $conn;

    $sql = "INSERT INTO users (email, password) VALUES ('$email', '$password')";
    $result = $conn->query($sql);

    if ($result === TRUE) {
        return "Data stored successfully";
    } else {
        return "Error: " . $sql . "<br>" . $conn->error;
    }
}

function retrieveData() {
    global $conn;

    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);

    $data = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }

    return $data;
}

$conn->close();
?>
