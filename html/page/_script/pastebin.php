<?php
include_once("_config.php");

//létrehozza a táblát (ha nem létezik)
$mysqli->query("CREATE TABLE IF NOT EXISTS `pastebin`(
    `id`    int(11) NOT NULL AUTO_INCREMENT,
    `pasteTitle`  text NOT NULL,
    `paste` text DEFAULT NULL,
    `addedBy`   text DEFAULT NULL,
    `dateAdded` datetime DEFAULT NULL,
    PRIMARY KEY(`id`)
)");

//megnézi be van-e küldv a form (post)
if(isset($_POST['paste']) && isset($_POST['pasteTitle'])) {
    include "auth.php";

    $pasteTitle = $_POST["pasteTitle"];
    $paste = $_POST["paste"];

    //jelenleg bejelentkezett felhasználó neve
    $addedBy = $_SESSION['username'];

    //beteszi a linket a táblába
    $query = $mysqli->prepare("INSERT INTO pastebin (pasteTitle, paste, addedBy, dateAdded) VALUES (?, ?, ?, NOW())");
    $query->bind_param("sss", $pasteTitle, $paste, $addedBy);
    $query->execute();
    $query->close();

    $pasteId = mysqli_insert_id($mysqli);
    echo "Your paste has been uploaded. <br> You can view it at <a href='/paste/$pasteId'>https://vb2007.hu/paste/$pasteId</a>:" ;

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
