<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $db = new SQLite3('../data/users.db');
    if (!$db) {
        die("Database connection failed: " . $db->lastErrorMsg());
    }

    $query = $db->prepare("SELECT * FROM users WHERE username = :username");
    $query->bindParam(':username', $username);
    $result = $query->execute();

    $user = $result->fetchArray(SQLITE3_ASSOC);

    if ($user && $password === $user['password']) {
        // $_SESSION['logged_in'] = true;
        //$_SESSION['username'] = $username;

        setcookie("loggedin", "true", time() + 3600, "/");
        
        echo "Valid login. Welcome to the site.";
        // header("Location: welcome.html");
        exit();
    } else {
        echo "INVALID CREDENTIALS.\nTry bruteforcing, you will never get inside motherfucker ;)";
    }

    $db->close();
}
?>