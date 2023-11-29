<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Inlogsysteem school</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <form action="insert.php" method="post">
            <input type="text" name="student-name" placeholder="name"required><br>
            <input type="text" name="student-username" placeholder="username" required><br>
            <input type="text" name="student-password" placeholder="password" required><br>
            <input type="text" name="student-class" placeholder="class" required><br>
            <input type="submit" value="login">
            <input type="submit" value="Registreren">
<?php
            
            
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


?>
</form>
</body>
</html>