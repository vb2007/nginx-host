<?php
//sqlite adatbázishoz csatlakozik
$db = new SQLite3('../../data/data.db');

//létrehozza a táblát (ha nem létezik)
$db->exec("CREATE TABLE IF NOT EXISTS url_shortener(id INTEGER PRIMARY KEY, url TEXT, short_url TEXT)");

//megnézi be van-e küldv a form (post)
if(isset($_POST['url'])) {
    $url = $_POST['url'];

    //random url-t generál
    $short_url = substr(md5(uniqid(rand(), true)), 0, 10);

    //beteszi a linket a táblába
    $db->exec("INSERT INTO url_shortener (url, short_url) VALUES ('$url', '$short_url')");

    echo "The link has been shortened successfully.<br>You can view it <a href='https://vb2007.hu/ref/$short_url'>here</a>:" ;

    exit;
}

//megnézi kérték-e a linket (get)
if(isset($_GET['short_url'])) {
    $short_url = $_GET['short_url'];

    //kiszedi az eredeti linket a táblából
    $result = $db->query("SELECT url FROM url_shortener WHERE short_url = '$short_url'");

    //átirányít
    if($result) {
        $url = $result->fetchArray()['url'];
        header("Location: $url");
    }
}
?>
