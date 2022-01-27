<?php

include 'DB.php';
    class User extends DB{
        private $id;
        public $name;
        public $email;
        public $pass;

        
        public static function Auth($email,$pass){
            $row = DB::select("SELECT * FROM `users` WHERE `email`='$email' AND `password`='$pass'");
            if(count($row)>0)
            {
                session_start();
                $_SESSION['auth'] = [
                    'id'=>$row['id'],
                    'name'=>$row['name'],
                    'email'=>$row['email']
                ];
                header("location: profile.php");
            }else{
                echo "
                    <script>
                        alert('Invalid Login credentials .Please try again or Register !');
                        window.history.back();
                    </script>
                ";
            }
        }

        public function register()
        {
            if(!DB::select("SELECT * FROM users WHERE email = '$this->email'")){
                if(DB::query("INSERT INTO users(`name`,`email`,`password`) VALUES('$this->name','$this->email','$this->pass')"))
                {
                    if($row = DB::selectOne("SELECT * FROM `users` WHERE `email`='$this->email' AND `password`='$this->pass'"))
                    {
                        session_start();
                        $_SESSION['auth'] = [
                            'id'=>$row['id'],
                            'name'=>$row['name'],
                            'email'=>$row['email']
                        ];
                        header("location: profile.php");
                    }else{
                        return "Invalid Login credentials .Please try again or Register !";
                    } 
                }
            }else{
                echo"
                <script>
                    alert('Email already exist !');
                    window.history.back();
                </script>
            "; 
            }
        }
        
        public static function AuthCheck()
        {
            if(!$_SESSION['auth']){
                header("location: index.php");
            }
        }

        public static function UserDetails()
        {
            $id = $_SESSION['auth']['id'];
            return DB::selectOne("SELECT * FROM users WHERE id='$id'");
        }

        public static function changePassword($pass,$newPass,$conPass)
        {
            if($conPass != $newPass)
            {
                echo"
                    <script>
                        alert('confirm password and  password does not match');
                        window.history.back();
                    </script>
                ";
            }else if($conPass === $newPass){
                $res = DB::selectOne("SELECT * FROM users WHERE `password`=$pass");
                if($res)
                {
                    $id = $_SESSION['auth']['id'];
                    if(DB::query("UPDATE users SET `password` = '$newPass'  WHERE id = $id"))
                    {
                        header("location: logout.php");
                    }else{
                        echo"
                        <script>
                            alert('Unable to change the password');
                        </script>
                    ";  
                    }
                }else{
                    echo"
                    <script>
                        alert('Old password does not match');
                        window.history.back();
                    </script>
                ";  
                }
            }

        }
    }

?>