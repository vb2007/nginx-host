<?php
    include "auth.php";

    function deleteLink($id){
        include_once("_config.php");
        global $id;

        $queryDelete = $mysqli->prepare("DELETE from urlShortener WHERE id = ?");
        $queryDelete->bind_param('s', $id);
        $queryDelete->execute();
        $queryDelete->close();
    }

    if($_POST["action"] == "deleteLink"){
        deleteLink($_POST["id"]);
    }
?>