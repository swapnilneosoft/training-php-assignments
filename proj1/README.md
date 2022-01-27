
--> Assignment 
  -> folder Assignment 
     -> index.php 
         My Panel

         Email | Uname : textbox 
         Password : textbox 
         Remember Me checkbox 
            Submit   New User 
     -> register.php 
         Register Here 
         Email 
         Uname 
         Name 
         Age 
         Gender 
         City 
         Image 
            Submit 
            -> database :- myproject 
              tablename : users 
            id pk auto_increment 
            email unique 
            uname unique 
            password       
            name 
            age 
            city 
            image 
            created_at (time_stamp)
            image is upload in the uploads folder and path is store in a database

            -> login either with the help of email | uname 
            -> after login redirect to dashboard 
              home change ChangePassword welcome : logout 
              Display Image 
              Edit Profile
              Category        Display all user details 
              Products 
              Orders 
              Feedback