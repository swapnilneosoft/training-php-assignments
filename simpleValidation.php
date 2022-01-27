<?php
$err = [];
$name;
$mobile;
$age;
$gender;
if(isset($_POST['submit']) && isset($_POST['gender']) && isset($_POST['tandc']))
{
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $tandc = $_POST['tandc'];

    if(empty($name))
    {
        array_push($err,"Please  enter the name !");
    }
    if(empty($mobile))
    {
        array_push($err,"Please  enter the mobile number !");
    }
    if(empty($age))
    {
        array_push($err,"Please  enter the age !");
    }
    
    

}else{
    $err = [
        'Please select the gender !',
        'Please accept the terms and conditions !'
    ];
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validation</title>
    <style>
        .container{
            width: 50%;
            height: 100% auto;
            padding: 20px;
            margin-top: 50px;
            margin-left: 300px;
            border: 1px solid #f0f0f0;
            border-radius: 10px;
            background-color: #f0f0f0;
        }
        .errcontainer{
            width: 50%;
            height: 100% auto;
            padding: 20px;
            margin-top: 10px;
            margin-left: 300px;
            border: 1px solid #f0f0f0;
            border-radius: 10px;
            background-color: lightcoral;
        }
        .form-group{
            margin:5px;
        }
        .form-group > label, input{
            display: flex;
        }
        .input{
            width: 90%;
            padding: 10px;
            align-self: center;
            border-radius: 3px;
        }
        button{
            width: 70%;
            height: 40px;
            background-color: darkgreen;
            border-radius: 10px;
            color: white;
        }
        table{
            width: 50%;
            height: 100% auto;
            padding: 20px;
            margin-top: 10px;
            margin-left: 330px;
            border: 1px solid #f0f0f0;
            border-radius: 10px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <form action="" method="POST">
            <div class="form-group" style="text-align: center;">
                <h2>Form Validation</h2>
            </div>
            <div class="form-group">
                <label for="">Full name</label>
                <input type="text" class="input" name="name" value="">
            </div>
            <div class="form-group">
                <label for="">Mobile No.</label>
                <input type="number" class="input" name="mobile" value="">
            </div>
            <div class="form-group">
                <label for="">Age</label>
                <input type="number" class="input" name="age" value="">
            </div>
            <div class="form-group " style="display: inline-flex;">
                <label for="">Gender</label>
                <input type="radio" name="gender" value="male">
                male
                <input type="radio" name="gender" value="female">
                female
                <input type="radio" name="gender" value="other">
                other
            </div>
            <div class="form-group" style="display: flex;">
                <input type="checkbox" id="tandc"  name="tandc">
                <label for="">Agree terms and conditions</label>
            </div>
            <div class="form-group" style="text-align: center;">
                <button class="btn" name="submit" >Submit</button>
            </div>
        </form>
    </div>

    <?php 
        if(empty($err) && isset($_POST['submit']))
        {
    ?>
    <table border="1px">
        <thead>
            <tr>
                <th colspan="4">
                    <h2>Details</h2>
                </th>
            </tr>
            <tr>
                <th>name</th>
                <th>mobile</th>
                <th>age</th>
                <th>gender</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $name; ?></td>
                <td><?php echo $mobile; ?></td>
                <td><?php echo $age; ?></td>
                <td><?php echo $gender; ?></td>
            </tr>
        </tbody>
    </table>
    <?php            
        }
    ?>


    <?php
        if(!empty($err) && isset($_POST['submit']))
        {
            echo "<div class='errcontainer' id='errcontainer'>";
            foreach($err as $ele)
            {
               echo "<br> $ele <br>";
            }
            echo "</div>";
        }
    ?>
    <script>
    setTimeout(function(){
        var errcontainer = document.getElementById("errcontainer");
        errcontainer.style.display = "none";
    },2000)
</script>
</body>

</html>