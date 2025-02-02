<?php
session_start();
$userObj = new User;

$error["firstname"] = $error["lastname"] = $error["email-signup"] = $error["password-signup"] = $error["email"] = $error["password"] = $error["login"] = "";
if (isset($_POST['submit'])) {
    $message = "This field is required!";

    $is_error = false;
    if ($_POST['submit'] != "Sign In") {
        $error["firstname"] = empty($_POST['firstname']) ? $message : "";
        $error["lastname"] = empty($_POST['lastname']) ? $message : "";
    }

    if ($_POST['submit'] == "Sign Up") {
        $error["email-signup"] = empty($_POST['email-signup']) ? $message : "";
        $error["password-signup"] = empty($_POST['password-signup']) ? $message : "";
        $email = $_POST['email-signup'];
        $password = $_POST['password-signup'];
        $error["email-signup"] = filter_var($email, FILTER_VALIDATE_EMAIL) == false ? "Invalid email format" : "";
    } else {
        $error["email"] = empty($_POST['email']) ? $message : "";
        $error["password"] = empty($_POST['password']) ? $message : "";
        $email = $_POST['email'];
        $password = $_POST['password'];
        $error["email"] = filter_var($email, FILTER_VALIDATE_EMAIL) == false ? "Invalid email format" : "";
    }

    foreach ($error as $err) {
        if (!empty($err)) {
            $is_error = true;
            break;
        }
    }
    // print_r($_POST);print_r($error);exit;
    $host  = $_SERVER['HTTP_HOST'];
    $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');

    if (!$is_error) {
        if ($_POST['submit'] == "Sign Up") {
            $userWithEmail = $userObj->checkEmail($email);
            if($userWithEmail == 0){
                $userObj->insertdata($_POST['firstname'], $_POST['lastname'], $email, $password);
                $_SESSION["logged_in"] = true;
                $extra = 'admin/index.php?signup=1';
                header("Location: http://$host$uri/$extra");
                exit;
            }else{
                $error["email-signup"] = "Email already exists";
            }
            
        } elseif ($_POST['submit'] == "Sign In") {
            $userLogin = $userObj->login($email, $password);
            if($userLogin == "1"){
                $_SESSION["logged_in"] = true;
                $extra = 'admin/index.php?signin=1';
                header("Location: http://$host$uri/$extra");
                exit;
            }else{
                $error["login"] = "Invalid email or password";
            }
            
        } elseif ($_POST['submit'] == "Update") {
            $userObj->updatedata($_POST['firstname'], $_POST['lastname'], $email, $password, $_POST['userid']);
            header('Location: ' . $_SERVER['PHP_SELF'] . '?update=update');
            exit;
        }
    }

}

if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];
    $result = $userObj->deletedata($id);
}

if(isset($_GET["logout"])){
    session_destroy();
    $url = explode("/",$_SERVER['PHP_SELF']); 
    header('Location: /' . $url[1]);
    exit;
}

