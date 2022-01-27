<?php
include 'DB.php';
class Post extends DB
{
    public $id;
    public $title;
    public $descr;
    public $user_id;
    public $image;

    public function savePost()
    {
        $q = "INSERT INTO `posts` (`id`, `user_id`, `title`, `description`, `image`) VALUES (NULL, '$this->user_id', '$this->title', '$this->descr', '$this->image')";
     
        if (DB::query($q)) {
            header("location: profile.php");
        } else {
            return "Unable to add post.Please try again later !";
        }
    }

    public function uploadImage($image)
    {
        $ext = pathinfo($image['name'], PATHINFO_EXTENSION);
        $dest = "upload/attatch-" . time() . rand(9999, 999999) . ".$ext";
        $path = null;
        if (move_uploaded_file($image['tmp_name'], $dest)) {
            $path = "/training/assignment/assignment6_post_comment/$dest";
        } else {
            $path = "";
        }
        return $path;
    }

    public static function getPosts()
    {
        return DB::select("SELECT * FROM posts");
    }

    public static function getPost($id)
    {
        $post = DB::select("SELECT * FROM posts WHERE id=$id");
        $comment = DB::select("SELECT * FROM comments WHERE post_id = $id");
        return [
            "post" => $post,
            "comment" => $comment
        ];
    }
}
