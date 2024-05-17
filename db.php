<?php
$host = 'host3.eskiz.uz';  // Ma'lumotlar bazasi serveri manzili
$dbname = 'host4804_';  // Ma'lumotlar bazasi nomi
$user = 'f_baxtiyor';  // Ma'lumotlar bazasi foydalanuvchi nomi
$password = 'Faxriddinov_01';  // Ma'lumotlar bazasi foydalanuvchi paroli

try {
    $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
