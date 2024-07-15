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
    <!-- <link rel="stylesheet" href="https://cdn.vb2007.hu/webstatic/css/design.css"> -->
    <link rel="stylesheet" href="https://cdn.vb2007.hu/webstatic/css/tori-fradi.css">
    <title>Töri vázlatok</title>
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
            <h1 class="mt-3">Történelem vázlatok</h1>
        </div>
        <div class="d-flex justify-content-center align-content-center">
            <h2 class="mt-1 mb-3">2022 - 2023 - 2024 - ...</h2>
        </div>
        <div class="container">
            <div id="vazlat-container" class="row mb-2">
                <div class="col-md-6 col-sm-12 d-block mx-auto input-group">
                    <form id="search-form" class="d-block">
                        <input type="text" id="searchInput" class="form-control" placeholder="Keresés...">
                    </form>
                </div>
            </div>
            <div id="vazlat-container" class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="szoveg">2023 - 2024</div>
                    <ul id="vazlat-lista" class="list-unstyled">
                        <?php
                            $noteDirectory = '../cdn/tori-vazlatok/2023_2024/';
                            $notes = scandir($noteDirectory);
                            $notes = array_diff($notes, array('..', '.'));
                            natsort($notes);
                            $notes = array_reverse($notes);
                            foreach ($notes as $note) {
                                //.docx levágása + felmetszés "_"-ok alapján
                                $noteWithoutExtension = pathinfo($note, PATHINFO_FILENAME);
                                $parts = explode('_', $noteWithoutExtension);
                                //megjelenítési név formázása
                                $displayName = str_replace('ora', '. óra - ', $parts[4]) . ' ' . ucwords(str_replace('_', ' ', implode(' ', array_slice($parts, 5))));
                                //megjelenítés
                                echo '<li class="d-flex align-items-start mb-2">';
                                echo '<a href="' . $noteDirectory . $note . '">' . $displayName . '</a>';
                                echo '</li>';
                            }
                        ?>
                    </ul>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="szoveg">2022 - 2023</div>
                    <ul id="vazlat-lista" class="list-unstyled">
                        <?php
                            $noteDirectory = '../cdn/tori-vazlatok/2022_2023/';
                            $notes = scandir($noteDirectory);
                            $notes = array_diff($notes, array('..', '.'));
                            natsort($notes);
                            $notes = array_reverse($notes);
                            foreach ($notes as $note) {
                                //.docx levágása + felmetszés "_"-ok alapján
                                $noteWithoutExtension = pathinfo($note, PATHINFO_FILENAME);
                                $parts = explode('_', $noteWithoutExtension);
                                //megjelenítési név formázása
                                $displayName = str_replace('ora', '. óra - ', $parts[4]) . ' ' . ucwords(str_replace('_', ' ', implode(' ', array_slice($parts, 5))));
                                //megjelenítés
                                echo '<li class="d-flex align-items-start mb-2">';
                                echo '<a href="' . $noteDirectory . $note . '">' . $displayName . '</a>';
                                echo '</li>';
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center align-content-center mt-1 mb-3">
            <button class="btn btn-primary"><a class="link2" href="/tori-upload">Új feltöltése</a></button>
        </div>
    </main>
    <!--Footer-->
    <footer>
        <p id="footer_text">Köszi Galsa, hogy engedted a laptopon jegyzetelést :D</p>
        <p id="footer_text">Hajrá fradi!</p>
        <p id="footer_text">VB2007 - 2023</p>
    </footer>
    <!--Script import-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.vb2007.hu/webstatic/asset/js/tori_dynamic_search.js"></script>
</body>
</html>