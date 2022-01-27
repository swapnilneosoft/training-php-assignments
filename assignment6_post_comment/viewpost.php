<?php
include 'AuthMiddlewere.php';
include_once 'Post.php';
if (empty($_GET['id'])) {
    header("location: profile.php");
}
$post = Post::getPost($_GET['id']);
if(isset($_POST['submit']))
{
    if(!empty($_POST['comment']))
    {
        include_once('Comment.php');
        $comment = new Comment;
        $comment->post_id = $_POST['post_id'];
        $comment->user_id = $_SESSION['auth']['id'];
        $comment->comment = $_POST['comment'];
        $comment->save();
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>View Post</title>
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

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 card">
                <div class="card-header bg-white">
                    <h4><?php echo $post['post'][0]['title']; ?></h4>
                </div>
                <div class="card-body">
                    <h5><?php echo $post['post'][0]['description']; ?></h5>
                    <img src="<?php echo $post['post'][0]['image'] ?>" alt="" srcset="" height="100" width="100">
                </div>
                <div class="card-footer bg-white">
                    <h3>Comments</h3>
                    <div class="container mt-2">
                        <div class="row">
                             <form action="" method="POST" class="d-flex">
                                 <input type="hidden" name="post_id" value="<?php echo $_GET['id']; ?>">
                                 <input type="text" class="form-control" name="comment" placeholder="Post your comment">
                                 <button class="btn btn-success m-1" name="submit">Comment</button>
                             </form>
                        </div>
                        <div class="row">
                            <?php 
                                foreach($post['comment'] as $po)
                                {
                                    echo "<div class='col-12 bg-light p-2 m-1'>
                                    $po[content]
                                </div>";
                                }
                                if(empty($post['comment']))
                                {
                                    echo"
                                        <div class='col-12 text-secondary text-center p-3'>no comment found</div>
                                    ";
                                }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="./jquery.min.js"></script>
</body>

</html>