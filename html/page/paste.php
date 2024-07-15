<!DOCTYPE html>
<html lang="en">
<head>
    <!--Settings-->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="title" content="vb2007.hu">
    <meta name="description" content="Just another general purpose site.">
    <meta name="author" content="VB2007">
    <meta name="keywords" content="vb2007, free, shorten, pastebin, paste, 2022, 2023, 2024">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--3rd party import-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!--Local import-->
    <link rel="stylesheet" href="https://cdn.vb2007.hu/webstatic/css/design.css">
    <link rel="stylesheet" href="https://cdn.vb2007.hu/webstatic/css/paste.css">
    <!--Title-->
    <title>View paste</title>
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
            <?php include '_script/paste.php'; ?>
            <h2 class="text-center mt-2 mb-4">View paste</h2>
            <div>
                <!-- <button class="btn btn-primary">View raw</button> -->
                <h3>Metadata</h3>
                <ul>
                    <li>Paste title: <?php echo $pasteTitle; ?></li>
                    <li>Paste Id: <?php echo $id; ?></li>
                    <li>Added by: <?php echo $addedBy; ?></li>
                    <li>Added at: <?php echo $dateAdded; ?></li>
                </ul>
                <h3>Paste's content: </h3>
                <div class="line-numbers-container">
                    <div class="line-numbers"></div>
                    <pre id="paste-text"><?php echo $paste; ?></pre>
                </div>
            </div>
        </div>
    </main>
    <!--Footer-->
    <?php include '_common/footer.php'; ?>
    <!--Script import-->
    <script src="./asset/js/rainbow_shit.js"></script>
    <script src="./asset/js/paste_dynamic_line_displayer.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>