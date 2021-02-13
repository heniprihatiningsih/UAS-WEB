<!doctype html>
<html lang="en">

<?php

include "koneksi.php";

$data = $conn->prepare('SELECT * FROM companies');
$data->execute();
$companies = $data->fetchAll();

?>

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">

  <title>Welcome!</title>
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

  <?php if ($companies > 0) { ?>
    <?php for ($i = 0; $i < count($companies); $i++) { ?>
      <?php if (isset($companies[$i])) { ?>
        <div class="container">
          <div class="jumbotron jumbotron-fluid">
            <div class="container text-center">
              <img src="images/<?php echo $companies[$i]['image'] ?>" class="rounded" width="420px" height="320px">
              <h3><?php echo $companies[$i]['company_name'] ?></h3>
              <p><?php echo $companies[$i]['about'] ?></p>
              <a href="detail.php?id=<?php echo $companies[$i]['id_company'] ?>" class="btn btn-primary">DETAILS</a>
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