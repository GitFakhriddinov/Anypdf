<?php
require 'db.php';
session_start(); // Ensure session_start() is called at the beginning

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hashing the password
    $age = $_POST['age'];
    $gender = $_POST['gender'];

    // Prepare the SQL statement to avoid SQL injection
    $query = $pdo->prepare("INSERT INTO users (username, email, password, age, gender) VALUES (?, ?, ?, ?, ?)");

    try {
        $result = $query->execute([$username, $email, $password, $age, $gender]);
        if ($result) {
            $_SESSION['user_id'] = $pdo->lastInsertId(); // Save user id to session
            $_SESSION['username'] = $username; // Optionally save other info to session
            header("Location: index.php"); // Redirect to the main page
            exit; // Important to prevent further script execution
        } else {
            // Handle query execution errors
            $errorInfo = $query->errorInfo();
            $_SESSION['error_message'] = "Registration failed: " . $errorInfo[2];
            header("Location: signup.php"); // Redirect back to the signup page to display the error
            exit;
        }
    } catch (PDOException $e) {
        // Handle SQL errors or duplicate entry errors
        $_SESSION['error_message'] = "Database error: " . $e->getMessage(); // Saving error message to session
        header("Location: signup.php"); // Redirect back to the signup page to display the error
        exit;
    }
} else {
    $_SESSION['error_message'] = "Invalid request method.";
    header("Location: signup.php"); // Redirect back to the signup page
    exit;
}
?>
