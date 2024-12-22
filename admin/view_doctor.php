<?php
include "../share/head.php";
if (empty($_SESSION['admin'])) {
    header('location: http://localhost/hospital/pages/login.php');
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $select = "SELECT * FROM doctors WHERE DoctorID = $id";
    $query = mysqli_query($connect, $select);
    $data = mysqli_fetch_assoc($query);
    $Email_doctor = $data['Email'];
    $select = "SELECT * FROM doctors WHERE DoctorID = $id";
    $query = mysqli_query($connect, $select);
    $data = mysqli_fetch_assoc($query);
    //--------------select from view to show the data in the table  
    $select_view = "SELECT * FROM doctor_appointments_invoices WHERE Email = '$Email_doctor' ";
    $query_view = mysqli_query($connect, $select_view);
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
                        <h3><b>ID: </b><?= $data['DoctorID']; ?></h3>
                        <h3><b>Email:</b> <?= $data['Email']; ?></h3>
                        <h3> <b>Specialization:</b><?= $data['Specialization']; ?></h3>
                        <h3> <b>PhoneNumber:</b><?= $data['PhoneNumber']; ?></h3>
                        <h3><b>WorkingHours:</b> <?= $data['WorkingHours']; ?></h3>
                        <h3><b>Salary:</b> <?= $data['Salary']; ?></h3>

                    </div>
                </div>
            </div>

            <div class="col-xl-6">
                <div class="card shadow-lg">
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
include "../share/footer.php";
?>