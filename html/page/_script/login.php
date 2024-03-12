<?php
if(!isset($_SESSION)) {
    session_start();
}

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    exit('POST request method required.');
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //értékek megkapása a display page-től
    $username = $_POST["username"];
    $password = $_POST["password"];

    //adatbázishoz csatlakozás
    include_once("_config.php");

    // $db = new SQLite3('../../data/data.db');
    // if (!$db) {
    //     die("Database connection failed: " . $db->lastErrorMsg());
    // }

    //queryzi az adtot
    $query = $mysqli->prepare("SELECT username, password FROM users WHERE username = ?");
    $query->bind_param('s', $username);
    $query->execute();
    $user = $query->get_result()->fetch_assoc();

    // $query = $db->prepare("SELECT * FROM users WHERE username = :username");
    // $query->bindParam(':username', $username);
    // $userdata = $queryUser->get_result()->fetch_assoc();
    // $result = $query->execute();
    // $user = $result->fetchArray(SQLITE3_ASSOC);

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

    $query->close();
    // $db->close();
}
?>