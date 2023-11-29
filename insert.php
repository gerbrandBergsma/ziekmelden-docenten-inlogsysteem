<?php
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

// $statement = $pdo->prepare('
//    INSERT INTO studenten (`student-name`, `student-username`, `student-password`, `student-class`)
//    VALUES (:studentName, :studentUsername, :studentPassword, :studentClass)
// ');

// $statement->execute([
//    'studentName' => $_POST['student-name'],
//    'studentUsername' => $_POST['student-username'],
//    'studentPassword' => $_POST['student-password'],
//    'studentClass' => $_POST['student-class'],
// ]);

$studentName = $_POST['student-name'];

// Controleer of de student-naam al bestaat in de database
$query = "SELECT * FROM studenten WHERE `student-name` = :studentName";
$statement = $pdo->prepare($query);
$statement->execute(['studentName' => $studentName]);
$existingUser = $statement->fetch();

if ($existingUser) {
    // Als er al een gebruiker is met dezelfde student-name, toon een melding
    echo "Deze student-naam is al geregistreerd.";
} else {
// this [iece  cpode be;ow writes shit tp the db]
    $statement = $pdo->prepare('
   INSERT INTO studenten (`student-name`, `student-username`, `student-password`, `student-class`)
   VALUES (:studentName, :studentUsername, :studentPassword, :studentClass)
');

$statement->execute([
   'studentName' => $_POST['student-name'],
   'studentUsername' => $_POST['student-username'],
   'studentPassword' => $_POST['student-password'],
   'studentClass' => $_POST['student-class'],
]);
    

}
?>
