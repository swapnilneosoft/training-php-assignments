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


    $product = [
        ["id" => 1, "pname" => "shirt", "price" => 345, "quantity" => 7, "image" => "./img/shirt1.png"],
        ["id" => 2, "pname" => "pant", "price" => 789, "quantity" => 4, "image" => "./img/glove.png"],
        ["id" => 3, "pname" => "cap", "price" => 232, "quantity" => 5, "image" => "./img/shirt2.png"],
        ["id" => 4, "pname" => "sweater", "price" => 32, "quantity" => 5, "image" => "./img/bag1.png"],
        ["id" => 5, "pname" => "Hat", "price" => 75, "quantity" => 6, "image" => "./img/shoes1.png"],
        ["id" => 6, "pname" => "Sun glass", "price" => 45, "quantity" => 34, "image" => "./img/shirt3.png"],
    ];




    ?>

    <div class="container">
        <h3>Products</h3>
    </div>

    <div class="container">
        <div class="row ">
            <?php
            foreach ($product as $prod) {
            ?>
                <div class="col-md-3 p-0 card m-2">
                    <div class="card-header bg-white">
                        <?php echo $prod['pname'] ?>
                    </div>
                    <div class="card-body text-center display-flex">
                        <img src="<?php echo $prod['image'] ?>" alt="" width="200px">
                        <p class="text-fluid">
                            
                        Price : <strong><?php echo $prod['price'] ?></strong><br>
                            quantity : <strong><?php echo $prod['quantity'] ?></strong>
                        </p>
                    </div>
                    <div class="card-footer text-center">
                        <button class="btn btn-warning form-control">Add Cart</button>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>


</body>

</html>