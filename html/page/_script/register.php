<?php
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    exit('POST request method required.');
}

$username = $_POST["username"];
$password = $_POST["password"];
$email = $_POST["email"];
$gender = $_POST["gender"];

//input validation
$isInputValid = true;

if (strlen($username) < 2 || strlen($username) > 10) {
    echo "Username must be between 2 and 10 characters.";
    $isInputValid = false;
}

if (strlen($password) < 6 || strlen($password) > 25) {
    echo "Password must be between 6 and 25 characters.";
    $isInputValid = false;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email address.";
    $isInputValid = false;
}

if ($isInputValid == false) {
    exit;
}

//connects to database
include_once("_config.php");

//creates table (if not exists)
$mysqli->query("CREATE TABLE IF NOT EXISTS `users` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `username` text DEFAULT NULL,
    `password` text DEFAULT NULL,
    `email` text DEFAULT NULL,
    `gender` text DEFAULT NULL,
    `isAdmin` tinyint(1) DEFAULT NULL,
    `dateAdded` datetime DEFAULT NULL,
    PRIMARY KEY (`id`)
)");

//checks for existing username in the database
$query = $mysqli->prepare("SELECT username FROM users WHERE username = ?");
$query->bind_param("s", $username);
$query->execute();
$query->store_result();

if ($query->num_rows > 0) {
    echo "Username already exists. Please choose a different one.";
    exit;
}

$query->close();

//hashes password before inserting it into the database
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

//binds & insert data into database
$query = $mysqli->prepare("INSERT INTO users (username, password, email, gender, dateAdded) VALUES (?, ?, ?, ?, NOW())");

$query->bind_param("ssss", $username, $hashedPassword, $email, $gender);

if ($query->execute()) {
    echo "Registration successful. You can now <a href='/login'>log in</a>.";
}
else {
    echo "Error while registering user: " . $query->error;
}

$query->close();
$mysqli->close();
?>