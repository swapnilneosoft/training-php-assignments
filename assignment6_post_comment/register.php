<?php
    if(isset($_POST['register']))
    {
        if(!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['name']))
        {
            include('User.php');
            $user = new User();
            $user->name = $_POST['name'];
            $user->email = $_POST['email'];
            $user->pass = $_POST['password'];
            $user->register();
            
        }else{
            echo"
            <script>
                alert('please fill all fields');
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

    <title>Register</title>
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4 card">
                <div class="card-header bg-white text-center">
                    <h3>Register</h3>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="password">
                        </div>
                        <div class="form-group mt-3">
                            <button class="bnt btn-success form-control" name="register">register</button>
                        </div>
                    </form>
                    <div class="form-group">
                        <a href="index.php" class="" style="float: right;">already have account ?</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="./jquery.min.js"></script>
</body>

</html>