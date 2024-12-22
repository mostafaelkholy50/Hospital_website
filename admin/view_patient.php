<?php
include "../share/head.php";
if (empty($_SESSION['admin'])) {
    header('location: http://localhost/hospital/pages/login.php');
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $_SESSION['PatientID']=$id;
    $select = "SELECT * FROM patients WHERE PatientID = $id";
    $query = mysqli_query($connect, $select);
    $data = mysqli_fetch_assoc($query);
    $select_appointments = "SELECT*FROM doctor_appointments_invoices WHERE PatientID = $id";
    $query_appointments = mysqli_query($connect, $select_appointments);
}
if (isset($_GET['delete'])) {
    $id_Record = $_GET['delete'];
    $delete_appointments =" DELETE FROM appointments WHERE InvoiceID = $id_Record";
    $query_appointments = mysqli_query($connect, $delete_appointments);
    $delete_invoices =" DELETE FROM invoices WHERE InvoiceID = $id_Record";
    $query_invoices = mysqli_query($connect, $delete_invoices);
    header('location: http://localhost/hospital/admin/view_patient.php?id='.$_SESSION['PatientID']);
}
$counter=1;

include "../share/header_admin.php";
?>

<main id="main" class="main">
    <section class="section profile">
        <div class="row justify-content-around">
            <div class="col-xl-4">
                <div class="card shadow-lg">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

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
                        <h3 class="text-center mb-4">Patient Appointments</h3>
                        <table class="table table-bordered table-striped table-hover shadow-lg">
                            <thead class="table-light">
                                <tr>
                                    <th>Number of Appointment</th>
                                    <th>Your Name</th>
                                    <th>doctor Name</th>
                                    <th>Specialization</th>
                                    <th>Total Amount</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($query_appointments as $item): ?>
                                    <tr>
                                        <td><?= $counter++ ?></td>
                                        <td><?= $item['PatientName'] ?></td>
                                        <td><?= $item['DoctorName'] ?></td>
                                        <td><?= $item['Specialization'] ?></td>
                                        <td><?= $item['TotalAmount'] ?></td>
                                        <td><?= $item['AppointmentDate'] ?></td>
                                        <td><?= $item['AppointmentStatus'] ?></td>
                                        <td>
                                            <a href="./view_patient.php?delete=<?= $item['InvoiceID'] ?>" class="btn btn-danger btn-sm">Cancel</a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
</main>

<?php
include "../share/footer.php";
?>