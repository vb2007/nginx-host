<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // If not, redirect them to the login page
    header("Location: /login");
    exit();
}
else{
    
}
// The rest of your download.php script goes here...
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!--Settings-->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="title" content="vb2007.ddns.net">
    <meta name="description" content="Just another general purpose site.">
    <meta name="author" content="VB2007">
    <meta name="keywords" content="vb2007, ddns, net, free, download, upload, 2022, 2023, 2024">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--3rd party import-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!--Local import-->
    <link rel="stylesheet" href="../asset/css/design.css">
    <link rel="stylesheet" href="../asset/css/upload.css">
    <!--Title-->
    <title>Download</title>
</head>
<body>
    <!--Noscript-->
    <noscript>
        <p>Turn on javascript or get lost.</p>
    </noscript>
    <!--Header-->
    <header>
        <?php include '_common/navbar.php'; ?>
    </header>
    <!--Main content-->
    <main class="container">
        <div class="text-center">
            <h1>Download</h1>
        </div>
        <hr class="text-secondary">
        <div class="align-content-center">
            <h2 class="text-center">All types of free shit on one site</h2>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <h3 class="text-center text-primary">Software</h3>
                </div>
                <div class="col">
                    <a href="../torrents/software/HitPaw.Video.Converter.v3.13-F4CG/f4cg-hpvc313-setup.exe">HitPaw Converter</a>
                </div>
                <div class="col"></div>
                <div class="col"></div>
                <div class="col"></div>
            </div>
        </div>
    </main>
    <!--Footer-->
    <footer>
        <div class="container">
            <p id="footer_text">VB2007 - 2023</p>
        </div>
    </footer>
    <!--Script import-->
    <!--<script src="../asset/js/login_check.js"></script>-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>