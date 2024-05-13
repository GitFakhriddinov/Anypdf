<?php
session_start();
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $query->execute([$email]);
    $user = $query->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];  // Sessiyaga foydalanuvchi ID saqlanadi
        $_SESSION['username'] = $user['username'];  // Foydalanuvchi nomini sessiyaga saqlash
        header("Location: index.php");  // Asosiy sahifaga yo'naltirish
        exit;
    } else {
        echo "Email yoki parol noto'g'ri!";
    }
}
?>
