<?php
include 'koneksi.php'; // panggil perintah koneksi database

if (isset($_SESSION['id']) == 0) { /* Halaman ini tidak dapat diakses jika belum ada yang login */
    header('Location: login.php');
}

$session = $_SESSION['id'];
$data = $conn->prepare("SELECT * FROM user where id_user = $session");
$data->execute();
$user = $data->fetch();

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Profile</title>
</head>

<body>
    <div class="container" style="margin-top: 60px;">
        <div class="row justify-content-center">
            <div class="col-md-6 ">
                <div class="card bg-dark text-white">
                    <div class="card-header text-center">
                        <h3 class="font-weight-bold">Update Profile</h3>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <form class="card-body" action="editProfile.php" method="POST">
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input type="text" class="form-control" value="<?php echo $user['email'] ?>" name="email" id="email">
                                </div>
                                <div class="form-group">
                                    <label for="Username">Username</label>
                                    <input type="text" class="form-control" value="<?php echo $user['username'] ?>" name="username" id="username">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" value="<?php echo $user['password'] ?>" name="password" id="password">
                                </div>
                                <hr>
                                <div class="d-flex flex-column ">
                                    <button type="submit" class="btn btn-outline-light">Save</button>
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