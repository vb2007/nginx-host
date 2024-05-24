<?php
    include "auth.php";
    include_once("_config.php");

    $id = $_GET["id"];
    
    if ($id == 0) {
        echo "No paste id provided.";
        exit;
    }

    $query = $mysqli->prepare("SELECT id, pasteTitle, paste, addedBy, dateAdded FROM pastebin WHERE id = ?");
    $query->bind_param("s", $id);
    $query->execute();
    $query->bind_result($id, $pasteTitle, $paste, $addedBy, $dateAdded);
    $query->fetch();
?>