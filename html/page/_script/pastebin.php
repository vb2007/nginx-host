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
    echo "Your paste has been uploaded. <br> You can view it at <a href='/paste/$pasteId'>https://vb2007.hu/paste?id=$pasteId</a>:" ;

    $mysqli->close();
    exit;
}
?>
