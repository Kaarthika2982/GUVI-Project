<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}

$servername = "localhost";
$username = "root";
$password = " ";
$dbname = "guvi";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function updateUserData($id, $name, $fatherName, $motherName, $email, $address, $mobile, $dob) {
    global $conn;

    $sql = "UPDATE users SET 
            name='$name', 
            father_name='$fatherName', 
            mother_name='$motherName', 
            email='$email', 
            address='$address', 
            mobile='$mobile', 
            dob='$dob' 
            WHERE id=$id";

    $result = $conn->query($sql);

    if ($result === TRUE) {
        return "User data updated successfully";
    } else {
        return "Error updating user data: " . $conn->error;
    }
}

$conn->close();
?>
