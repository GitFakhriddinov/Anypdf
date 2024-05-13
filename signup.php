<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $age = $_POST['age'];
    $gender = $_POST['gender'];

    $query = $pdo->prepare("INSERT INTO users (username, email, password, age, gender) VALUES (?, ?, ?, ?, ?)");
    $result = $query->execute([$username, $email, $password, $age, $gender]);

    if ($result) {
        echo "Ro'yxatdan o'tish muvaffaqiyatli bo'ldi!";
    } else {
        echo "Xatolik yuz berdi: " . $query->errorInfo()[2];
    }
}
?>
