<!DOCTYPE html>
<html lang="en">
<head>
    <!--Settings-->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="title" content="vb2007.hu">
    <meta name="description" content="Just another general purpose site.">
    <meta name="author" content="VB2007">
    <meta name="keywords" content="vb2007, ddns, net, free, download, upload, 2022, 2023, 2024">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--3rd party import-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!--Local import-->
    <link rel="stylesheet" href="https://cdn.vb2007.hu/webstatic/css/design.css">
    <link rel="stylesheet" href="https://cdn.vb2007.hu/webstatic/css/login.css">
    <!--Title-->
    <title>Login</title>
</head>
<body>
    <!--Noscript-->
    <noscript>
        <p>Turn on javascript or get lost.</p>
    </noscript>
    <!--Header (navbar)-->
    <header>
        <?php include '_common/navbar.php'; ?>
    </header>
    <!--Main content-->
    <main class="container">
        <?php
            if(!isset($_SESSION)) {
                session_start();
            }
            if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
                
            }
            else{
                echo "<h2 class='text-center mt-4'>You're already logged in.</h2>";
                echo "<h3 class='text-center my-3'>Maybe try <a href='page/_script/logout.php'>logging out</a> first.</h3>";
                exit;
            }

            $loginState = $_GET["loginState"];

            if ($loginState === "success") {
                echo "<h2 class='text-center mt-4'>Login successful.</h2>";
            }

        ?>
        <h2 class="mt-2 text-center">Login</h2>
        <div class="d-flex justify-content-center">
            <h4 id="login-state"></h4>
        </div>
        <form id="loginForm" action="/page/_script/login.php" method="post">
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex justify-content-center flex-wrap">
                        <div id="form_group" class="form-group form-inline mb-2 mx-2">
                            <label for="username" id="form_label" class="mr-2">Username</label>
                            <input id="username" class="form_field" type="text" name="username"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex justify-content-center flex-wrap">
                        <div id="form_group" class="form-group form-inline mb-2 mx-2">
                            <label for="password" id="form_label" class="mr-2">Password</label>
                            <input id="password" class="form_field" type="password" name="password"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex justify-content-center flex-wrap">
                        <div id="form_group" class="form-group form-inline mb-2 mx-2">
                            <input onclick="loginUser()" type="button" id="submit" value="Login">
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </main>
    <!--Footer-->
    <?php include '_common/footer.php'; ?>
    <!--Script import-->
    <script src="./asset/js/rainbow_shit.js"></script>
    <script src="./asset/js/login_handler.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>