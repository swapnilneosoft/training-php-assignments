<?php
session_start();
include('conn.php');
$data;
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $query = $conn->query("SELECT * FROM users WHERE id=$id");
    $data = $query->fetchAll()[0];
} else {
    header("location : index.php");
}
if (isset($_POST['update'])) {
    $email = $_POST['email'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $mobile = $_POST['mobile'];
    $id = $_POST['id'];

    if (!empty($email) && !empty($name) && !empty($age) && !empty($mobile) && !empty($id)) {

        $conn->query("UPDATE users SET email='$email',name='$name',age='$age',mobile='$mobile' WHERE id=$id");
        $_SESSION['err'] = "DATA updated !";
        header("location: index.php");
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

    <div class="container" style="margin-top: 10px;">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 card p-0">
                <div class="card-header bg-white  text-center">
                    <h2>Enter user Login Credentials</h2>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                        <div class="form-group">
                            <label for="email">email</label>
                            <input type="text" name="email" value="<?php echo $data['email']; ?>" class="form-control" onblur="checkAuth()">
                        </div>
                        <div class="form-group">
                            <label for="pass">name</label>
                            <input type="text" name="name" value="<?php echo $data['name']; ?>" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="pass">age</label>
                            <input type="number" name="age" value="<?php echo $data['age']; ?>" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="pass">Mobile</label>
                            <input type="text" name="mobile" value="<?php echo $data['mobile']; ?>" class="form-control">
                        </div>
                        <div class="form-group p-3">
                            <button class="btn btn-success form-control" name="update">Update</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>



    <script src="./js/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</body>

</html>