<?php
include 'koneksi.php';

$id = $_GET['id'];

$data = $conn->prepare("SELECT * FROM companies WHERE id_company = $id");
$data->execute();
$companies = $data->fetch();

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
            <a class="navbar-brand" href="index.php">My WEB</a>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item ">
                    <a class="nav-link" href="index.php">Home </a>
                </li>
            </ul>
            <div class="d-flex">
                <a href="register.php" class="btn btn-info mr-3">Register</a>
                <a href="login.php" class="btn btn-outline-light">Login</a>
            </div>
        </div>
    </nav>


    <div class="jumbotron jumbotron-fluid">
        <div class="container text-center">
            <?php if ($companies) { ?>
                <img src="images/<?php echo $companies['image'] ?>" alt="Laptop Azus" class="rounded" width="320px" height="220px">
                <h3><?php echo $companies['company_name'] ?></h3>
                <p><?php echo $companies['about'] ?></p>
            <?php } ?>
        </div>
    </div>



    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <?php if ($details > 0) { ?>
                    <?php foreach ($details as $detail) { ?>
                        <h2><?php echo $detail['tittle'] ?></h2>
                        <p><?php echo $detail['desc'] ?></p>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    </div>



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