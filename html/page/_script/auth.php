<?php
if(!isset($_SESSION)) {
    session_start();
}

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // If not, redirect them to the login page
    echo "
    <div class='container'>
    <h2 class='text-center mt-4'><a href='/login'>Log in</a> with an account that has permissions.</h2>
    <h3 class='text-center my-3'>Or <a href='/register'>create a new one</a>, if you don't have already.</h3>
    </div>
    ";
    exit();
}
else{
    
}
?>