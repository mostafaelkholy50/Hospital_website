<?php
include "../../share/head.php";
if (empty($_SESSION['patient'])) {
    header('location: http://localhost/hospital/pages/login.php');
} else {
    $id_patient = $_SESSION['patient']['PatientID'];
    $select_appointments = "SELECT*FROM doctor_appointments_invoices WHERE PatientID = $id_patient";
    $query_appointments = mysqli_query($connect, $select_appointments);
}
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete_appointments =" DELETE FROM appointments WHERE InvoiceID = $id";
    $query_appointments = mysqli_query($connect, $delete_appointments);
    $delete_invoices =" DELETE FROM invoices WHERE InvoiceID = $id";
    $query_invoices = mysqli_query($connect, $delete_invoices);
    $_SESSION['delete'] = "The Cancel is Done";
    header('location: http://localhost/hospital/app/patient/appointments.php');
}
    

$counter = 1
?>
<?= include "../../share/header_user.php" ?>
<div class="container mt-5">
    <h2 class="text-center mb-4 text-primary">Appointment List</h2>
    <?php if (isset($_SESSION['delete'])): ?>
        <div class="alert alert-success  w-100 p-3" role="alert">
            <?php echo $_SESSION['delete'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php unset($_SESSION['delete']); ?>
    <?php endif; ?>
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
                        <a href="./appointments.php?delete=<?= $item['InvoiceID'] ?>" class="btn btn-danger btn-sm">Cancel</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>