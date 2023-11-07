<?php
session_start();

if ($_SESSION['loggedin'] !== true) {
    echo "<div>
    <p><a href='/login'>Log in</a> with an account that has permissionss.</p>
    </div>
    ";
    exit;
}
else{
    
}
?>