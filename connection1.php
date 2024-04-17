<?php 

$dbms = 'mysql';
$host = 'mysql_db';
$db = 'dogs';
$user = 'root';
$pass = 'toor';
$dsn = "$dbms:host=$host;dbname=$db";
$con=new PDO($dsn, $user, $pass);

try {
    $db = new PDO($dsn, $user, $pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Setează modul de afișare a erorilor
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    exit();
}