<div class="container">
    <div class="row bg-light">
        <div class="col-12">
            <h1>welcome <small class="text-secondary" style="font-size: 20px;"><?php echo $_SESSION['user']['email']; ?></small></h1>
        </div>
    </div>
</div>

<div class="container mt-3">
    <div class="card p-0 m-0">
        <div class="card-body m-0">
            <!-- LHS -->
            <div class="col p-0">
                <div class="row">
                    <div class="col-6">Name</div>
                    <div class="col-6 text-secondary"><?php echo $_SESSION['user']['name']; ?></div>


                    <div class="col-6">Email</div>
                    <div class="col-6 text-secondary"><?php echo $_SESSION['user']['email']; ?></div>


                    <div class="col-6">Username</div>
                    <div class="col-6 text-secondary"><?php echo $_SESSION['user']['username']; ?></div>


                    <div class="col-6">Age</div>
                    <div class="col-6 text-secondary"><?php echo $_SESSION['user']['age']; ?></div>


                    <div class="col-6">Gender</div>
                    <div class="col-6 text-secondary"><?php echo $_SESSION['user']['gender']; ?></div>


                    <div class="col-6">City</div>
                    <div class="col-6 text-secondary"><?php echo $_SESSION['user']['city']; ?></div>
                </div>
            </div>
            <!-- RHS -->
            <div class="col mt-5">
                <h3>Profile</h3>
                <img src="<?php echo $_SESSION['user']['profile']; ?>" alt="">
            </div>
        </div>
    </div>
</div>