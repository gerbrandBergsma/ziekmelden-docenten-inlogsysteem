<?php
$host = '127.0.0.1';
$db   = 'inlogsysteem-school';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';
$password = 'test';
// 
$pdo = new PDO("mysql:host=$host;dbname=$db;charset=$charset", $user, $pass);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (strlen($username) < 4 || strlen($username) > 20 || !preg_match('/^[a-zA-Z0-9]+$/', $username)) {
        echo "Ongeldige gebruikersnaam, toon foutmelding aan de gebruiker";
    } elseif (strlen($password) < 8) {
        echo "Ongeldig wachtwoord, toon foutmelding aan de gebruiker";
    } else {
        // Hash het wachtwoord voordat je het opslaat
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Bereid de query voor om de gegevens in de database in te voegen
        $query = "INSERT INTO users (username, password) VALUES (:username, :password)";
        $statement = $pdo->prepare($query);

        // Voer de query uit met veilige bindparameters
        $statement->execute([
            'username' => $username,
            'password' => $hashed_password
        ]);

        // Als de registratie succesvol is, stuur de gebruiker door naar het dashboard
        if ($statement) {
            header("Location: dashboard.php");
            exit();
        }
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Code om verbinding te maken met de database (PDO)

    // Verkrijg de gegevens van het registratieformulier
    $username = $_POST['username'];
    $password = $_POST['password'];

    

    // Controleer en valideer de gebruikersnaam en het wachtwoord

    // Hash het wachtwoord voordat je het opslaat
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Voeg de gebruiker toe aan de database
    $query = "INSERT INTO users (username, password) VALUES (:username, :password)";
    $statement = $pdo->prepare($query);
    $statement->execute(['username' => $username, 'password' => $hashed_password]);

    // Stuur de gebruiker door naar het dashboard na succesvolle registratie
    if ($statement) {
        header("Location: dashboard.php");
        exit();
    }
}
?>

</body>
</html>
