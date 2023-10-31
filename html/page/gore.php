<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="#9415cf" data-react-helmet="true" name="theme-color" />
    <meta content="Tököm tele mindennel, itt a gore" property="og:title" />
    <meta content="kurva anyját a php-nak, fél óra volt megcsinálni ezt a kicseszett lapot" property="og:description" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../asset/css/design.css">
    <title>gore ig</title>
</head>
<body>
    <!--Header-->
    <header>
        <nav id="nav">
        </nav>
    </header>
    <!--Main Content-->
    <main>
        <div class="d-flex justify-content-center align-content-center">
            <h1 class="text-white">faszom tele itt a gore</h1>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <ul class="list-unstyled">
                        <?php
                            $goreDir = '../asset/gore/';
                            $gore = scandir($goreDir);
                            natsort($notes);
                            $gore = array_reverse($gore);
                            foreach ($gore as $media) {
                                //megjelenítés
                                echo '<li class="d-flex align-items-start mb-2">';
                                echo '<a target="_blank" href="' . $goreDir . $media . '">' . $media . '</a>';
                                echo '</li>';
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </main>
    <!--Footer-->
    <footer>
        <p id="footer_text">kurva emberek, kurva állatok</p>
        <p id="footer_text">VB2007 - 2023</p>
    </footer>
    <!--Script import-->
    <script src="../asset/js/language_chooser.js"></script>
</body>
</html>