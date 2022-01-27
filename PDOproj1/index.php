<?php
session_start();
include('conn.php');
$data = null;
$query = $conn->query("SELECT * FROM users");
$data = $query->fetchAll();
if (isset($_POST['store'])) {
    $email = $_POST['email'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $mobile = $_POST['mobile'];

    if (!empty($email) && !empty($name) && !empty($age) && !empty($mobile)) {
        
            $conn->query("INSERT INTO users(email,name,mobile,age) VALUES('$email','$name','$mobile','$age')");
            $_SESSION['err'] = "DATA added !";
            // header("location: index.php");
            echo $mobile;
        
    } else {
        $err = "all fields are required";
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

    <title>PDO CRUD</title>
</head>

<body>
    <?php include('nav.php'); ?>
    <div class="container mt-2">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <?php

                if (!empty($_SESSION['err'])) {
                    echo "
                        <div class='alert alert-danger'>
                        ".$_SESSION['err']."
                        </div>
                        ";
                        $_SESSION['err']=null;
                }
                ?>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top: 10px;">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 card p-0">
                <div class="card-header bg-white  text-center">
                    <h2>Enter user Login Credentials</h2>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="email">email</label>
                            <input type="text" name="email" value="" class="form-control" onblur="checkAuth()">
                        </div>
                        <div class="form-group">
                            <label for="pass">name</label>
                            <input type="text" name="name" value="" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="pass">age</label>
                            <input type="number" name="age" value="" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="pass">Mobile</label>
                            <input type="text" name="mobile" value="" class="form-control">
                        </div>
                        <div class="form-group p-3">
                            <button class="btn btn-success form-control" name="store">Store</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>

    <div class="container mt-2">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-primary">
                    <thead>
                        <tr>
                            <th scope="col">Sr</th>
                            <th scope="col">Email</th>
                            <th scope="col">Name</th>
                            <th scope="col">Age</th>
                            <th scope="col">Mobile</th>
                            <th scope="col">#</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sr = 1;
                        if ($data) {
                            foreach ($data as $user) {

                        ?>
                                <tr>
                                    <th scope="row"><?php echo $sr;  $sr++;?></th>
                                    <th><?php echo $user['email']; ?></th>
                                    <th><?php echo $user['name']; ?></th>
                                    <th><?php echo $user['age']; ?></th>
                                    <th><?php echo $user['mobile']; ?></th>
                                    <th>
                                        <a href="delete.php?id=<?php echo $user['id']; ?>" class="btn btn-danger">Delete</a>
                                        <a href="update.php?id=<?php echo $user['id']; ?>" class="btn btn-primary">Update</a>
                                    </th>
                                </tr>
                        <?php
                            }
                        }else{
                            echo'
                            <tr>
                            <th scope="row"></th>
                            <td></td>
                            <td class="text-secondary">Data Not Found</td>
                            <td></td>
                            <td></td>
                        </tr>
                            ';
                        }
                        ?>
                    </tbody>
                </table>
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