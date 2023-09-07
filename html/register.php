<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Connect to the SQLite database (adjust the path as needed)
    $db = new SQLite3('users.db');
    if (!$db) {
        die("Database connection failed: " . $db->lastErrorMsg());
    }

    // Check if the username already exists in the database
    $query = $db->prepare("SELECT * FROM users WHERE username = :username");
    $query->bindParam(':username', $username);
    $result = $query->execute();
    $existingUser = $result->fetchArray(SQLITE3_ASSOC);

    if ($existingUser) {
        echo "Username already exists. Please choose a different username.";
    } else {
        // Insert the new user into the database
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT); // Hash the password
        $query = $db->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
        $query->bindParam(':username', $username);
        $query->bindParam(':password', $password);
        $query->execute();

        echo "Registration successful. You can now <a href='login.html'>login</a>.";
    }

    $db->close();
}
?>
