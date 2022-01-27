<?php
include 'AuthMiddlewere.php';
if (isset($_POST['change'])) {
    if (!empty($_POST['olpass']) && !empty($_POST['newpass']) && !empty($_POST['connewpass'])) {
        include('User.php');
        $olpass = $_POST['olpass'];
        $newpass = $_POST['newpass'];
        $connewpass = $_POST['connewpass'];
        User::changePassword($olpass, $newpass, $connewpass);
    } else {
        echo "
            <script>
                alert('all fields are mandatory');
                window.history.back();
            </script>
        ";
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Change Password</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">CMS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" href="profile.php">Home</a>
                    <a class="nav-link" href="addpost.php">Add Post</a>
                    <a class="nav-link active" aria-current="page" href="changepass.php">Change Password</a>
                    <a class="nav-link" href="logout.php" style="float: right;">Logout</a>

                </div>
            </div>
        </div>
    </nav>
    <header class="p-2 d-flex">
        <?php echo $_SESSION['auth']['name']; ?>
        <div class="p-2 text-secondary">
            <?php echo $_SESSION['auth']['email']; ?>
        </div>
    </header>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4 card">
                <div class="card-header bg-white text-center">
                    <h3>Change Password</h3>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="olpass">Old password</label>
                            <input type="password" class="form-control" name="olpass" id="olpass">
                        </div>
                        <div class="form-group">
                            <label for="newpass">New Password</label>
                            <input type="password" class="form-control" name="newpass" id="newpass">
                        </div>

                        <div class="form-group">
                            <label for="connewpass">confirm Password</label>
                            <input type="password" class="form-control" name="connewpass" id="connewpass">
                        </div>
                        <div class="form-group mt-3">
                            <button class="bnt btn-success form-control" name="change">Change Password</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="./jquery.min.js"></script>
</body>

</html>