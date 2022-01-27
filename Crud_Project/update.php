<?php
include('conn.php');

if (!isset($_GET['update']) || empty($_GET['update'])) {
    echo "<script>window.location.href = 'http://localhost/training/assignment/CRUD_PROJECT';</script>";
}

if(isset($_POST['id']) && isset($_POST['update']))
{
    $email = $_POST['email'];
    $username = $_POST['username'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $city = $_POST['city'];
    $gender = $_POST['gender'];
    $id= $_POST['id'];

    if (mysqli_query($conn, "UPDATE employee SET email = '$email' , username = '$username', name = '$name' , age ='$age',city='$city',gender='$gender' WHERE id=$id")) {
        echo "<script>alert('Data updated !');window.location.href = 'http://localhost/training/assignment/CRUD_PROJECT';</script>";
    } else {
        echo "<script>alert('Somethig went wrong . please try again  !');window.location.href = 'http://localhost/training/assignment/CRUD_PROJECT';</script>";
    }
}


$id = $_GET['update'];
$query = mysqli_query($conn, "SELECT * FROM employee WHERE id= $id");

$data = [];
while ($row = mysqli_fetch_assoc($query)) {
    $data = $row;
}
if (empty($data)) {
    echo "<script>alert('no data found');window.location.href = 'http://localhost/training/assignment/CRUD_PROJECT';</script>";
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>CRUD PROJECT</title>
</head>

<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 card p-0 ">
                <div class="card-header bg-white">
                    <h2>Update details</h2>
                </div>
                <div class="card-body">
                <form action="" method="POST" id="addEmpForm">
                    <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" value="<?php echo $data['email'] ;?>">
                            <span class="text-danger" id="emailErr"></span>
                        </div>
                        <div class="form-group">
                            <label for="name">Username</label>
                            <input type="text" class="form-control" name="username" value="<?php echo $data['username'] ;?>">
                            <span class="text-danger" id="usernameErr"></span>
                        </div>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" value="<?php echo $data['name'] ;?>">
                            <span class="text-danger" id="nameErr"></span>
                        </div>
                        <div class="form-group">
                            <label for="age">Age</label>
                            <input type="text" class="form-control" name="age" value="<?php echo $data['age'] ;?>">
                            <span class="text-danger" id="ageErr"></span>
                        </div>

                        <div class="form-group">
                            <label for="city">City</label>
                            <input type="text" class="form-control" name="city" value="<?php echo $data['city'] ;?>">
                            <span class="text-danger" id="cityErr"></span>
                        </div>
                        <div class="form-group p-1">
                            <label for="gender">Gender</label>
                            <input type="radio" class="form-check-input" name="gender" value="Male" <?php if($data['gender'] == 'Male'){echo"checked";}?>>
                            <label for="">Male</label>
                            <input type="radio" class="form-check-input " name="gender" value="Female"  <?php if($data['gender'] == 'Female'){echo"checked";}?>>
                            <label for="">Female</label>
                            <span class="text-danger" id="genderErr"></span>
                        </div>
                        <div class="form-group p-3">
                            <button class="btn btn-success form-control" name="update">update</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>


    <script src="./js/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>