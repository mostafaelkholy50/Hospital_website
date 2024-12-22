<?php
include "../../share/head.php";
if (empty($_SESSION['doctor'])) {
    header('location: http://localhost/hospital/pages/login.php');
} else {
    $id = $_SESSION['doctor']['DoctorID'];
    $Email_doctor = $_SESSION['doctor']['Email'];
    //--------select doctor from session to show the ID
    $select = "SELECT * FROM doctors WHERE DoctorID = $id";
    $query = mysqli_query($connect, $select);
    $data = mysqli_fetch_assoc($query);
    //--------------select from view to show the data in the table  
    $select_view = "SELECT * FROM doctor_appointments_invoices WHERE Email = '$Email_doctor' ";
    $query_view = mysqli_query($connect, $select_view);
}
//----------cancell in he appoinment table 
if (isset($_GET['Cancelled'])) {
    $id_appointment = $_GET['Cancelled'];
    $update = "UPDATE `appointments` SET `Status` = 'Cancelled' WHERE AppointmentID = $id_appointment ";
    $query = mysqli_query($connect, $update);
    header('location: http://localhost/hospital/app/doctor/doctor.php');
}
// -----------Confirmed in he appoinment table 
if (isset($_GET['Confirmed'])) {
    $id_appointment = $_GET['Confirmed'];

    $update = "UPDATE `appointments` SET `Status` = 'Confirmed' WHERE AppointmentID = $id_appointment ";
    $query = mysqli_query($connect, $update);
    header('location: http://localhost/hospital/app/doctor/doctor.php');
}

$counter = 1;
include "../../share/header.php";
?>
<style>
    body {
        background-color: #f8f9fa;
    }

    .card {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        padding: 20px;
        background-color: #fff;
        width: 50rem;
    }

    .btn-toggle {
        transition: background-color 0.3s;
        width: 100%;
    }

    .btn-success:hover {
        background-color: #28a745 !important;
    }

    .btn-danger:hover {
        background-color: #dc3545 !important;
    }
</style>
<main id="main" class="main">
    <section class="section profile">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card shadow-lg w-100">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                        <!-- the upper part to select the doctor and sow the name  -->
                        <h1 class="text-uppercase mt-3 text-center">Welcome Dr: <b><?= $data['FullName']; ?></b></h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-5">
            <div class="col-12">
                <div class="card shadow-lg w-100">
                    <div class="card-body">

                        <h3 class="text-center mb-4">Doctor Appointments</h3>
                        <table class="table table-bordered table-striped table-hover shadow-lg w-100">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>patient Name </th>
                                    <th>Appointment Date</th>
                                    <th>Appointment Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <form method="post">
                                    <!-- loop 3ala el view el fo2 -->
                                    <?php foreach ($query_view as $item): ?>
                                        <tr>
                                            <!-- to count the id -->
                                            <td><?= $counter++ ?></td>
                                            <!-- to the follwing data in the view  -->
                                            <td><?= $item['PatientName'] ?></td>
                                            <td><?= $item['AppointmentDate'] ?></td>
                                            <td><?= $item['AppointmentStatus'] ?></td>
                                            <td>
                                                <!--  3 butons each button send a data  -->
                                                <a href="./view_patient.php?id=<?= $item['PatientID'] ?>" class="btn btn-info btn-sm">View</a>
                                                <a href="./doctor.php?Confirmed=<?= $item['AppointmentID'] ?>" class="btn btn-success btn-sm">Confirmed</a>
                                                <a href="./doctor.php?Cancelled=<?= $item['AppointmentID'] ?>" class="btn btn-danger btn-sm">Cancelled</a>
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
    </section>
</main>

<?php
include "../../share/footer.php";
?>