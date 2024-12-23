<?php
include "F:/xampp\htdocs\hospital\core/config.php";
session_start();

if (isset($_POST['send'])) {
    //---------FullName--------
    $FullName = $_POST['FullName'];
    //---------email--------
    $Email = $_POST['Email'];
 //-----------------------select from patient------------
    $select_patient = "SELECT * FROM patients WHERE Email ='$Email'";
    $query_patient = mysqli_query($connect, $select_patient);
    $data_patient = mysqli_fetch_assoc($query_patient);
    //------------------------check  email----------
    if ($data_patient) {
        //---------if is sett  put it in session---------
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
        // -----------FullName to check from database---------------
        $check_FullName = $data_patient['FullName'];
        //-----------------check FullName--------
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




















