<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "simple_user_auth";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    echo "Connection failed: " . $conn->connect_error;
    exit;
}
?>
