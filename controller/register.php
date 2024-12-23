<?php
include "F:/xampp\htdocs\hospital\core/config.php";
include "F:/xampp\htdocs\hospital\core/function.php";

if (isset($_POST['send'])) {
    // ---------------NAME------------
    $name = validation_error($_POST['name']);
    if (stringvalidation($name)) {
        $_SESSION['error'] = "name error min is 10 max is 20";
        header('location: http://localhost/hospital/pages/register.php');
        exit;
    }
    //   ------------EMAIL------------
    $email = $_POST['email'];
    if (emailValidation($email)) {
        $_SESSION['error'] = "error :write email  min 10 and max 20 ";
        header('location: http://localhost/hospital/pages/register.php');
        exit;
    }
    // -------------PASSWORD------------
    $password = $_POST['password'];
    $password_hash = password_hash($password, PASSWORD_DEFAULT);
    // -------------inset into admin in database---------------
    $insert = "INSERT INTO admin VALUE (NULL,'$name','$email','$password_hash')";
    $query = mysqli_query($connect, $insert);
    header('location: http://localhost/hospital/pages/admin_log.php');
    die;
} else {
    // ------------UNSEND--------------
    $_SESSION['error'] = "error";
    header('location: http://localhost/hospital/pages/register.php');
}
