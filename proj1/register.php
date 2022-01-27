<?php
include('conn.php');
$err = null;
if (isset($_POST['register'])) {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $pass = $_POST['pass'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $city = $_POST['city'];
    $profile = $_FILES['profile'];
    if (!empty($email) && !empty($username) && !empty($pass) && !empty($name) && !empty($age) && !empty($gender) && !empty($city) && !empty($profile['tmp_name'])) {
        $fname = $profile['name'];
        $extn = pathinfo($fname, PATHINFO_EXTENSION);
        $nameExt = "attatch-" . rand() . '-' . time() . ".$extn";
        $dest = "upload/$nameExt";
        if (move_uploaded_file($profile['tmp_name'], $dest)) {  
            
            $query = mysqli_query($conn, "INSERT INTO `users` (`email`, `username`, `password`, `name`, `age`,`gender`, `city`, `profile`) VALUES ('$email', '$username', '$pass', '$name', '$age','$gender', '$city', '$dest')");
            if ($query) {
                echo "
                <script>
                    alert('user registered !');
                    window.location.href = 'http://localhost/training/assignment/proj1/index.php';
                </script>
                ";
            } else {
                $err = "user not regidtered . Please check email and username (email and username must be unique) and try again";
            }
        } else {
            $err = "Please select the profile picture !";
        }
    } else {
        $err = "All fields are required. please check all fields !";
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

    <title>Project 1 :: Register</title>
</head>

<body>
    <?php include('nav.php'); ?>
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

    <div class="container" style="margin-top: 50px;">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 card p-0">
                <div class="card-header bg-white  text-center">
                    <h2>Register</h2>
                </div>
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group p-1">
                            <label for="email">email</label>
                            <input type="text" name="email" value="" class="form-control">
                        </div>
                        <div class="form-group p-1">
                            <label for="email">Username </label>
                            <input type="text" name="username" value="" class="form-control">
                        </div>
                        <div class="form-group p-1">
                            <label for="pass">Password</label>
                            <input type="password" name="pass" value="" class="form-control">
                        </div>

                        <div class="form-group p-1">
                            <label for="email">Name </label>
                            <input type="text" name="name" value="" class="form-control">
                        </div>
                        <div class="form-group p-1">
                            <label for="number">Age </label>
                            <input type="text" name="age" value="" class="form-control">
                        </div>

                        <div class="form-group p-1">
                            <label for="">Gender</label>
                            <input type="radio" name="gender" class="form-input-radio" value="male">
                            <label for="">Male</label>

                            <input type="radio" name="gender" class="form-input-radio" value="female">
                            <label for="">Female</label>
                        </div>
                        <div class="form-group p-1">
                            <label for="email">City </label>
                            <input type="text" name="city" value="" class="form-control">
                        </div>
                        <div class="foem-group p-1">
                            <label for="">Profile Image</label>
                            <input type="file" name="profile" id="" class="form-control">
                        </div>
                        <div class="form-group p-3">
                            <button class="btn btn-success form-control" name="register">Register</button>
                            <a href="index.php" class="text-primary" style="float: right;text-decoration:none;">Already have account ?</a>
                        </div>
                    </form>
                </div>
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