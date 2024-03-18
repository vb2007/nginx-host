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

    //queryzi az adtot
    $query = $mysqli->prepare("SELECT username, password FROM users WHERE username = ?");
    $query->bind_param('s', $username);
    $query->execute();
    $user = $query->get_result()->fetch_assoc();

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
}
?>