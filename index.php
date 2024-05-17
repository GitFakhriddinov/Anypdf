
<?php
session_start(); // Sessionni boshlash

if (isset($_SESSION['user_id'])) {
    $loggedin = true;
} else {
    $loggedin = false;
}
?>

 