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
    <!--Title-->
    <title>Shorten links</title>
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
        <?php include '_script/auth.php'; ?>
        <form class="upload-form" id="url-form" action="/page/_script/shorten.php" method="post" enctype="multipart/form-data">
            <div class="upload-element mb-2 ms-5 me-5">
                <label class="form-label" for="url"></label>
                <input class="form-control" type="text" id="url" name="url" placeholder="Enter your URL here">
            </div>
            <div class="justify-content-center mb-2 ms-5 me-5">
                <button class="form-control" onclick="shortenUrl()" type="button" value="Shorten URL">Shorten URL</button>
            </div>
        </form>
        <div class="container my-3">
            <p class="text-center" id="shorturl"></p>
        </div>
        <!--Display shortened links from the databse-->
        <?php
            // exits if the request type isn't get
            if ($_SERVER["REQUEST_METHOD"] !== "GET") {
                exit("GET request method required.");
            }

            // gets the table's record count
            $db = new SQLite3('../data/data.db');
            if (!$db) {
                die("Database connection failed: " . $db->lastErrorMsg());
            }

            // set total record/page
            $recordsPerPage = isset($_GET['recordsPerPage']) ? (int)$_GET['recordsPerPage'] : 10;
            // if the page id isn't set, the id will be automatically 1 (first page)
            $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            $startIndex = ($page - 1) * $recordsPerPage;

            $query = $db->prepare("SELECT id, url, shortUrl, addedBy, dateAdded FROM urlShortener LIMIT $recordsPerPage OFFSET $startIndex");
            $result = $query->execute();

            $totalRecordsQuery = $db->prepare("SELECT COUNT(*) as total FROM urlShortener");
            $totalRecordsResult = $totalRecordsQuery->execute();
            $totalRecords = (int)$totalRecordsResult->fetchArray(SQLITE3_ASSOC)['total'];
            $totalPages = ceil($totalRecords / $recordsPerPage);
        ?>
        <h2 class="text-center text-white mt-6 mb-3">Links shortened by others</h2>
        <!-- <p class="text-center"><i>Displaying URLs is a bit broken at the moment, please be patient.</i></p>
        <p class="text-center">The core (shortening and redirecting) still works, so don't worry.</p> -->
        <div class="container">
            <table class="table table-dark">
                <thead>
                    <th scope="col">Id</th>
                    <th scope="col">Original link</th>
                    <th scope="col">Shortened link</th>
                    <!-- <th scope="col">View count</th> -->
                    <th scope="col">Shortened at</th>
                    <th scope="col">Shortened by</th>
                </thead>
                <tbody>
                    <?php while ($link = $result->fetchArray(SQLITE3_ASSOC)): ?>
                        <tr>
                            <td><?php echo $link['id']; ?></td>
                            <td><?php echo $link['url']; ?></td>
                            <td><a href="https://vb2007.hu/ref/<?php echo $link['shortUrl']; ?>"><?php echo $link['shortUrl']; ?></a></td>
                            <td><?php echo $link['dateAdded']; ?></td>
                            <td><?php echo $link['addedBy']; ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
            <div class="row">
                <div class="col-12 col-md-4 mb-1 mt-2 dropdown d-flex justify-content-start">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown">
                        Records per page:
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item">10</a></li>
                        <li><a class="dropdown-item">25</a></li>
                        <li><a class="dropdown-item">50</a></li>
                    </ul>
                </div>
                <div class="col-12 col-md-4 pagination d-flex justify-content-center">
                    <ul class="pagination">
                        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                            <li class="page-item <?php echo ($i == $page ? 'active' : ''); ?>">
                                <a class="page-link" href="?page=<?php echo $i; ?>&recordsPerPage=<?php echo $recordsPerPage; ?>"><?php echo $i; ?></a>
                            </li>
                        <?php endfor;?>
                    </ul>
                </div>
                <div class="col-12 col-md-4 d-flex justify-content-end">
                    <!-- <form class="d-flex justify-content-end mb-5" id="records-per-page-form">
                        <input type="number" id="records-per-page" name="records-per-page" min="1" value="<?php echo $recordsPerPage; ?>">
                        <button type="submit">Apply</button>
                    </form> -->
                    <p>Showing page <?php echo $page; ?> of <?php echo $totalPages;?></p>
                </div>
            </div>
        </div>
    </main>
    <!--Footer-->
    <?php include '_common/footer.php'; ?>
    <!--Script import-->
    <script src="../asset/js/shortener_handler.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>