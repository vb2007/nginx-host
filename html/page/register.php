<!DOCTYPE html>
<html lang="en">
<head>
    <!--Settings-->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="title" content="VB2007">
    <meta name="description" content="Just another general purpose site.">
    <meta name="author" content="VB2007">
    <meta name="keywords" content="vb2007, hu, free, download, upload, shorten, 2022, 2023, 2024">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--3rd party import-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!--Local import-->
    <link rel="stylesheet" href="https://cdn.vb2007.hu/webstatic/css/design.css">
    <link rel="stylesheet" href="https://cdn.vb2007.hu/webstatic/css/login.css">
    <!--Title-->
    <title>Register</title>
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
        <h2 class="text-center mt-2 mb-5">Registration</h2>
        <div class="d-flex justify-content-center">
            <h3 id="register"></h3>
        </div>
        <form name="register" method="post" action="page/_script/register.php" enctype="multipart/form-data">
            <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex justify-content-center flex-wrap">
                            <div id="form_group" class="form-group form-inline mb-2 mx-2">
                                <label for="username" id="form_label">Username</label>
                                <input id="username" class="form_field" type="text" name="username" required><br><br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex justify-content-center flex-wrap">
                            <div id="form_group" class="form-group form-inline mb-2 mx-2">
                                <label for="password" id="form_label">Password</label>
                                <input id="password" class="form_field" type="password" name="password" required><br><br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex justify-content-center flex-wrap">
                            <div id="form_group" class="form-group form-inline mb-2 mx-2">
                                <label for="email" id="form_label">E-mail</label>
                                <input id="email" class="form_field" type="email" name="email"><br><br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                    <div class="col-md-12">
                        <div class="d-flex justify-content-center flex-wrap">
                            <div id="form_group" class="form-group form-inline mb-2 mx-2">
                                <label for="gender" class="mb-4">Gender:</label>
                                <!-- I don't care about the others. -->
                                <select name="gender" id="gender">
                                    <option value="0" selected disabled>--No gender selected--</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="row">
                <div class="col-md-12">
                    <div class="d-flex justify-content-center flex-wrap">
                    <div class="g-recaptcha" data-sitekey=""></div>
                    </div>
                </div>
            </div> -->
            <div class="row">
                <div class="col-md-12">
                    <div class="d-flex justify-content-center flex-wrap">
                        <div id="form_group" class="form-group form-inline mb-2 mx-2">
                            <button disabled onclick="registerUser()" type="button" class="btn btn-primary" id="submit" value="Register">Register</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </main>
    <!--Footer-->
    <?php include '_common/footer.php'; ?>
    <!--Script import-->
    <script src="https://cdn.vb2007.hu/webstatic/js/register_handler.js"></script>
    <script src="https://cdn.vb2007.hu/webstatic/js/rainbow_shit.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <!-- <script src="https://www.google.com/recaptcha/api.js" async defer></script> -->
</body>
</html>
