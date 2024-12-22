<?php
include "../../share/head.php";
if (isset($_GET['id'])) {
    $id_doctor = $_GET['id'];
    $id_patient = $_SESSION['patient']['PatientID'];
    $date_appointments = date('Y-m-d h:i:s',strtotime('+3 days'));
    $date_InvoiceDate = date('Y-m-d h:i:s');
    //--------------SELECT DOCTOR----------
    $select_doctor = "SELECT*FROM doctors WHERE DoctorID = $id_doctor";
    $query_doctor = mysqli_query($connect, $select_doctor);
    $doctor_data = mysqli_fetch_assoc($query_doctor);
     $TotalAmount=$doctor_data['consultationFee'];
}else{
    header('location: http://localhost/hospital/pages/login.php'); 
}
//-----------Book Appointment-------
if(isset($_POST['send'])){

    //--------------insert invoices----------
    $insert_invoices="INSERT INTO invoices VALUES(NULL,$id_patient,'$date_InvoiceDate','$TotalAmount','Unpaid')";
    $query_invoices=mysqli_query($connect,$insert_invoices);
    //-------------select invoices-----------------
    $select_invoices="SELECT MAX(InvoiceID) as InvoiceID FROM invoices";
    $query_invoices_SELECT=mysqli_query($connect,$select_invoices);
    $num_invoices=mysqli_fetch_array($query_invoices_SELECT);
    $id_invoices=$num_invoices['InvoiceID'] ;
//-------------------insert appointments-----------------
       $insert_appointments="INSERT INTO appointments VALUES( NULL,$id_patient,$id_invoices,$id_doctor,'$date_appointments','Pending')";
       $query_appointments=mysqli_query($connect,$insert_appointments);
       
       header('location: http://localhost/hospital/app/patient/appointments.php');
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
                                <span class="d-none d-lg-block">CHECK Appointments</span>
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
                                    <h5 class="card-title text-center pb-0 fs-4">Create Appointments</h5>
                                </div>

                                <form class="row g-3 needs-validation" method="post" enctype="multipart/form-data">
                                    <div class="col-12">
                                        <h4 for="yourName" class="form-label"><b>Doctor FullName:</b><?=$doctor_data['FullName']?></h4>
                                        <div class="invalid-feedback">Please, enter Doctor name!</div>
                                    </div>
                                    <div class="col-12">
                                        <h4 for="yourName" class="form-label"><b>Doctor Specialization:</b><?=$doctor_data['Specialization']?></h4>
                                        <div class="invalid-feedback">Please, enter Doctor Specialization!</div>
                                    </div>
                                    <div class="col-12">
                                        <h4 for="DoctorName" class="form-label"><b>Doctor consultation Fee:</b><?=$doctor_data['consultationFee']?></h4>
                                        <div class="invalid-feedback">Please, enter Doctor consultationFee!</div>
                                    </div>
                                    <div class="col-12">
                                        <h4 for="DoctorName" class="form-label"><b>Appointment Date:</b><?=$date_appointments?></h4>
                                        <div class="invalid-feedback">Please, enter Doctor consultationFee!</div>
                                    </div>


                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" name="send" type="submit">Book An Appointment</button>
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