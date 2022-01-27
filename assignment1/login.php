
<?php
$errEmail = null;
$errPass = null;
$loggedIn = 0;
if (isset($_POST['submit'])) {
    $emFlag = 0;
    $psFlag = 0;
    $email = $_POST['email'];
    $pass = $_POST['password'];
    if ($email == '') {
        $errEmail = "Email field is required";
        $emFlag = 0;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errEmail = "Invalid email format";
        $emFlag = 0;
    } else {
        $errEmail = null;
        $emFlag = 1;
    }

    if (strlen($pass) <= 6 ) {
        $errPass = "Password should be more than 6 character";
        $psFlag = 0;
    } else {
        $errPass = null;
        $psFlag = 1;
    }

    if ($emFlag == 1 && $psFlag == 1) {
        $loggedIn = 1;
    } else {
        $loggedIn = 0;
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <title>Assignement 1 : Home</title>

    <style>
        input {
            display: flex;
            margin-top: 10px;
            width: 100%;
            height: 50px;
            border: transparent;
            border-bottom: 1px solid black;
            outline: none;
        }

        #btnSub {
            width: 50%;
            float: right;
            background-color: cornflowerblue;
            text-align: center;
            justify-content: center;
            cursor: pointer;

        }
    </style>
</head>

<body>
    <?php
    include('nav.php');
    ?>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-6 card">
                <div class="card-body">
                    <h1 class="bold">Login</h1>
                    <form method="POST" action="">
                        <input class="input" type="email" placeholder="email" name="email">
                        <?php
                        if (!empty($errEmail)) {
                            echo "<span class='text-danger'>$errEmail</span>";
                        }
                        ?>
                        <input class="input" type="password" placeholder="Password" name="password">
                        <?php
                        if (!empty($errPass)) {
                            echo "<span class='text-danger'>$errPass</span>";
                        }
                        ?>
                        <input type="submit" id="btnSub" name="submit" value="Login">
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <?php
            if (isset($_POST['submit'])) {
              if($loggedIn == 1)
              {
                echo "<p class='text-success'>Email and password Validated successfully !</p>";
              }else{
                echo "<p class='text-danger'>Email and password failed to validate   !</p>";
              }
            }
            ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>


</body>

</html>