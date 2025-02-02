<?php
require_once "../Model/User.php";
require_once "../Controller/controller.php";

if(!isset($_SESSION["logged_in"])){
  exit("Sorry you are not allowed to view this page!");
}

$users = $userObj->selectdata();
$message = isset($_GET["message"]) && !empty($_GET["message"]) ? $_GET["message"] : "";
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
if(isset($_GET["deleteid"]) && !empty($_GET["deleteid"])){
  $message = "Row deleted successfully!";
}
if(isset($_GET["update"]) && !empty($_GET["update"])){
  $message = "Row updated successfully!";
}
if(isset($_GET["signin"]) && !empty($_GET["signin"])){
  $message = "Logged In!";
}
if(isset($_GET["signup"]) && !empty($_GET["signup"])){
  $message = "Registered!";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yiion</title>
    <?php require_once "..\Assets\scripts.php" ?>
</head>

<body>
    <div class="container mt-5">
      <?php if(!empty($message)) {?>
    <div class="alert alert-warning text-center" id="flash-message">
        <?=$message?>    
        </div>
        <?php } ?>
        <a class="btn btn-danger float-right" href="<?php echo $uri ?>/index.php?logout=1">Logout</a>
        <h2>User List</h2>

         <?php if(!empty($users)){ ?>
        <table id="userTable" class="table table-bordered">
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= $user->firstname; ?></td>
                        <td><?= $user->lastname; ?></td>
                        <td><?= $user->email; ?></td>
                        <td>
                            <button class="btn btn-primary btn-sm update-btn" 
                                    data-userid="<?= $user->id; ?>"
                                    data-firstname="<?= $user->firstname; ?>"
                                    data-lastname="<?= $user->lastname; ?>"
                                    data-email="<?= $user->email; ?>"
                                    data-password="<?= $user->password; ?>"
                                    data-toggle="modal" 
                                    data-target="#updateModal">
                                Update
                            </button>
                            <a class="btn btn-danger btn-sm delete-btn" href="<?php echo $uri ?>/index.php?deleteid=<?=$user->id?>">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php }else{?>
          <div class="alert alert-info">
                No users found.
            </div>
          <?php } ?>

        <!-- Update Modal -->
        <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateModalLabel">Update User Information</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Sign Up Form inside Modal -->
                        <form id="sign-up-form-validation" method="post">
                          <input type="hidden" name="userid" id="userid"/>
                            <div class="mb-3">
                                <label for="first-name" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter your first name" required>
                            </div>
                            <div class="mb-3">
                                <label for="last-name" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter your last name" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                            </div>
                            <input type="submit" name="submit" class="btn btn-light btn-lg" value="Update">
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <?php require_once "..\Assets\js.php" ?>

</body>
</html>
