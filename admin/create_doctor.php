<?php
include "../share/head.php";
if (empty($_SESSION['admin'])) {
    header('location: http://localhost/hospital/pages/login.php');
}
if (isset($_POST['send'])) {
    $FullName = $_POST['FullName'];
    $Specialization = $_POST['Specialization'];
    $PhoneNumber = $_POST['PhoneNumber'];
    $Email = $_POST['Email'];
    $WorkingHours = $_POST['WorkingHours'];
    $Salary = $_POST['Salary'];
    $consultationFee = $_POST['consultationFee'];

   
    $select  = "SELECT * FROM doctors WHERE Email = '$Email'";
    $query = mysqli_query($connect, $select);
    $numRow = mysqli_num_rows($query);

    if ($numRow > 0) {
        $_SESSION['error'] = "email already exists";
        header('location: http://localhost/hospital/admin/create_doctor.php');
        exit;
    }

    $insert = "INSERT INTO doctors (FullName, Specialization, PhoneNumber, Email, WorkingHours, Salary, consultationFee) VALUES ('$FullName', '$Specialization', '$PhoneNumber', '$Email', '$WorkingHours', '$Salary', '$consultationFee')";
    $query = mysqli_query($connect, $insert);
    header('location: http://localhost/hospital/admin/doctor_table.php');

}
?>
<main>
    <div class="container">
        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
                        <div class="d-flex justify-content-center py-4">
                            <a href="index.html" class="logo d-flex align-items-center w-auto">
                                <img src="assets/img/logo.png" alt="">
                                <span class="d-none d-lg-block">Create Doctor</span>
                            </a>
                        </div><!-- End Logo -->

                        <div class="card mb-3">
                           
                        <?php if (isset($_SESSION['error'])): ?>
                                    <div class="alert alert-danger  w-100 p-3" role="alert">
                                     <?php echo $_SESSION['error']?>
                                     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                    <?php unset($_SESSION['error']); ?>
                                <?php endif; ?>

                            <div class="card-body">
                                <div class="pt-4 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                                    <p class="text-center small">Enter your personal details to create account</p>
                                </div>

                                <form class="row g-3 needs-validation" method="post" enctype="multipart/form-data">
                                    <div class="col-12">
                                        <label for="yourName" class="form-label">Doctor FullName</label>
                                        <input type="text" name="FullName" class="form-control" id="DoctorName" required>
                                        <div class="invalid-feedback">Please, enter Doctor name!</div>
                                    </div>
                                    <div class="col-12">
                                        <label for="yourName" class="form-label">Doctor Specialization</label>
                                        <input type="text" name="Specialization" class="form-control" id="DoctorSpecialization" required>
                                        <div class="invalid-feedback">Please, enter Doctor Specialization!</div>
                                    </div>
                                    <div class="col-12">
                                        <label for="DoctorName" class="form-label">Doctor PhoneNumber</label>
                                        <input type="text" name="PhoneNumber" class="form-control" id="DoctorPhoneNumber" required>
                                        <div class="invalid-feedback">Please, enter Doctor PhoneNumber!</div>
                                    </div>
                                    <div class="col-12">
                                        <label for="DoctorEmail" class="form-label">Doctor Email</label>
                                        <input type="email" name="Email" class="form-control" id="DoctorEmail" required>
                                        <div class="invalid-feedback">Please, enter Doctor Email!</div>
                                    </div>
                                    
                                    <div class="col-12">
                                        <label for="DoctorName" class="form-label">Doctor WorkingHours</label>
                                        <input type="text" name="WorkingHours" class="form-control" id="DoctorWorkingHours" required>
                                        <div class="invalid-feedback">Please, enter Doctor WorkingHours!</div>
                                    </div>
                                    <div class="col-12">
                                        <label for="DoctorName" class="form-label">Doctor consultation Fee</label>
                                        <input type="text" name="consultationFee" class="form-control" id="DoctorconsultationFee" required>
                                        <div class="invalid-feedback">Please, enter Doctor consultationFee!</div>
                                    </div>

                                    <div class="col-12">
                                        <label for="DoctorName" class="form-label">Doctor Salary</label>
                                        <input type="text" name="Salary" class="form-control" id="DoctorSalary" required>
                                        <div class="invalid-feedback">Please, enter Doctor Salary!</div>
                                    </div>

                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" name="send" type="submit">Create Doctor</button>
                                    </div>
                                </form>

                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </section>

    </div>
</main>