<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // If not, redirect them to the login page
    echo "<div>
    <p><a href='/login'>Log in</a> with an account that has permissionss.</p>
    </div>
    ";
    exit();
}
else{
    
}
?>