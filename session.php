<?php
require_once 'connection.php';
session_start();

$user_check = $_SESSION['login_user'];

$stmt = $db->prepare("SELECT username FROM login WHERE username = :username");
$stmt->bindParam(':username', $user_check);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

$login_session = $row['username'];

if (!isset($_SESSION['login_user']) || empty($login_session)) {
    header("location:index.php");
    exit();
}
?>
