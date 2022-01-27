<?php
$errEmail = null;
$errMobile = null;
$errName = null;
$errFeed = null;    
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $feedback = $_POST['feedback'];
    if ($email == '') {
        $errEmail = "Email field is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errEmail = "Invalid email format";
    } else {
        $errEmail = null;
    }

    if ($name == '') {
        $errName = "Name can not be blank !";
    } elseif (strlen($name) <= 6) {
        $errName = "name should be more than 6 character";
    } else {
        $errName = null;
    }

    if ($mobile == '') {
        $errMobile = "Mobile field can not be blank !";
    } elseif (10 > strlen($mobile) || strlen($mobile) > 10) {
        $errMobile = "Put valid 10 digit  mobile number ";
    } else {
        $errMobile =null;
    }

    if($feedback == '')
    {
        $errFeed = "Feedback can not be blank !";
    }else{
        $errFeed = null;
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
            <div class="col-md-8 card">
                <div class="card-body">
                    <h1 class="bold">Contact</h1>
                    <form method="POST" action="">
                        <input class="input" type="text" placeholder="name" name="name">
                        <?php
                        if (!empty($errName)) {
                            echo "<span class='text-danger'>$errName</span>";
                        }
                        ?>
                        <input class="input" type="text" placeholder="email" name="email">
                        <?php
                        if (!empty($errEmail)) {
                            echo "<span class='text-danger'>$errEmail</span>";
                        }
                        ?>
                        <input class="input" type="number" placeholder="mobile number" name="mobile">
                        <?php
                        if (!empty($errMobile)) {
                            echo "<span class='text-danger'>$errMobile</span>";
                        }
                        ?>
                        <textarea rows="6" cols="" class="form-control mt-2" style="resize: none;" placeholder="Feedback" name="feedback"></textarea>
                        <?php
                        if (!empty($errFeed)) {
                            echo "<span class='text-danger'>$errFeed</span>";
                        }
                        ?>

                        <input type="submit" id="btnSub" name="submit" value="Submit">
                    </form>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
     
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>


</body>

</html>