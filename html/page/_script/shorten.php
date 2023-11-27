<?php
//sqlite adatbázishoz csatlakozik
$db = new SQLite3('../../data/data.db');

//létrehozza a táblát (ha nem létezik)
$db->exec("CREATE TABLE IF NOT EXISTS url_shortener(id INTEGER PRIMARY KEY, url TEXT, short_url TEXT)");

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
    $url = $_POST['url'];

    //megnézi az adatbázisban hogy rövidítve lett-e már a megírt link
    $result = $db->query("SELECT * FROM url_shortener WHERE url = '$url'");
    //ha igen, a már rövidített linket használja
    if($row = $result->fetchArray()) {
        $short_url = $row['short_url'];
    }
    else{
        $short_url = generateRandomString();

        //megnézi létezik-e már az url az adatbázisban
        $result = $db->query("SELECT * FROM url_shortener WHERE short_url = '$short_url'");
        
        while($result->fetchArray()) {
            $short_url = generateRandomString();
            $result = $db->query("SELECT * FROM url_shortener WHERE short_url = '$short_url'");
        }

        //beteszi a linket a táblába
        $db->exec("INSERT INTO url_shortener (url, short_url) VALUES ('$url', '$short_url')");
    }

    echo "The link has been shortened successfully.<br>You can view it at <a href='https://vb2007.hu/ref/$short_url'>https://vb2007.hu/ref/$short_url</a>:" ;

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
