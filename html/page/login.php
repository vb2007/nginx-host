<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $db = new SQLite3('users.db');
    if (!$db) {
        die("Database connection failed: " . $db->lastErrorMsg());
    }

    $query = $db->prepare("SELECT * FROM users WHERE username = :username");
    $query->bindParam(':username', $username);
    $result = $query->execute();

    $user = $result->fetchArray(SQLITE3_ASSOC);

    if ($user && $password === $user['password']) {
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $username;
        
        header("Location: welcome.html");
        exit();
    } else {
        echo "Invalid username or password.";
    }


    $db->close();
}
?>