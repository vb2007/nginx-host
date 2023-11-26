<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    exit('POST request method required.');
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $db = new SQLite3('../../data/data.db');
    if (!$db) {
        die("Database connection failed: " . $db->lastErrorMsg());
    }

    $query = $db->prepare("SELECT * FROM users WHERE username = :username");
    $query->bindParam(':username', $username);
    $result = $query->execute();

    $user = $result->fetchArray(SQLITE3_ASSOC);

    if ($user && $hashedPassword === $user['hashedPassword']) {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        
        header("Location: /welcome");
        exit();
    } else {
        header("Location: /invalid-login");
    }

    $db->close();
}
?>