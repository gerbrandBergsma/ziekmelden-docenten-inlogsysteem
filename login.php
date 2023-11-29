<?php
session_start();

$host = '127.0.0.1';
$db   = 'inlogsysteem-school';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['student-username'];
    $password = $_POST['student-password'];

    // Zoek de gebruiker op basis van de gebruikersnaam
    $query = "SELECT * FROM studenten WHERE `student-username` = :username"; 
    $statement = $pdo->prepare($query);
    $statement->execute(['username' => $username]);
    $user = $statement->fetch();

    if ($user && password_verify($password, $user['student-password'])) {
        // Het wachtwoord komt overeen, inloggen is succesvol
        header("Location: dashboard.php"); // Doorsturen naar het dashboard na succesvol inloggen
        exit();
    } else {
        // Ongeldige inloggegevens, toon een foutmelding of doorsturen naar een foutpagina
        echo "Inloggen is niet gelukt. Controleer uw gebruikersnaam en wachtwoord.";
    }
}
?>

