<?php
include 'koneksi.php';
$id = $_SESSION['id'];

if (isset($_POST['username']) || isset($_POST['password']) || isset($_POST['email'])) {
    $Username = $_POST['username'];
    $Password = $_POST['password'];
    $Email = $_POST['email'];
    $data = $conn->prepare("UPDATE `user` SET `username` = '$Username', `password` = '$Password', `email` = '$Email' WHERE `user`.`id_user` = $id;");
    if ($data->execute()) {
        echo "<script>alert('Data Berhasil di Ubah');</script>";
        echo "<script>
        setTimeout(function () {
        window.location.href= 'menu-utama.php';
         },500);
        </script>";
    }
}
