<?php
if(!isset($_SESSION)) {
    session_start();
}

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    exit('POST request method required.');
}

//értékek megkapása a display page-től
$username = $_POST["username"];
$password = $_POST["password"];

//adatbázishoz csatlakozás
include_once("_config.php");

//makes table if it doesn't exists
// $mysqli->query("CREATE TABLE IF NOT EXISTS `users` (
//     `id` int(11) NOT NULL AUTO_INCREMENT,
//     `username` text DEFAULT NULL,
//     `password` text DEFAULT NULL,
//     `email` text DEFAULT NULL,
//     `gender` text DEFAULT NULL,
//     `isAdmin` tinyint(1) DEFAULT NULL,
//     `dateAdded` datetime DEFAULT NULL,
//     PRIMARY KEY (`id`)
// )");

//queryzi az adtot
$query = $mysqli->prepare("SELECT username, password FROM users WHERE username = ?");
$query->bind_param('s', $username);
$query->execute();
$user = $query->get_result()->fetch_assoc();

echo $user;

if ($user) {
    if (password_verify($password, $user['password'])) {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        
        echo "Login succesful. Please refresh the page for the changes to take effect.";
        // header("Refresh:0; url=/profile");
        exit;
    }
    else {
        echo "The password or username you've proviced is invalid.";
        // header("Location: /invalid-login");
    }
}
else {
    echo $user + "There is no such username in the database. Please <a href='/register'>register</a> to the site first. If you have an account with that username, and you get this message, please <a href='/contact'>contact the site administrator</a>.";
    // header("Location: /invalid-login");
}

$query->close();

?>