<?php
include 'koneksi.php';

if (isset($_SESSION['id']) == 0) { /* Halaman ini tidak dapat diakses jika belum ada yang login */
    header('Location: login.php');
}


$id = $_GET['id'];
$data = $conn->prepare("SELECT * FROM companies WHERE id_company = $id");
$data->execute();
$companies = $data->fetch();

$id_user = $_SESSION['id'];
$data = $conn->prepare("SELECT username FROM user WHERE id_user =$id_user");
$data->execute();
$user = $data->fetch();

$data = $conn->prepare('SELECT * FROM detail INNER JOIN companies ON detail.id_company = companies.id_company WHERE companies.id_company = :id');
$data->bindParam(':id', $id);
$data->execute();
$details = $data->fetchAll();



?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Detail</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="menu-utama.php">My WEB</a>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item ">
                    <a class="nav-link" href="menu-utama.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="form-edit-profile.php">Profile</a>
                </li>
                <li>
                    <a href="form-add-company.php" class="nav-link">Add Company</a>
                </li>
            </ul>
            <div class="d-flex">
                <a href="logout.php" class="btn btn-outline-light">Logout</a>
                <p class="text-white my-2 ml-4"><?php echo $user['username'] ?></p>
            </div>
        </div>
    </nav>


    <div class="jumbotron jumbotron-fluid">
        <div class="container text-center">
            <?php if ($companies) { ?>
                <img src="images/<?php echo $companies['image'] ?>" alt="Laptop Azus" class="rounded" width="320px" height="220px">
                <h3><?php echo $companies['company_name'] ?></h3>
                <p><?php echo $companies['about'] ?></p>
                <a href="form-edit-company.php?id=<?php echo $id ?>" class="btn btn-primary ">UPDATE</a>
            <?php } ?>
        </div>
    </div>


    <?php if ($details > 0) { ?>
        <div class=" container">
            <a href="form-add-detail.php?id=<?php echo $id ?>" class="btn btn-success btn-sm" style="float: right;">ADD INFORMATION</a>
            <div class="row">
                <div class="col">
                    <?php foreach ($details as $detail) { ?>
                        <h2><?php echo $detail['tittle'] ?></h2>
                        <div style="float: right;">
                            <a href="form-edit-detail.php?id=<?php echo $detail['id_detail'] ?>&id_company=<?php echo $id ?>" class="btn btn-warning btn-sm">UPDATE</a>
                            <a href="deleteDetail.php?id=<?php echo $detail['id_detail'] ?>&id_company=<?php echo $id ?>" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">DELETE</a>
                        </div>
                        <p><?php echo $detail['desc'] ?></p>
                    <?php } ?>
                </div>
            </div>
        </div>
    <?php } ?>



    <hr>
    <div class="row bg-dark">
        <div class="col-md-12 text-center">
            <p class="font-weight-bold text-white my-3">@Copyright by
                18111060_HeniPrihatiningsih
                TIFRP18CIDA_UASWEB1</p>
        </div>
    </div>
</body>
<script language="javascript" src="js/bootstrap.bundle.min.js"></script>

</html>