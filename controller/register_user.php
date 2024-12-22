<?php
include "F:/xampp\htdocs\hospital\core/config.php";
include "F:/xampp\htdocs\hospital\core/function.php";

if (isset($_POST['send'])) {
    // ---------------FullName------------
    $FullName = validation_error($_POST['FullName']);
    if (stringvalidation($FullName)) {
        $_SESSION['error'] = "FullName error min is 10 max is 20";
        header('location: http://localhost/hospital/pages/register.php');
        exit;
    }

    //   ------------EMAIL------------
    $Email = $_POST['Email'];
    if (EmailValidation($Email)) {
        $_SESSION['error'] = "error :write Email  min 10 and max 20 ";
        header('location: http://localhost/hospital/pages/register.php');
        exit;
    }
    //   ------------DateOfBirth------------
    $DateOfBirth = $_POST['DateOfBirth'];
    //   ------------Gender------------
    $Gender = $_POST['Gender'];
    //   ------------Address------------
    $Address = $_POST['Address'];
    //   ------------PhoneNumber------------
    $PhoneNumber = $_POST['PhoneNumber'];
    //   ------------MedicalHistory------------
    $MedicalHistory = $_POST['MedicalHistory'];
    // -------------QUERY---------------
    $insert = "INSERT INTO patients VALUE (NULL,'$FullName','$DateOfBirth','$Gender','$Address','$PhoneNumber','$Email','$MedicalHistory')";
    $query = mysqli_query($connect, $insert);
    header('location: http://localhost/hospital/pages/login.php');
    die;
} else {
    // ------------UNSEND--------------
    $_SESSION['error'] = "error";
    header('location: http://localhost/hospital/pages/register.php');
}
