<?php
include "../../share/head.php";
// if he is not a doctor dont let him t acces the page 
if (empty($_SESSION['doctor'])) {
    header('location: http://localhost/hospital/pages/login.php');
}
// to delete from  the medicalrecords
if (isset($_GET['delete'])) {
    $id_Record = $_GET['delete'];
    $delete = "DELETE FROM `medicalrecords` WHERE RecordID = $id_Record";
    $query_delete = mysqli_query($connect, $delete);
    header('location: http://localhost/hospital/app/doctor/doctor.php');
}
// to show the select patients the docotor select on the view
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $select = "SELECT * FROM patients WHERE PatientID = $id";
    $query = mysqli_query($connect, $select);
    $data = mysqli_fetch_assoc($query);
    $_SESSION['Patient'] = ['PatientID' => $data['PatientID']];
}
//  to select the  medical record from the Patient ID
$id_patient = $_SESSION['Patient']['PatientID'];
$select_medicalrecords = "SELECT * FROM `medicalrecords`WHERE PatientID = $id_patient";
$query_medicalrecords = mysqli_query($connect, $select_medicalrecords);
$data_medicalrecords = mysqli_fetch_assoc($query_medicalrecords);
//  to cheack if the medical records id empty or not 
if ($data_medicalrecords) {
    $Diagnosis_data = $data_medicalrecords['Diagnosis'];
    $Treatment_data = $data_medicalrecords['Treatment'];
    $AdmissionDate_data = $data_medicalrecords['AdmissionDate'];
    $DischargeDate_data = $data_medicalrecords['DischargeDate'];
    $Notes_data = $data_medicalrecords['Notes'];
} else {
    // to put a message to the docotr 
    $Diagnosis_data = "THE PATIENT Diagnosis";
    $Treatment_data = "THE PATIENT Treatment";
    $AdmissionDate_data = "THE PATIENT AdmissionDate";
    $DischargeDate_data = "THE PATIENT DischargeDate";
    $Notes_data = "THE PATIENT Notes";
}
// if he press send will insert in the medical records table
if (isset($_POST['send'])) {
    $id_patient = $data['PatientID'];
    $Diagnosis = $_POST['Diagnosis'];
    $Treatment = $_POST['Treatment'];
    $AdmissionDate = $_POST['AdmissionDate'];
    $DischargeDate = $_POST['DischargeDate'];
    $Notes = $_POST['Notes'];
    $insert = "INSERT INTO `medicalrecords` (`RecordID`, `PatientID`, `Diagnosis`, `Treatment`, `AdmissionDate`, `DischargeDate`, `Notes`) 
    VALUES (NULL, '$id_patient', '$Diagnosis', '$Treatment', '$AdmissionDate', '$DischargeDate', '$Notes')";
    $query = mysqli_query($connect, $insert);
    $_SESSION['success'] = "The Medical Records is Done ";
    header('location: http://localhost/hospital/app/doctor/view_patient.php?id=' . $id);
}
// to  count the ID's 
$counter = 1;
?>

<form action="" method="post">
    <main id="main" class="main">
        <section class="section profile">
            <div class="row justify-content-around">
                <div class="col-xl-4">
                    <div class="card shadow-lg">
                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                            <!-- to show the Patient data in a card  -->
                            <h1 class="text-uppercase mt-3"><b><?= $data['FullName']; ?></b></h1>
                            <h3><b>ID:</b> <?= $data['PatientID']; ?></h3>
                            <h3><b>Email:</b> <?= $data['Email']; ?></h3>
                            <h3><b>Date Of Birth:</b> <?= $data['DateOfBirth']; ?></h3>
                            <h3><b>Gender:</b> <?= $data['Gender']; ?></h3>
                            <h3><b>Address:</b> <?= $data['Address']; ?></h3>
                            <h3><b>PhoneNumber:</b> <?= $data['PhoneNumber']; ?></h3>
                            <h3><b>MedicalHistory:</b> <?= $data['MedicalHistory']; ?></h3>
                        </div>
                    </div>
                </div>

                <div class="col-xl-8">
                    <div class="card shadow-lg">
                        <div class="card-body">
                            <!-- to alert if the docotor updated any medical records -->
                            <?php if (isset($_SESSION['success'])): ?>
                                <div class="alert alert-success  w-100 p-3" role="alert">
                                    <?php echo $_SESSION['success'] ?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                                <?php unset($_SESSION['success']); ?>
                            <?php endif; ?>
                            <h3 style="margin-top: 50px;" class="text-center mb-4">medical report</h3>
                            <!-- from to add the medical records -->
                            <div class="col-12">
                                <label for="Diagnosis" class="form-label">Diagnosis</label>
                                <input style="height: 100px;" type="text" name="Diagnosis" class="form-control" id="Diagnosis" placeholder="<?= $Diagnosis_data ?>" required>
                                <div class="invalid-feedback">Please enter your Diagnosis!</div>
                            </div>
                            <div class="col-12">
                                <label for="yourTreatment" class="form-label">Treatment</label>
                                <input type="text" style="height: 100px;" name="Treatment" placeholder="<?= $Treatment_data ?>" class="form-control" id="yourTreatment" required>
                                <div class="invalid-feedback">Please enter your Treatment!</div>
                            </div>
                            <div class="col-12">
                                <label for="yourAdmissionDate" class="form-label">AdmissionDate</label>
                                <input type="date" name="AdmissionDate" placeholder="<?= $AdmissionDate_data ?>" class="form-control" id="yourAdmissionDate" required>
                                <div class="invalid-feedback">Please enter your AdmissionDate!</div>
                            </div>
                            <div class="col-12">
                                <label for="yourDischargeDate" class="form-label">DischargeDate</label>
                                <input type="date" name="DischargeDate" class="form-control" placeholder="<?= $DischargeDate_data ?>" id="yourDischargeDate" required>
                                <div class="invalid-feedback">Please enter your DischargeDate!</div>
                            </div>
                            <div class="col-12">
                                <label for="Notes" class="form-label">Notes</label>
                                <input style="height: 100px;" name="Notes" type="text" placeholder="<?= $Notes_data ?>" class="form-control" id="Notes" required>
                                <div class="invalid-feedback">Please enter your Notes!</div>
                            </div>
                            <div class="col-12">
                                <button style="padding: 10px;" class="btn btn-primary w-100" name="send" type="submit">send</button>
                            </div>
                            <table style="margin-top: 100px;" class="table table-bordered table-striped table-hover shadow-lg w-100">
                                <thead class="table-light">
                                    <!-- to show the medical records if adding it   -->
                                    <tr>
                                        <th>ID</th>
                                        <th>Diagnosis</th>
                                        <th>Treatment </th>
                                        <th>AdmissionDate</th>
                                        <th>DischargeDate</th>
                                        <th>Notes</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <form method="post">
                                        <?php foreach ($query_medicalrecords as $item): ?>
                                            <tr>
                                                <td><?= $counter++ ?></td>
                                                <td><?= $item['Diagnosis'] ?></td>
                                                <td><?= $item['Treatment'] ?></td>
                                                <td><?= $item['AdmissionDate'] ?></td>
                                                <td><?= $item['DischargeDate'] ?></td>
                                                <td><?= $item['Notes'] ?></td>
                                                <td>
                                                    <a href="./view_patient.php?delete=<?= $item['RecordID'] ?>" class="btn btn-danger btn-sm">delete</a>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    </form>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
</form>
</section>
</main>