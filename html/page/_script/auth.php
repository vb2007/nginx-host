<?php
if(!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    echo "
    <div class='container'>
    <h2 class='text-center mt-4'><a href='/login'>Log in</a> with an account that has permissions.</h2>
    <h3 class='text-center my-3'>Or <a href='/register'>create a new</a>, if you don't already have one.</h3>
    </div>
    ";
    exit();
}
else{
    
}
?>