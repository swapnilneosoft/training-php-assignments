<?php
    class Comment extends DB{
        
        public $post_id;
        public $comment;
        public $user_id;


        public function save()
        {
            $uid = $_SESSION['auth']['id'];
            if(DB::query("INSERT INTO `comments` (`id`, `post_id`, `user_id`, `content`) VALUES (NULL, '$this->post_id', '$this->user_id', '$this->comment');"))
            {
                echo"
                    <script>
                        window.history.back();
                    </script>
                ";
            }else{
                echo"
                    <script>
                        alert('unable to add comment');
                        window.history.back();
                    </script>
                ";
            }
        }
    }
