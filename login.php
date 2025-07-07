


<?php
require 'database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $user_type = isset($_POST['user_type']) ? $_POST['user_type'] : 'common';

    if (empty($username) || empty($password)) {
        echo "Username and password are required.";
        exit;
    }

    if (!in_array($user_type, ['police', 'common'])) {
        echo "Invalid user type.";
        exit;
    }

    // Fetch user by username and user_type
    $stmt = $conn->prepare("SELECT password FROM users WHERE username = ? AND user_type = ?");
    $stmt->bind_param("ss", $username, $user_type);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 0) {
        echo "Invalid username, password, or user type.";
        $stmt->close();
        exit;
    }

    $stmt->bind_result($hashed_password);
    $stmt->fetch();

    if (password_verify($password, $hashed_password)) {
        echo "Login successful.";
    } else {
        echo "Invalid username or password.";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Invalid request method.";
}
?>
