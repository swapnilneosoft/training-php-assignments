<?php
include 'AuthMiddlewere.php';
include 'Post.php';
$post = Post::getPosts();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Profile</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">CMS</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="profile.php">Home</a>
                    <a class="nav-link" href="addpost.php">Add Post</a>
                    <a class="nav-link" href="changepass.php">Change Password</a>
                    <a class="nav-link" href="logout.php" style="float: right;">Logout</a>
                </div>
            </div>
        </div>
    </nav>
    
    <header class="p-2 d-flex">
        <?php echo $_SESSION['auth']['name']; ?>
        <div class="p-2 text-secondary">
            <?php echo $_SESSION['auth']['email']; ?>
        </div>
    </header>

    <div class="container mt-4">
        <div class="row">
            <?php
            if ($post) {
                foreach ($post as $po) {
                    echo "
                    <div class='col-md-4 p-1'>
                <div class='card'>
                    <div class='card-header bg-white'>
                        <h3>$po[title]</h3>
                    </div>
                    <div class='card-body'>
                       $po[description]<br>
                       <img src='$po[image]' alt='no image' class='img-fluid' height='100' width='100' />
                    </div>
                    <div class='card-footer bg-white'>
                        <a href='viewpost.php?id=$po[id]' class='btn btn-warning' style='float: right;'>See More</a>
                    </div>
                </div>
            </div>
                    ";
                }
            }
            ?>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="./jquery.min.js"></script>
</body>

</html>