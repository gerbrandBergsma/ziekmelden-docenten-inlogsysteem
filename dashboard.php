<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
<?php
session_start();

// Controleer of de gebruiker is ingelogd
if (!isset($_SESSION['user_id'])) {
    // Niet ingelogd, doorsturen naar de inlogpagina of andere actie
    header("Location: login.php");
    exit();
}
?>
    <h1>Welkom op het Dashboard</h1>
    <p>Hallo, dit is de studentenpagina. Alleen toegankelijk voor ingelogde gebruikers.</p>
    <!-- Voeg hier de rest van de dashboardcontent toe -->
</body>
</html>
