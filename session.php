<?php
session_start();

$host = '127.0.0.1';
$db   = 'inlogsysteem-school';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';
$password = 'test';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
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

$studentName = $_POST['student-name']; 

$query = "SELECT * FROM studenten WHERE `student-name` = :studentName"; 
$statement = $pdo->prepare($query);
$statement->execute(['studentName' => $studentName]);
$user = $statement->fetchAll();
?>
