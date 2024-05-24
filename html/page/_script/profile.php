<?php
    include "auth.php";
    include "_config.php";

    if ($_SERVER["REQUEST_METHOD"] !== "GET") {
        exit("GET request method required.");
    }

    //username állítása sessionből
    $username = $_SESSION['username'];
    
    //felhasználói adatok kiszedése a táblából
    $queryUser = $mysqli->prepare("SELECT id, username, email, gender, dateAdded, password FROM users WHERE username = ?");
    $queryUser->bind_param('s', $username);
    $queryUser->execute();
    $userdata = $queryUser->get_result()->fetch_assoc();
    $queryUser->close();
    
    //felhasználó által rövidített linkek kiszedése a táblából
    $queryLinks = $mysqli->prepare("SELECT id, url, shortUrl, dateAdded FROM urlShortener WHERE addedBy = ?");
    $queryLinks->bind_param('s', $username);
    $queryLinks->execute();
    $queryLinks->bind_result($id, $url, $shortUrl, $dateAdded);
?>