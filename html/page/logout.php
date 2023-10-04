<?php

    setcookie("loggedin", "false", time() - 3600, "/");
    header("Location: logout.html");

?>