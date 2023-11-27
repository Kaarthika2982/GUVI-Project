<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "register";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    echo "Welcome to the login form!";
    exit;
}

// Login logic
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $loginUsername = $_POST["username"];
    $loginPassword = $_POST["password"];

    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT username, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $loginUsername);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($dbUsername, $dbPassword);
        $stmt->fetch();

        // Verify the password
        if (password_verify($loginPassword, $dbPassword)) {
            // Login successful, redirect to home.html
            // header('Location: http://localhost:5500/Style/home.html');
            echo "Login Success";
            exit;
        } else {
            echo "Incorrect password";
        }
    } else {
        echo "Username not found";
    }

    $stmt->close();
}

$conn->close();
?>