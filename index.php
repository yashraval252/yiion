<?php
require_once "Model/User.php";
require_once "Controller/controller.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yiion</title>
    <?php require_once "Assets\scripts.php" ?>   
</head>
<body>
    <!-- Full screen container with no scrolling -->
    <div class="container-fluid d-flex justify-content-around vh-100 overflow-hidden">
        
        <div class="col-6 text-info d-flex justify-content-center align-items-center">
            <h1>Yiion</h1>
        </div>

        <!-- Right block with buttons -->
        <div class="col-6 d-flex flex-column justify-content-center align-items-center bg-primary text-white border">
            <button class="btn btn-light btn-lg mb-3 click-button click-button-signin" id="sign-in">Sign In</button>
            <button class="btn btn-light btn-lg click-button click-button-signup" id="sign-up">Sign Up</button>

            <!-- Sign In Form -->
            <div id="sign-in-form" class="d-none">
                <h3>Sign In</h3>
                <span class="text-danger"><?= !empty($error) ? $error['login'] : "" ?></span>
                <form id="sign-in-form-validation" method="post">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                        <span class="text-danger"><?= !empty($error) ? $error['email'] : "" ?></span>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                        <span class="text-danger"><?= !empty($error) ? $error['password'] : "" ?></span>
                    </div>
                    <input type="submit" name="submit" class="btn btn-light btn-lg" value="Sign In">
                </form>
            </div>

            <!-- Sign Up Form -->
            <div id="sign-up-form" class="d-none">
                <h3>Sign Up</h3>
                <form id="sign-up-form-validation" method="post">
                    <div class="mb-3">
                        <label for="firstname" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter your first name" required>
                        <span class="text-danger"><?= !empty($error) ? $error['firstname'] : "" ?></span>
                    </div>
                    <div class="mb-3">
                        <label for="lastname" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter your last name" required>
                        <span class="text-danger"><?= !empty($error) ? $error['lastname'] : "" ?></span>
                    </div>
                    <div class="mb-3">
                        <label for="email-signup" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email-signup" name="email-signup" placeholder="Enter your email" required>
                        <span class="text-danger"><?= !empty($error) ? $error['email-signup'] : "" ?></span>
                    </div>
                    <div class="mb-3">
                        <label for="password-signup" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password-signup" name="password-signup" placeholder="Enter your password" required>
                        <span class="text-danger"><?= !empty($error) ? $error['password-signup'] : "" ?></span>
                    </div>
                    <input type="submit" name="submit" class="btn btn-light btn-lg" value="Sign Up">
                </form>
            </div>
        </div>
    </div>

    <?php require_once "Assets\js.php" ?>

</body>
</html>
