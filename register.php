<!doctype html>
<html lang="en">

<?php
include 'koneksi.php';

if (isset($_POST['Registrasi'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    $data = $conn->prepare('INSERT INTO user (username,password,email) VALUES (?, ?, ?)');

    $data->bindParam(1, $username);
    $data->bindParam(2, $password);
    $data->bindParam(3, $email);
    $data->execute();
    echo "<script>alert('Registrasi Berhasil');</script>";
}
?>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Register</title>
</head>

<body>
    <div class="container" style="margin-top: 120px;">
        <div class="row justify-content-center">
            <div class="col-md-6 ">
                <div class="card bg-dark text-white">
                    <div class="card-header text-center">
                        <h3 class="font-weight-bold">Register</h3>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <form class="card-body" method="POST">
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input type="text" class="form-control" name="email" id="email">
                                </div>
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" name="username" id="username">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password" id="password">
                                </div>
                                <div class="d-flex flex-column ">
                                    <p class="text-center">Punya akun ? <a href="login.php">Login</a></p>
                                    <button type="submit" id="Registrasi" name="Registrasi" class="btn btn-outline-light">Register</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="card-footer">
                        <p class="font-weight-bold text-white text-center my-3">@Copyright by
                            18111060_HeniPrihatiningsih
                            TIFRP18CIDA_UASWEB1</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script language="javascript" src="js/bootstrap.bundle.min.js"></script>

</html>