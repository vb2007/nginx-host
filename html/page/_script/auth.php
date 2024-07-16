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
    <script src='https://cdn.vb2007.hu/webstatic/js/rainbow_shit.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js' integrity='sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL' crossorigin='anonymous'></script>
    ";
    // include("./_common/footer.php");
    exit();
}
else{
    
}
?>