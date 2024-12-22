<?php
include "F:/xampp\htdocs\hospital\core/config.php";
session_start();
// ------------ADMIN----------
if (isset($_POST['send'])) {
    $FullName = $_POST['FullName'];
    $Email = $_POST['Email'];
    $password = $_POST['password'];
    $select_admin = "SELECT * FROM admin WHERE Email ='$Email'";
    $query_admin = mysqli_query($connect, $select_admin);
    $data_admin = mysqli_fetch_assoc($query_admin);
    if ($data_admin) {
        $_SESSION['admin'] = [
            'id' => $data_admin['id'],
            'FullName' => $data_admin['FullName'],
            'Email' => $data_admin['Email']
        ];
        // -----------PASSWORD---------------
        $check_FullName = $data_admin['FullName'];
        if ($FullName == $check_FullName) {
            $check_password = password_verify($password, $data_admin['password']);
            if ($check_password) {
                header('location: http://localhost/hospital/admin/index.php');
                die;
            } else {
                $_SESSION['error'] = "Password Is Wrong ";
                header('location: http://localhost/hospital/pages/admin_log.php');
            }
        } else {
            $_SESSION['error'] = "FullName Is Wrong ";
            header('location: http://localhost/hospital/pages/admin_log.php');
        }

    } else {
        $_SESSION['error'] = "Your Email or Password Is Wrong ";
        header('location: http://localhost/hospital/pages/admin_log.php');
    }
}
