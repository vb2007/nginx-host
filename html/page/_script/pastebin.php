<?php
include_once("_config.php");

//létrehozza a táblát (ha nem létezik)
$mysqli->query("CREATE TABLE IF NOT EXISTS `pastebin`(
    `id`  int(11) NOT NULL AUTO_INCREMENT,
    `content` text DEFAULT NULL,
    `addedBy` text DEFAULT NULL,
    `dateAdded`   datetime DEFAULT NULL,
    PRIMARY KEY(`id`)
)");

//megnézi be van-e küldv a form (post)
if(isset($_POST['content'])) {
    include "auth.php";
    $paste = $_POST["paste"];

        $shortUrl = generateRandomString();

        //megnézi létezik-e már az url az adatbázisban
        $query = $mysqli->prepare("SELECT shortUrl FROM urlShortener WHERE shortUrl = ?");
        $query->bind_param("s", $shortUrl);
        $query->execute();
        $query->bind_result($shortUrl);
        
        while($query->fetch()) {
            $shortUrl = generateRandomString();
            $query = $mysqli->query("SELECT * FROM urlShortener WHERE shortUrl = '$shortUrl'");
        }

        //jelenleg bejelentkezett felhasználó neve
        $addedBy = $_SESSION['username'];

        //beteszi a linket a táblába
        $query = $mysqli->prepare("INSERT INTO urlShortener (url, shortUrl, addedBy, dateAdded) VALUES (?, ?, ?, NOW())");
        $query->bind_param("sss", $url, $shortUrl, $addedBy);
        $query->execute();
        $query->close();


    echo "The link has been shortened successfully.<br>You can view it at <a href='https://vb2007.hu/ref/$shortUrl'>https://vb2007.hu/ref/$shortUrl</a>:" ;

    $mysqli->close();
    exit;
}

// //megnézi kérték-e a linket (get)
// if(isset($_GET['shortUrl'])) {
//     $shortUrl = $_GET['shortUrl'];

//     //kiszedi az eredeti linket a táblából
//     $query = $mysqli->prepare("SELECT url FROM urlShortener WHERE shortUrl = ?");
//     $query->bind_param("s", $shortUrl);
//     $query->execute();

//     if($query->errno) {
//         echo "Something went wrong while trying to query the url: " - $query->error;
//         exit;
//     }

//     $query->bind_result($url);

//     //átirányít
//     if($query->fetch()) {
//         $query->close();
//         $mysqli->close();
//         header("Location: $url");
//         exit;
//     }
//     else{
//         echo "The shortened url couldn't be found in the database. Sowwy :(";
//         $query->close();
//         $mysqli->close();
//         exit;
//     }
// }
?>
