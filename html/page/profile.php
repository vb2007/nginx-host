<?php
    include '_script/auth.php';

    session_start();

    if ($_SERVER["REQUEST_METHOD"] !== "GET") {
        exit("GET request method required.");
    }

    $db = new SQLite3('../data/data.db');
    if (!$db) {
        die("Database connection failed: " . $db->lastErrorMsg());
    }

    $username = $_SESSION['username'];

    $query = $db->prepare("SELECT id, username, email, gender, dateAdded, password FROM users WHERE username = :username");
    $query->bindParam(':username', $username);

    $result = $query->execute();

    $userdata = $result->fetchArray(SQLITE3_ASSOC);
?>
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
    <title>User Info: <?php echo $userdata['username']; ?></title>
</head>
<body>
    <!--Header-->
    <header>
        <?php include '_common/navbar.php'; ?>
    </header>
    <!--Main content-->
    <main class="container">
        <?php include '_script/auth.php'; ?>
        <div class="container">
            <h2 class="text-center mt-6">User information</h2>
            <ul>
                <li>User Id: <b><?php echo $userdata['id']; ?></b></li>
                <li>Username: <b><?php echo $userdata['username']; ?></b></li>
                <li>E-mail: <b><?php echo $userdata['email']; ?></b></li>
                <li>Registration date: <b><?php echo $userdata['dateAdded']; ?></b></li>
                <li>Gender: <b><?php echo $userdata['gender']; ?></b></li>
            </ul>
        </div>
    </main>
    <!--Footer-->
    <?php include '_common/footer.php'; ?>
    <!--Script import-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>