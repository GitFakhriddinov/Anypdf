<?php
$host = 'host3.eskiz.uz';
$db   = 'host4804_';
$user = 'f_baxtiyor';
$pass = 'Faxriddinov_01';
$charset = 'utf8mb4';

$dsn = "PostgreSQL:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
?>
