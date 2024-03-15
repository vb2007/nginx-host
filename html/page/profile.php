<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="title" content="VB2007">
    <meta name="description" content="Just another general purpose site.">
    <meta name="author" content="VB2007">
    <meta name="keywords" content="vb2007, ddns, net, free, download, upload, 2022, 2023, 2024">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="../asset/css/design.css">
    <title><?php
        if(!isset($_SESSION)) {
            session_start();
        }

        if (isset($_SESSION['loggedin'])) {
            echo "User Info: ", $_SESSION['username'];
        }
        else {
            echo "User Info: Login required";
        }
    ?></title>
</head>
<body>
    <!--Header-->
    <header>
        <?php include '_common/navbar.php'; ?>
    </header>
    <!--Main content-->
    <main class="container">
        <?php include '_script/auth.php'; ?>
        <?php
            if ($_SERVER["REQUEST_METHOD"] !== "GET") {
                exit("GET request method required.");
            }

            include_once("_script/_config.php");

            // $db = new SQLite3('../data/data.db');
            // if (!$db) {
            //     die("Database connection failed: " . $db->lastErrorMsg());
            // }

            //username állítása sessionből
            $username = $_SESSION['username'];
            
            //felhasználói adatok kiszedése a táblából

            //sqlite3-al:
            // $query = $db->prepare("SELECT id, username, email, gender, dateAdded, password FROM users WHERE username = :username");
            // $queryUser->bindParam(':username', $username);
            // $userdata = $queryUser->execute();
            // $userdata = $result->fetchArray(SQLITE3_ASSOC);
           
            $queryUser = $mysqli->prepare("SELECT id, username, email, gender, dateAdded, password FROM users WHERE username = ?");
            $queryUser->bind_param('s', $username);
            $queryUser->execute();
            $userdata = $queryUser->get_result()->fetch_assoc();
            $queryUser->close();
            

            //felhasználó által rövidített linkek kiszedése a táblából

            //sqlite3-al:
            // $queryLinks = $db->prepare("SELECT id, url, shortUrl, dateAdded FROM urlShortener WHERE addedBy = :username");
            // $queryLinks->bindParam(':username', $username);
            // $userlinks = $queryLinks->execute();

            $queryLinks = $mysqli->prepare("SELECT id, url, shortUrl, dateAdded FROM urlShortener WHERE addedBy = ?");
            $queryLinks->bind_param('s', $username);
            $queryLinks->execute();
            $queryLinks->bind_result($id, $url, $shortUrl, $dateAdded);
            // $userlinks = $queryLinks->get_result()->fetch_assoc();
            // $queryLinks->close();
        ?>
        <div class="container">
            <h2 class="text-center mt-4">User information</h2>
            <hr>
            <h2>General info</h2>
            <ul>
                <li>User Id: <b><?php echo $userdata['id']; ?></b></li>
                <li>Username: <b><?php echo $userdata['username']; ?></b></li>
                <li>E-mail: <b><?php echo $userdata['email']; ?></b></li>
                <li>Registration date: <b><?php echo $userdata['dateAdded']; ?></b></li>
                <li>Gender: <b><?php echo $userdata['gender']; ?></b></li>
            </ul>
            <hr>
            <h2>Your shortened links: </h2>
            <table class="table table-dark">
                <thead>
                    <th scope="col">Id</th>
                    <th scope="col">Original link</th>
                    <th scope="col">Shortened link</th>
                    <!-- <th scope="col">View count</th> -->
                    <th scope="col">Shortened at</th>
                    <!-- <th scope="col">Shortened by</th> -->
                </thead>
                <tbody>
                    <!-- DON'T TOUCH IT, DON'T TRY UNDERSTAND IT. it works. leave it alone. -->
                    <?php while ($queryLinks->fetch()) { ?>
                        <tr>
                            <td><?php echo $id; ?></td>
                            <td><?php echo $url; ?></td>
                            <td><a href="https://vb2007.hu/ref/<?php echo $shortUrl; ?>"><?php echo $shortUrl; ?></a></td>
                            <td><?php echo $dateAdded; ?></td>
                        </tr>
                    <?php } $queryLinks->close(); ?>
                </tbody>
            </table>
        </div>
    </main>
    <!--Footer-->
    <?php include '_common/footer.php'; ?>
    <!--Script import-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>