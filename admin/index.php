<?php
    include "../share/head.php";
if(empty($_SESSION['admin'] )){
    header('location: http://localhost/hospital/pages/login.php');
}else{
    $select_doctor = "SELECT COUNT(*) AS total_doctor FROM doctors";
    $query_doctor = mysqli_query($connect, $select_doctor);
    $count_doctor=mysqli_fetch_assoc($query_doctor);

    $select_patient ="SELECT COUNT(*) AS total_patient FROM patients";
    $query_patient = mysqli_query($connect, $select_patient);
    $count_patient=mysqli_fetch_assoc($query_patient);

}
include "../share/header_admin.php";
?>
  <style>
    .card {
      background-color: #f9f9f9;
      border-radius: 12px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .card-title span {
      color: #4b9cd3; /* تغيير اللون في العنوان */
    }
    .card-body {
      background-color: #ffffff;
    }
    .card-icon {
      background-color: #4b9cd3; /* لون الدائرة */
    }
    .text-danger {
      color: #ff5722; /* تغيير لون النسبة */
    }
  </style>
<body class="bg-light">

<div class="container py-5">
  <!-- رسالة الترحيب باستخدام Bootstrap فقط -->
  <div class="row justify-content-center mb-4">
    <div class="col-12 text-center">
      <h1 class="display-3 text-primary fw-bold mb-4" style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);">Welcome <?=$_SESSION['admin']['FullName']?></h1>
    </div>
  </div>

  <div class="row justify-content-center">
    
    <!-- عملاء - بطاقة 1 -->
    <div class="col-lg-4 col-md-6 col-sm-12">
      <div class="card info-card customers-card">

        <div class="card-body">
          <h5 class="card-title">Number of<span> | patient</span></h5>

          <div class="d-flex align-items-center">
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="font-size: 60px; background-color: #f0f0f0; padding: 25px;">
              <i class="bi bi-people" style="font-size: 3rem; color: #17a2b8;"></i>
            </div>

            <div class="ps-3">
              <h6 style="font-size: 2rem; font-weight: bold; color: #333;"><?=$count_patient['total_patient']?></h6>
            </div>
          </div>

        </div>
      </div>
    </div>

    <!-- عملاء - بطاقة 3 -->
    <div class="col-lg-4 col-md-6 col-sm-12">
      <div class="card info-card customers-card">

        <div class="card-body">
        <h5 class="card-title">Number of<span> | Doctor</span></h5>

          <div class="d-flex align-items-center">
            <!-- أيقونة العميل -->
            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center" style="font-size: 60px; background-color: #f0f0f0; padding: 25px;">
              <i class="bi bi-people" style="font-size: 3rem; color: #17a2b8;"></i>
            </div>

            <!-- عدد العملاء -->
            <div class="ps-3">
              <h6 style="font-size: 2rem; font-weight: bold; color: #333;"><?=$count_doctor['total_doctor']?></h6>
            </div>
          </div>

        </div>
      </div>
    </div>

  </div>
</div>

<!-- تضمين جافاسكربت من Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
