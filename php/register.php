<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "guvi_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$fatherName = $_POST['father_name'];
$motherName = $_POST['mother_name'];
$email = $_POST['email'];
$address = $_POST['address'];
$mobileNumber = $_POST['mobile_number'];
$dob = $_POST['dob'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); 

$sql = "INSERT INTO `users`(`name`, `father_name`, `mother_name`, `email`, `address`, `mobile_number`, `dob`, `password`) VALUES ('$name','$fatherName','$motherName','$email','$address','$mobileNumber','$dob','$password')";

if ($conn->query($sql) === TRUE) {
    echo "success";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
