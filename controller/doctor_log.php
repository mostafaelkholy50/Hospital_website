<?php
include "F:/xampp\htdocs\hospital\core/config.php";
session_start();

if (isset($_POST['send'])) {
    $FullName = $_POST['FullName'];
    $Email = $_POST['Email'];
    $select_doctor = "SELECT * FROM doctors WHERE Email ='$Email'";
    $query_doctor = mysqli_query($connect, $select_doctor);
    $data_doctor = mysqli_fetch_assoc($query_doctor);
    if ($data_doctor) {
        $_SESSION['doctor'] = [
            'DoctorID' => $data_doctor['DoctorID'],
            'FullName' => $data_doctor['FullName'],
            'Specialization' => $data_doctor['Specialization'],
            'PhoneNumber' => $data_doctor['PhoneNumber'],
            'WorkingHours' => $data_doctor['WorkingHours'],
            'Salary' => $data_doctor['Salary'],
            'consultationFee' => $data_doctor['consultationFee'],
            'Email' => $data_doctor['Email']
        ];
        // -----------Name---------------
        $check_FullName = $data_doctor['FullName'];
        if ($FullName == $check_FullName) {
            header('location: http://localhost/hospital/app/doctor/doctor.php');
            die;
        } else {
            $_SESSION['error'] = "FullName Is Wrong ";
            header('location: http://localhost/hospital/pages/doctor_log.php');
        }
    } else {
        $_SESSION['error'] = "Email Is Wrong ";
        header('location: http://localhost/hospital/pages/doctor_log.php');
    }
}