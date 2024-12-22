<?php
include "../share/head.php";
if (empty($_SESSION['admin'])) {
    header('location: http://localhost/hospital/pages/login.php');
}
if(!$connect){
    echo mysqli_connect_error();
    exit;
}
$select_departments="SELECT *FROM departments";
$query_departments=mysqli_query($connect,$select_departments);
if (isset($_POST['send'])) {
    $FullName = $_POST['FullName'];
    $JobTitle = $_POST['JobTitle'];
    $PhoneNumber = $_POST['PhoneNumber'];
    $Salary = $_POST['Salary'];
    $departments = $_POST['departments'];

 

    $insert = "INSERT INTO staff (StaffID, FullName, JobTitle,Salary,PhoneNumber,DepartmentID) VALUES (NULL, '$FullName', '$JobTitle', '$Salary', '$PhoneNumber', '$departments')";
    $query = mysqli_query($connect, $insert);
    header('location: http://localhost/hospital/admin/staff_table.php');

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
                                <span class="d-none d-lg-block">Create Staff</span>
                            </a>
                        </div><!-- End Logo -->

                        <div class="card mb-3">
                            
                        <?php if (isset($_SESSION['error'])): ?>
                                    <div class="alert alert-danger  w-100 p-3" role="alert">
                                     <?php echo $_SESSION['error']?>
                                     <button type=" button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
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
                                        <label for="FullName" class="form-label">Staff FullName</label>
                                        <input type="text" name="FullName" class="form-control" id="FullName" required>
                                        <div class="invalid-feedback">Please, enter Staff name!</div>
                                    </div>
                                    <div class="col-12"> 
                                        <label for="JobTitle" class="form-label">JobTitle</label>
                                        <input type="text" name="JobTitle" class="form-control" id="JobTitle" required>
                                        <div class="invalid-feedback">Please, enter JobTitle!</div>
                                    </div>

                                    <div class="col-12"> 
                                        <label for="departments" class="form-label">Department</label>
                                        <select name="departments" id="departments">
                                            <?php foreach($query_departments as $item):?>
                                            
                                            <option value="<?=$item['DepartmentID']?>"><?=$item['DepartmentName']?></option>
                                            <?php endforeach?>
                                        </select>
                                        <div class="invalid-feedback">Please, enter JobTitle!</div>
                                    </div>
                                    <div class="col-12">
                                        <label for="PhoneNumber" class="form-label">Staff PhoneNumber</label>
                                        <input type="number" name="PhoneNumber" class="form-control" id="PhoneNumber" required>
                                        <div class="invalid-feedback">Please, enter Doctor PhoneNumber!</div>
                                    </div>
                                    <div class="col-12">
                                        <label for="Salary" class="form-label">Staff salary</label>
                                        <input type="number" name="Salary" class="form-control" id="Salary" required>
                                        <div class="invalid-feedback">Please, Salary!</div>
                                    </div>
                                

                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" name="send" type="submit">Create Staff</button>
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