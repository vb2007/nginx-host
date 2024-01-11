<?php
//sqlite adatbázishoz csatlakozik
$db = new SQLite3('../../data/data.db');
if (!$db) {
    die("Database connection failed: " . $db->lastErrorMsg());
}

//létrehozza a táblát (ha nem létezik)
$db->exec("CREATE TABLE IF NOT EXISTS urlShortener(id INTEGER PRIMARY KEY, url TEXT, shortUrl TEXT, dateAdded TEXT)");

//random url generáló függvény
function generateRandomString($length = 4) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';

    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }

    return $randomString;
}

//megnézi be van-e küldv a form (post)
if(isset($_POST['url'])) {
    include 'auth.php';
    $url = $_POST['url'];

    //megnézi az adatbázisban hogy rövidítve lett-e már a megírt link
    $result = $db->query("SELECT * FROM urlShortener WHERE url = '$url'");
    //ha igen, a már rövidített linket használja
    if($row = $result->fetchArray()) {
        $shortUrl = $row['shortUrl'];
    }
    else{
        $shortUrl = generateRandomString();
        $dateAdded = date('Y-m-d H:i:s');

        //megnézi létezik-e már az url az adatbázisban
        $result = $db->query("SELECT * FROM urlShortener WHERE shortUrl = '$shortUrl'");
        
        while($result->fetchArray()) {
            $shortUrl = generateRandomString();
            $result = $db->query("SELECT * FROM urlShortener WHERE shortUrl = '$shortUrl'");
        }

        //beteszi a linket a táblába
        $query = $db->prepare('INSERT INTO urlShortener (url, shortUrl, dateAdded) VALUES (:url, :shortUrl, :dateAdded)');
        $query->bindValue(':url', $url, SQLITE3_TEXT);
        $query->bindValue(':shortUrl', $shortUrl, SQLITE3_TEXT);
        $query->bindValue(':dateAdded', $dateAdded, SQLITE3_TEXT);
        $query->execute();
    }

    echo "The link has been shortened successfully.<br>You can view it at <a href='https://vb2007.hu/ref/$shortUrl'>https://vb2007.hu/ref/$shortUrl</a>:" ;

    exit;
}

//megnézi kérték-e a linket (get)
if(isset($_GET['shortUrl'])) {
    $shortUrl = $_GET['shortUrl'];

    //kiszedi az eredeti linket a táblából
    $result = $db->query("SELECT url FROM urlShortener WHERE shortUrl = '$shortUrl'");

    //átirányít
    if($result) {
        $url = $result->fetchArray()['url'];
        header("Location: $url");
    }
}
?>
