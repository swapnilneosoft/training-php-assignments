<?php
include 'AuthMiddlewere.php';
if(isset($_POST['post']))
{
    if(!empty($_POST['title']) && !empty($_POST['description']))
    {
        include('Post.php');
        $post = new Post;
        $post->title = $_POST['title'];
        $post->descr = $_POST['description'];
        $post->user_id = $_SESSION['auth']['id'];
        if(!empty($_FILES['image']['tmp_name']))
        {
            $post->image = $post->uploadImage($_FILES['image']);
        }else{
            $post->image = null;
        }
        $post->savePost();

    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Add Post</title>
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
                    <a class="nav-link" href="profile.php">Home</a>
                    <a class="nav-link active" aria-current="page" href="addpost.php">Add Post</a>
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

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 card">
                <div class="card-header bg-white">
                    <h3>Add Post</h3>
                </div>
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" id="title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="description ">Description</label>
                            <textarea name="description" cols="12" rows="6" style="resize: none;" id="description" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="image">Attatch Image</label>
                            <input type="file" name="image" id="image" class="form-control">
                        </div>
                        <div class="form-group m-3">
                            <button class="btn btn-primary form-control" name="post">Post</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="./jquery.min.js"></script>
</body>

</html>