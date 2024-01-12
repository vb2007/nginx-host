<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // If not, redirect them to the login page
    echo "<div>
    <p><a href='/login'>Log in</a> with an account that has permissions.</p>
    <p>Or <a href='/register'>create a new one</a>, if you don't have already.</p>
    </div>
    ";
    exit();
}
else{
    
}
?>