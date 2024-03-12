<?php
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    exit('POST request method required.');
}

$username = $_POST["username"];
$password = $_POST["password"];
$email = $_POST["email"];
$gender = $_POST["gender"];

//sqlite adatbázishoz csatlakozik
include_once("_config.php");

// $db = new SQLite3('/var/www/html/data/data.db');
// if (!$db) {
//     die("Database connection failed.");
// }

//tábla létrehozása (ha még nem létezik)
// $mysqli->execute("
// CREATE TABLE IF NOT EXISTS `users` (
//     `id`    INTEGER,
//     `username`  TEXT,
//     `password`  TEXT,
//     `email` TEXT,
//     `gender`    TEXT,
//     `dateAdded` DATETIME,
//     PRIMARY KEY(`id`)
// )");

//megnézi benne van-e már a felhasználónév az adatbázisban
$query = $mysqli->prepare("SELECT username FROM users WHERE username = ?");
$query->bind_param("s", $username);
$query->execute();
$query->store_result();

if ($query->num_rows > 0) {
    echo "Username already exists. Please choose a different one.";
    exit;
}

$query->close();

// $query = $db->prepare("SELECT * FROM users WHERE username = :username");
// $query->bindParam(':username', $username);
// $result = $query->execute();
// $existingUser = $result->fetchArray(SQLITE3_ASSOC);

// if ($existingUser) {
//     echo "Username already exists. Please choose a different one.";
//     exit;
// }

//jelszó hashelés insert előtt
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

//beteszi az adatot a users sqlite3 táblába
$query = $mysqli->prepare("INSERT INTO users (username, password, email, gender, dateAdded) VALUES (?, ?, ?, ?, NOW())");

$query->bind_param("ssss", $username, $hashedPassword, $email, $gender);

if ($query->execute()) {
    echo "Registration successful. You can now <a href='/login'>log in</a>.";
}
else {
    echo "Error while registering user: " . $query->error;
}


// $query = $db->prepare("INSERT INTO users (username, password, email, gender, dateAdded) VALUES (:username, :password, :email, :gender, :dateAdded)");
// $query->bindParam(':username', $username);
// $query->bindParam(':password', $hashedPassword);
// $query->bindParam(':email', $email);
// $query->bindParam(':gender', $gender);
// $query->bindValue(':dateAdded', date('Y-m-d H:i:s'));
// $query->execute();

// echo "Registration successful. You can now <a href='/login'>login</a>.";


$query->close();
$mysqli->close();
?>