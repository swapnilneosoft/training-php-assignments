<?php
$err = null;
include('conn.php');
if (isset($_POST['login'])) {
    $username = $_POST['email'];
    $pass = $_POST['pass'];

    if (!empty($username) && !empty($pass)) {
        $query = mysqli_query($conn, "SELECT * FROM `users` WHERE `password`='$pass' AND (`email`='$username' OR `username`='$username') ");
        if (mysqli_num_rows($query) > 0) {
            session_start();
            $res = mysqli_fetch_assoc($query);
            $_SESSION['user'] = $res;
            if ($_POST['rmbr'] == 'on') {
                setcookie("username", $username, time() + 86400);
                setcookie("password", $pass, time() + 86400);
            }
            header("Location: http://localhost/training/assignment/proj1/dashboard.php");
        } else {
            $err =  "Invalid username or password !";
        }
    } else {
        $err = "Both fields are required";
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Project 1 :: Login</title>
</head>

<body>
    <?php include('nav.php'); ?>

    <div class="container" style="margin-top: 100px;">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4 card p-0">
                <div class="card-header bg-white  text-center">
                    <h2>Login</h2>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="email">Username or email</label>
                            <input type="text" name="email" value="" class="form-control" onblur="checkAuth()">
                        </div>
                        <div class="form-group">
                            <label for="pass">Password</label>
                            <input type="password" name="pass" value="" class="form-control">
                        </div>
                        <div class="form-group p-1">
                            <input type="checkbox" name="rmbr" class="form-input-check">
                            <label for="">Remember me</label>
                        </div>
                        <div class="form-group p-3">
                            <button class="btn btn-success form-control" name="login">Login</button>
                            <a href="register.php" class="text-primary" style="float: right;text-decoration:none;">New User ?</a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
    <div class="container mt-2">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <?php

                if ($err) {
                    echo "
                        <div class='alert alert-danger'>
                        $err
                        </div>
                        ";
                }
                ?>
            </div>
        </div>
    </div>

    <script src="./js/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>
        function checkAuth() {
            $res = $('input[name="email"]').val();
            if ($res == "<?php echo $_COOKIE['username'] ?>") {
                $('input[name="pass"]').val("<?php echo $_COOKIE['password'] ?>");

            }
        }
        $('.alert-danger').fadeOut(3000);
    </script>

</body>

</html>