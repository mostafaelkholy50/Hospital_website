<?php
if(isset($_POST['logout'])){
    session_destroy();
    session_unset();
    
}
?>
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
  <div class="container-fluid">
    <a class="navbar-brand d-flex align-items-center" href="<?= url('app/patient/patient.php') ?>">
      <i class="ri-heart-pulse-fill" style="font-size: 40px; margin-right: 10px;"></i> 
      <span>Hospital</span>
    </a>
    <ul class="navbar-nav mx-auto">
        <li class="nav-item">
          <a class="nav-link px-3 py-2 text-dark" href="<?= url('app/patient/appointments.php') ?>">Your Appointments</a>
        </li>
       
      </ul>
    <form class="d-flex" method="post" role="search">
      <button name="logout" class="btn btn-outline-danger" type="submit">Logout</button>
    </form>
  </div>
</nav>
