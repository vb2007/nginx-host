<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/">vb2007.hu</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link <?php echo (basename($_SERVER['SCRIPT_NAME']) == 'index.php') ? 'active' : ''; ?>" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a id="nav-shorten" class="nav-link <?php echo (basename($_SERVER['SCRIPT_NAME']) == 'shorten.php') ? 'active' : ''; ?>" href="/shorten">Shorten</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo (basename($_SERVER['SCRIPT_NAME']) == 'download.php') ? 'active' : ''; ?>" href="/download">Download</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link <?php echo (basename($_SERVER['SCRIPT_NAME']) == 'upload.php') ? 'active' : ''; ?>" href="/upload">Upload</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link <?php echo (basename($_SERVER['SCRIPT_NAME']) == 'contact.php') ? 'active' : ''; ?>" href="/contact">Contact</a>
                </li>
            </ul>
            <div class="d-flex">
                <?php
                    if(!isset($_SESSION)) {
                        session_start();
                    }
                    
                    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
                        echo "<a class='btn btn-outline-success me-2' href='/login'>Log in</a>";
                        echo "<a class='btn btn-outline-success' href='/register'>Register</a>";
                    }
                    else{
                        echo "<p><span class='me-2 mt-3'><b>Logged in as:</b> " . $_SESSION['username'] . "</span></p>";
                        echo "<a class='btn btn-outline-primary me-2' href='/profile'>View profile</a>";
                        echo "<a class='btn btn-outline-danger' href='/page/_script/logout.php'>Log out</a>";
                    }
                ?>
            </div>
        </div>
    </div>
</nav>