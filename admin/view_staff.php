<?php
include "../share/head.php";
if (empty($_SESSION['admin'])) {
    header('location: http://localhost/hospital/pages/login.php');
}

if (isset($_GET['id'])) {
    $id_staff = $_GET['id'];
    $_SESSION['staff'] = ['id' => $_GET['id']];
    $select = "SELECT * FROM staff WHERE 	StaffID = $id_staff";
    $query = mysqli_query($connect, $select);
    $data = mysqli_fetch_assoc($query);
}
$date = date('Y-m-d h:i:sa');
if (isset($_GET['add'])) {
    $id = $_GET['add'];

    $time = date('Y-m-d');

    //  دا كويري البحث عن اليوم لو موجود في قاعدوة البيانات
    $select_attendance = "SELECT * FROM `attendance` WHERE AttendanceDate like'$time%' and StaffID = $id  ";
    $query_attendance = mysqli_query($connect, $select_attendance);

    //  دا كود التحق من الوقت لو كان مسجل غياب قبل كدة في نفس اليوم
    foreach ($query_attendance as $date_in_database) {
        if ($date_in_database == $time) {
        } else {
            $_SESSION['error']="you already check up";
            header('location: http://localhost/hospital/admin/view_staff.php?id=' . $id);
            die;
        }
        exit;
    }
    $select = "INSERT INTO `attendance`(`AttendanceID`, `StaffID`, `AttendanceDate`) VALUES (NULL,'$id','$date')";
    $query = mysqli_query($connect, $select);
    header('location: http://localhost/hospital/admin/view_staff.php?id=' . $id);
}

if (isset($_GET['delete'])) {
    $id_attendance = $_GET['delete'];
    $select = "DELETE FROM `attendance` WHERE AttendanceID = $id_attendance";
    $query = mysqli_query($connect, $select);
    header('location: http://localhost/hospital/admin/staff_table.php');
}

$counter = 1;
$select = "SELECT * FROM attendance WHERE 	StaffID = $id_staff";
$query = mysqli_query($connect, $select);

include "../share/header_admin.php";
?>

<main id="main" class="main">
    <section class="section profile">
        <div class="row justify-content-around">
            <div class="col-xl-4">
                <div class="card shadow-lg">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">


                        <h1 class="text-uppercase mt-3"><b><?= $data['FullName']; ?></b></h1>
                        <h3><b> StaffID:</b> <?= $data['StaffID']; ?></h3>
                        <h3><b>JobTitle:</b> <?= $data['JobTitle']; ?></h3>
                        <h3><b>Salary:</b> <?= $data['Salary']; ?></h3>
                        <h3><b>PhoneNumber:</b> <?= $data['PhoneNumber']; ?></h3>



                    </div>
                </div>
            </div>

            <div class="col-xl-8">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h3 class="text-center mb-4">staff attendance</h3>
                        <?php if (isset($_SESSION['error'])): ?>
                            <div class="alert alert-danger  w-100 p-3" role="alert">
                                <?php echo $_SESSION['error'] ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                            <?php unset($_SESSION['error']); ?>
                        <?php endif; ?>
                        <table class="table table-bordered table-striped table-hover shadow-lg">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>AttendanceDate</th>
                                    <th><a href="./view_staff.php?add=<?= $data['StaffID'] ?>" class="btn btn-success btn-lg">Add</a></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($query as $item): ?>
                                    <tr>
                                        <td><?= $counter++ ?></td>
                                        <td><?= $item['AttendanceDate'] ?></td>
                                        <td>
                                            <a href="./view_staff.php?delete=<?= $item['AttendanceID'] ?>" class="btn btn-danger btn-sm">Delete</a>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
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