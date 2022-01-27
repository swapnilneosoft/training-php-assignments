<?php
include('conn.php');
$user = $_SESSION['user'];
$err=null;
if (isset($_POST['update'])) {
    $username = $_POST['username'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $city = $_POST['city'];
    $profile = $_FILES['profile'];
    if ( !empty($username)  && !empty($name) && !empty($age) && !empty($gender) && !empty($city)) {
        $dest = $user['profile'];
        if (!empty($profile['tmp_name'])) {
            $fname = $profile['name'];
            $extn = pathinfo($fname, PATHINFO_EXTENSION);
            $nameExt = "attatch-" . rand() . '-' . time() . ".$extn";
            $dest = "upload/$nameExt";
            if (!move_uploaded_file($profile['tmp_name'], $dest)) {
                $err = "Please select the profile picture !";
            }
        }
        $id = $user['id'];
        $query = mysqli_query($conn, "UPDATE users SET name='$name' , username='$username' , age='$age', gender='$gender',city='$city', profile='$dest' WHERE id='$id'");
        if ($query) {
            echo "
            <script>
                alert('user Updated . please login !');
                window.location.href = 'http://localhost/training/assignment/proj1/logout.php';
            </script>
            ";
        } else {
            $err = "Unable to update please try after sometime !";
        }
    } else {
        $err = "All fields are required. please check all fields !";
    }
}
?>

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
                <h2>Update Profile</h2>
            </div>
            <div class="card-body">
                <form action="" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
                    <div class="form-group p-1">
                        <label for="email">email</label>
                        <input type="text" name="email" value="<?php echo $user['email']; ?>" class="form-control" disabled>
                    </div>
                    <div class="form-group p-1">
                        <label for="email">Username </label>
                        <input type="text" name="username" value="<?php echo $user['username']; ?>" class="form-control">
                    </div>

                    <div class="form-group p-1">
                        <label for="email">Name </label>
                        <input type="text" name="name" value="<?php echo $user['name']; ?>" class="form-control">
                    </div>
                    <div class="form-group p-1">
                        <label for="number">Age </label>
                        <input type="text" name="age" value="<?php echo $user['age']; ?>" class="form-control">
                    </div>

                    <div class="form-group p-1">
                        <label for="">Gender</label>
                        <input type="radio" name="gender" class="form-input-radio" value="male" <?php if ($user['gender'] == 'male') {
                                                                                                    echo "checked";
                                                                                                } ?>>
                        <label for="">Male</label>

                        <input type="radio" name="gender" class="form-input-radio" value="female" <?php if ($user['gender'] == 'female') {
                                                                                                        echo "checked";
                                                                                                    } ?>>
                        <label for="">Female</label>
                    </div>
                    <div class="form-group p-1">
                        <label for="email">City </label>
                        <input type="text" name="city" value="<?php echo $user['city']; ?>" class="form-control">
                    </div>
                    <div class="foem-group p-5">

                        <label for="">Profile Image</label>
                        <img src="<?php echo $user['profile']; ?>" alt="">
                        <input type="file" name="profile" id="" class="form-control">
                    </div>
                    <div class="form-group p-3">
                        <button class="btn btn-success form-control" name="update">Update</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>