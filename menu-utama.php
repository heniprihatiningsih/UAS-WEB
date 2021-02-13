<?php

include 'koneksi.php';

if (isset($_SESSION['id']) == 0) { /* Halaman ini tidak dapat diakses jika belum ada yang login */
    header('Location: login.php');
}

$id_user = $_SESSION['id'];
$data = $conn->prepare("SELECT username FROM user WHERE id_user =$id_user");
$data->execute();
$user = $data->fetch();

$data = $conn->prepare('SELECT * FROM companies');
$data->execute();
$companies = $data->fetchAll();

?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Menu Utama</title>
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



    <?php if ($companies > 0) { ?>
        <?php for ($i = 0; $i < count($companies); $i++) { ?>
            <?php if (isset($companies[$i])) { ?>
                <div class="container">
                    <div class="jumbotron jumbotron-fluid">
                        <div class="container text-center">
                            <img src="images/<?php echo $companies[$i]['image'] ?>" class="rounded" width="420px" height="320px">
                            <h3><?php echo $companies[$i]['company_name'] ?></h3>
                            <p><?php echo $companies[$i]['about'] ?></p>
                            <a href="detail-utama.php?id=<?php echo $companies[$i]['id_company'] ?>" class="btn btn-primary">UPDATE</a>
                            <a href="deleteCompany.php?id=<?php echo $companies[$i]['id_company'] ?>" class="btn btn-danger" onclick="return confirm('Are you sure?')">DELETE</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        <?php } ?>
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