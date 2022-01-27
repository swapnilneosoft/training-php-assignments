<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="register.php">Register</a>
                </li>
            </ul>
            <?php

            session_start();
            if (!empty($_SESSION['user'])) {
            ?>
                <div class="d-flex">
                    <a href="change.php" class="btn btn-outline-primary " style="margin-left: 5px;">Change Password</a>
                    <a href="settings.php" class="btn btn-outline-success " style="margin-left: 5px;">Settings</a>
                    <a href="logout.php" class="btn btn-outline-danger " style="margin-left: 5px;">Logout</a>
                </div>
            <?php } ?>
        </div>
    </div>
</nav>

