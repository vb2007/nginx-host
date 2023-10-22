<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="#9415cf" data-react-helmet="true" name="theme-color" />
    <meta content="Töri vázlatok - 2022-23-24-..." property="og:title" />
    <meta content="Köszi Galsa, hogy engedtél laptopon jegyzetelni :D" property="og:description" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../asset/css/design.css">
    <title>Töri vázlatok</title>
</head>
<body>
    <header>
        <nav id="nav">
            <!-- <div id="nav_container">
                <ul id="nav_list">
                    <li class="nav_item">
                        <a href="/" class="nav_link"></a>
                    </li>
                    <li class="nav_item">
                        <a href="page/contact" class="nav_link"></a>
                    </li>
                    <li class="nav_item">
                        <a href="page/login" class="nav_link"></a>
                    </li>
                </ul>
            </div> -->
        </nav>
    </header>
    <!---->
    <main>
        <div class="d-flex justify-content-center align-content-center">
            <h1 class="text-white">Történelem vázlatok</h1>
        </div>
        <div class="d-flex justify-content-center align-content-center">
            <h2 class="text-white">2022 - 2023 - ...</h2>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="szoveg">2023 - 2024</div>
                    <ul class="list-unstyled">
                      <?php
                        $noteDirectory2023 = '../asset/vazlatok/10/';
                        $notes2023 = scandir($noteDirectory2023);
                        $notes2023 = array_diff($notes2023, array('..', '.'));
                        natsort($notes2023);
                        foreach ($notes2023 as $note) {
                          echo '<li class="d-flex align-items-start mb-2">';
                          echo '<a href="' . $noteDirectory2023 . $note . '">' . $note . '</a>';
                          echo '</li>';
                        }
                      ?>
                    </ul>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="szoveg">2022 - 2023</div>
                    <ul class="list-unstyled">
                      <?php
                        $noteDirectory2022 = '../asset/vazlatok/9/';
                        $notes2022 = scandir($noteDirectory2022);
                        $notes2022 = array_diff($notes2022, array('..', '.'));
                        natsort($notes2022);
                        foreach ($notes2022 as $note) {
                          echo '<li class="d-flex align-items-start mb-2">';
                          echo '<a href="' . $noteDirectory2022 . $note . '">' . $note . '</a>';
                          echo '</li>';
                        }
                      ?>
                    </ul>
                </div>
            </div>
        </div>
    </main>
    <!---->
    <footer>
        <p id="footer_text">Köszi Galsa, hogy engedted a laptopon jegyzetelést :D</p>
        <p id="footer_text">VB2007 - 2023</p>
    </footer>
    <script src="../asset/js/language_chooser.js"></script>
</body>
</html>