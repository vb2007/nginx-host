<!DOCTYPE html>
<html lang="en">
<head>
    <!--Settings-->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="title" content="vb2007.hu">
    <meta name="description" content="Just another general purpose site.">
    <meta name="author" content="VB2007">
    <meta name="keywords" content="vb2007, free, download, upload, shorten 2022, 2023, 2024">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--3rd party import-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!--Local import-->
    <link rel="stylesheet" href="../asset/css/design.css">
    <!--Title-->
    <title>Paste text</title>
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
    <main>
        <div class="container">
            <?php include '_script/auth.php';?>
            <h2 class="text-center mt-2 mb-4">Enter your paste below</h2>
            <h3 class="text-center text-danger mb-2">This feature isn't functional currently.<br>Please wait a few days.<br>But you can see the preview :)</h3>
            <div class="container my-3">
                <p class="text-center" id="response"></p>
            </div>
            <form class="upload-form" id="pastebin-form" action="/page/_script/pastebin.php" method="post" enctype="multipart/form-data">
                <div class="justify-content-center mb-2 ms-5 me-5">
                    <textarea name="paste" id="paste" cols="130" rows="20" placeholder="Enter your paste here." autofocus required></textarea>
                </div>
                <div class="justify-content-center mb-2 ms-5 me-5">
                    <button class="form-control btn btn-primary" onclick="uploadPaste()" type="button" value="Upload">Upload</button>
                </div>
            </form>
        </div>
    </main>
    <!--Footer-->
    <?php include '_common/footer.php'; ?>
    <!--Script import-->
    <script src="./asset/js/pastebin_handler.js"></script>
    <script src="./asset/js/rainbow_shit.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>