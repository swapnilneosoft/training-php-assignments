<?php
    $result;
    if(isset($_POST['calc']))
    {
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];
        $ops = $_POST['ops'];

        if($ops == "+")
        {
            $result = $num1 + $num2;
        }elseif($ops == "-")
        {
            $result = $num1 - $num2;
        }elseif($ops == "*")
        {
            $result = $num1 * $num2;
        }elseif($ops == "/")
        {
            $result = $num1 / $num2;
        }else{
            $result = 0;    
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
  </head>
  <body>
    <?php
        include('nav.php');
    ?>
    
    
    <div class="container mt-5">
            <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4 card p-0 m-0">
                <div class="card-header bg-primary text-white">
                    Calculator
                </div>  
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="form-group">
                            <label for="">Value 1</label>
                            <input class="form-control"  type="number" name="num1" value="" required>
                        </div>
                        <div class="form-group">
                            <label for="">Value 2</label>
                            <input class="form-control" type="number" name="num2" value="" required>
                        </div>
                        <div class="form-group">
                            <label for="">Select Operation</label>
                            <select class="form-select" name="ops" >
                                <option value="+">+</option>
                                <option value="-">-</option>
                                <option value="*">*</option>
                                <option value="/">/</option>
                            </select>
                        </div>
                        <div class="form-group mt-3">
                            <button class=" bn btn-success form-control" name="calc">
                                Calculate
                            </button>
                        </div>
                    </form>
                </div><div class="card-footer bg-light ">
                    Output :  &nbsp;&nbsp;<?php if(!empty($result)){echo $result;} ?>
                </div>
            </div>
            <div class="col-md-4"></div>
            </div>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

 
  </body>
</html>