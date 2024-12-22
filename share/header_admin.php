<?php
if(isset($_POST['logout'])){
    session_destroy();
    session_unset();
}
?>
<nav class="navbar navbar-expand-lg bg-light border-bottom border-body" data-bs-theme="light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <div class="icon" style="font-size: 30px; display: inline-flex; align-items: center;">
      <i class="ri-folder-lock-fill"></i>
      </div>
      <span style="font-size: 20px; margin-left: 10px; font-weight: bold;">Admin</span>
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mx-auto">
        <li class="nav-item">
          <a class="nav-link px-3 py-2 text-dark" href="<?= url('admin/doctor_table.php') ?>">Doctors</a>
        </li>
        <li class="nav-item">
          <a class="nav-link px-3 py-2 text-dark" href="<?= url('admin/patient_table.php') ?>">Patients</a>
        </li>
        <li class="nav-item">
          <a class="nav-link px-3 py-2 text-dark" href="<?= url('admin/staff_table.php') ?>">Staff</a>
        </li>
      </ul>

      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link btn btn-outline-primary text-dark px-4 py-2 rounded-3" href="<?= url('admin/create_doctor.php') ?>">Create Doctor</a>
        </li>
        <li class="nav-item">
          <a class="nav-link btn btn-outline-primary text-dark px-4 py-2 rounded-3" href="<?= url('admin/create_staff.php') ?>">Create Staff</a>
        </li>
        <li class="nav-item">
          <form action="" method="post">
            <button name="logout" class="nav-link btn btn-danger  text-dark px-4 py-2" >Logout</button>

          </form>
        </li>
      </ul>
    </div>
  </div>
</nav>

