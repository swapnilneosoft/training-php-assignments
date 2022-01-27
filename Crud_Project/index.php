<?php
$err = '';
include('conn.php');


$query = mysqli_query($conn, "SELECT * FROM employee ORDER BY id");



if (isset($_POST['email']) && !empty($_POST['email'])) {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $city = $_POST['city'];
    $gender = $_POST['gender'];

    if (mysqli_query($conn, "INSERT INTO employee(email,username,name,age,city,gender) VALUES('$email','$username','$name','$age','$city','$gender')")) {
        echo "<script>alert('Data added !');window.location.href = 'http://localhost/training/assignment/CRUD_PROJECT';</script>";
    } else {
        $err = "Data Already added !";
    }
}

if (isset($_GET['delete']) && !empty($_GET['delete'])) {
    $id = $_GET['delete'];
    if (mysqli_query($conn, "DELETE FROM employee WHERE id = $id")) {
        echo "<script>alert('Data deleted !');window.location.href = 'http://localhost/training/assignment/CRUD_PROJECT';</script>";
    } else {
        $err = "Unable to delete tha data or data is not present in the database !";
    }
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
    <div class="container mt-2">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-4">
                <?php if (!empty($err)) {
                    echo "<div class='alert alert-danger'>$err</div>";
                } ?>
            </div>
        </div>
    </div>

    <div class="container" style="margin-top: 50px;">
        <div class="row">
            <div class="col-md-12 card p-0 ">
                <div class="card-header bg-white">
                    <div class="row">
                        <div class="col-6">
                            <h3>Employee details</h3>
                        </div>
                        <div class="col-6">

                            <button type="button" class="btn btn-primary" style="float:right;" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Add Employee
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body ">
                    <div class="container bg-dark text-white p-2">
                        <div class="row">
                            <div class="col-1">Sr. No</div>
                            <div class="col">Email</div>
                            <div class="col">Userame</div>
                            <div class="col">Name</div>
                            <div class="col-1">Age</div>
                            <div class="col-1">City</div>
                            <div class="col-1">Gender</div>
                            <div class="col-2">Action</div>
                        </div>
                    </div>
                    <div class="container border p-2">
                        <?php
                        $srno = 1;
                        while ($data = mysqli_fetch_assoc($query)) {
                        ?>
                            <div class="row p-2">
                                <div class="col-1"><?php echo $srno; ?></div>
                                <div class="col"><?php echo $data['email']; ?></div>
                                <div class="col"><?php echo $data['username']; ?></div>
                                <div class="col"><?php echo $data['name']; ?></div>
                                <div class="col-1"><?php echo $data['age']; ?></div>
                                <div class="col-1"><?php echo $data['city']; ?></div>
                                <div class="col-1"><?php echo $data['gender']; ?></div>
                                <div class="col-2">
                                    <a href="<?php echo "update.php?update=" . $data['id']; ?>" class="btn btn-success">Update</a>
                                    <a href="<?php echo "?delete=" . $data['id']; ?>" class="btn btn-warning">Delete</a>
                                </div>
                            </div>
                        <?php
                    $srno++;   
                    }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>




    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Employee</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="#" method="POST" id="addEmpForm">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email">
                            <span class="text-danger" id="emailErr"></span>
                        </div>
                        <div class="form-group">
                            <label for="name">Username</label>
                            <input type="text" class="form-control" name="username">
                            <span class="text-danger" id="usernameErr"></span>
                        </div>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name">
                            <span class="text-danger" id="nameErr"></span>
                        </div>
                        <div class="form-group">
                            <label for="age">Age</label>
                            <input type="text" class="form-control" name="age">
                            <span class="text-danger" id="ageErr"></span>
                        </div>

                        <div class="form-group">
                            <label for="city">City</label>
                            <input type="text" class="form-control" name="city">
                            <span class="text-danger" id="cityErr"></span>
                        </div>
                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <input type="radio" class="form-check-input" name="gender" value="Male">
                            <label for="">Male</label>
                            <input type="radio" class="form-check-input " name="gender" value="Female">
                            <label for="">Female</label>
                            <span class="text-danger" id="genderErr"></span>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-primary" name="addEmp">Add</button>

                </div>
            </div>
        </div>
    </div>
    <script src="./js/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            var email = $('input[name="email"]').val();
            var username = $('input[name="username"]').val();
            var name = $('input[name="name"]').val();
            var age = $('input[name="age"]').val();
            var city = $('input[name="city"]').val();
            var gender = $('input[name="gender"]').is(":checked");

            var sbtBtn = $("button[name='addEmp']");

            var emailErr = $('#emailErr');
            var usernameErr = $('#usernameErr');
            var nameErr = $('#nameErr');
            var ageErr = $('#ageErr');
            var cityErr = $('#cityErr');
            var genderErr = $('#genderErr');

            function validateEmail() {
                emailErr.html('');

                function isEmail(email) {
                    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
                    return regex.test(email);
                }
                if (email == '') {
                    emailErr.html('Email field can not be blank');
                    return false;
                } else {
                    if (!isEmail(email)) {
                        emailErr.html('Invalid email');
                        return false;
                    } else {
                        return true;
                    }
                }
            }

            function validateUsername() {
                usernameErr.html('');
                if (username == " ") {
                    usernameErr.html('Username is required');
                    return false;
                } else {
                    return true;
                }
            }

            function validateName() {
                nameErr.html('');
                if (name == " ") {
                    nameErr.html('name is required');
                    return false;
                } else {
                    return true;
                }
            }

            function validateAge() {
                ageErr.html('');
                if (age == " ") {
                    ageErr.html('age is required');
                    return false;
                } else {
                    return true;
                }
            }

            function validateCity() {
                cityErr.html('');
                if (city == " ") {
                    cityErr.html('age is required');
                    return false;
                } else {
                    return true;
                }
            }

            function validateGender() {
                genderErr.html('');
                if (gender) {
                    genderErr.html('name is required');
                    return false;
                } else {
                    return true;
                }
            }

            sbtBtn.click(function() {
                var valEmail = validateEmail();
                var valUname = validateUsername();
                var valAge = validateAge();
                var valCity = validateCity();
                var valName = validateName();
                var valGender = validateGender();
                if (validateEmail && valUname && valAge && valCity && valName && valGender) {
                    $('#addEmpForm').submit();
                }
            });

        });
    </script>
</body>

</html>