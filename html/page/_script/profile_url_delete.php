<?php
    include "auth.php";

    if($_POST["action"] == "deleteLink"){
        $id = $_POST["id"];
        deleteLink($id);
    }

    function deleteLink($id){
        include_once("_config.php");
        global $id;

        $queryDelete = $mysqli->prepare("DELETE from urlShortener WHERE id = ?");
        $queryDelete->bind_param('s', $id);
        $queryDelete->execute();
        $queryDelete->close();
    }
?>