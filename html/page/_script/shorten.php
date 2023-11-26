<?php
// Connect to SQLite database
$db = new SQLite3('your_database.db');

// Create table if not exists
$db->exec("CREATE TABLE IF NOT EXISTS url_shortener(id INTEGER PRIMARY KEY, url TEXT, short_url TEXT)");

// Check if form is submitted
if(isset($_POST['url'])) {
    $url = $_POST['url'];

    // Generate a random short url
    $short_url = substr(md5(uniqid(rand(), true)), 0, 10); // This will generate a random 10 character string

    // Insert the url and short url into the database
    $db->exec("INSERT INTO url_shortener (url, short_url) VALUES ('$url', '$short_url')");
}

// Check if a short url is requested
if(isset($_GET['short_url'])) {
    $short_url = $_GET['short_url'];

    // Get the original url
    $result = $db->query("SELECT url FROM url_shortener WHERE short_url = '$short_url'");

    // Redirect to the original url
    if($result) {
        $url = $result->fetchArray()['url'];
        header("Location: $url");
    }
}
?>
