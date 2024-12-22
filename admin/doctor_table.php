<?php
include "../share/head.php";
if (empty($_SESSION['admin'])) {
  header('location: http://localhost/hospital/pages/login.php');
}
$select = "SELECT*FROM doctors";
$query = mysqli_query($connect, $select);
if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $select = "SELECT *FROM doctors WHERE DoctorID = $id";
  $query = mysqli_query($connect, $select);
  $data = mysqli_fetch_assoc($query);

  $delete = "DELETE FROM `doctors` WHERE DoctorID = $id";
  $query = mysqli_query($connect, $delete);
  header('location: http://localhost/hospital/admin/doctor_table.php'); 
}
include "../share/header_admin.php";
$counter = 1
?>
<div class="container mt-5">
  <h2 class="text-center mb-4 text-primary">Doctor List</h2>
  <table class="table table-bordered table-striped table-hover shadow-lg">
    <thead class="table-light">
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($query as $item): ?>
      <tr>
          <td><?= $counter++ ?></td>
          <td><?= $item['FullName'] ?></td>
          <td><?= $item['Email'] ?></td>
          <td>
            <a href="./view_doctor.php?id=<?= $item['DoctorID'] ?>" class="btn btn-info btn-sm">View</a>
            <a href="./doctor_table.php?delete=<?= $item['DoctorID'] ?>" class="btn btn-danger btn-sm">Delete</a>
          </td>
        </tr>
        <?php endforeach ?>
    </tbody>
  </table>
</div>
?>