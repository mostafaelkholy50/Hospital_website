<?php
include "F:/xampp\htdocs\hospital\core/config.php";
session_start();

if (isset($_POST['send'])) {
    $FullName = $_POST['FullName'];
    $Email = $_POST['Email'];
    // ------------PATIENT----------
    $select_patient = "SELECT * FROM patients WHERE Email ='$Email'";
    $query_patient = mysqli_query($connect, $select_patient);
    $data_patient = mysqli_fetch_assoc($query_patient);
    if ($data_patient) {
        $_SESSION['patient'] = [
            'PatientID' => $data_patient['PatientID'],
            'FullName' => $data_patient['FullName'],
            'Email' => $data_patient['Email'],
            'DateOfBirth' => $data_patient['DateOfBirth'],
            'Gender' => $data_patient['Gender'],
            'Address' => $data_patient['Address'],
            'PhoneNumber' => $data_patient['PhoneNumber'],
            'MedicalHistory' => $data_patient['MedicalHistory']
        ];
        // -----------FullName---------------
        $check_FullName = $data_patient['FullName'];
        if ($FullName == $check_FullName) {
            header('location: http://localhost/hospital/app/patient/patient.php');
            die;
        } else {
            $_SESSION['error'] = "FullName Is Wrong ";
            header('location: http://localhost/hospital/pages/login.php');
        }

    } else {
        $_SESSION['error'] = "Email Is Wrong ";
        header('location: http://localhost/hospital/pages/login.php');
    }
}




















