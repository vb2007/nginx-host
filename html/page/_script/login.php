<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    exit('POST request method required.');
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //értékek megkapása a display page-től
    $username = $_POST["username"];
    $password = $_POST["password"];

    //adatbázishoz csatlakozás
    $db = new SQLite3('../../data/data.db');
    if (!$db) {
        die("Database connection failed: " . $db->lastErrorMsg());
    }

    //queryzi az adatot
    $query = $db->prepare("SELECT * FROM users WHERE username = :username");
    $query->bindParam(':username', $username);
    //$query->bindParam(':password', $password);
    $result = $query->execute();

    $user = $result->fetchArray(SQLITE3_ASSOC);

    if ($user) {
        if (password_verify($password, $user['password'])) {
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            
            header("Location: /welcome");
            exit;
        }
        else {
            header("Location: /invalid-login");
        }
    }
    else {
        header("Location: /invalid-login");
    }

    $db->close();
}
?>