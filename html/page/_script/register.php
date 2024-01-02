<?php
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    exit;
}
$username = $_POST["username"];
$password = $_POST["password"];
$email = $_POST["email"];

//sqlite adatbázishoz csatlakozik
$db = new SQLite3('../../data/data.db');
if (!$db) {
    die("Database connection failed: " . $db->lastErrorMsg());
}

//$db->exec('CREATE TABLE IF NOT EXISTS users(id INTEGER PRIMARY KEY, username TEXT, password TEXT, email TEXT, dateAdded TEXT)');

//megnézi benne van-e már a felhasználónév az adatbázisban
$query = $db->prepare("SELECT * FROM users WHERE username = :username");
$query->bindParam(':username', $username);
$result = $query->execute();
$existingUser = $result->fetchArray(SQLITE3_ASSOC);

if ($existingUser) {
    echo "Username already exists. Please choose a different one.";
    exit;
} else {
    //beteszi az adatot a users sqlite3 táblába
    $query = $db->prepare("INSERT INTO users (username, password, email, dateAdded) VALUES (:username, :password, :email, :dateAdded)");
    $query->bindParam(':username', $username);
    $query->bindParam(':password', $password);
    $query->bindParam(':email', $email);
    $query->bindValue(':dateAdded', date('Y-m-d H:i:s'));
    $query->execute();

    echo "Registration successful. You can now <a href='/login'>login</a>.";
}

$db->close();
?>