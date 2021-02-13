<?php
include 'koneksi.php';
$id = $_GET['id'];

if (isset($_POST['tittle']) && isset($_POST['desc'])) {
    $id_company = $_POST['id_company'];
    $tittle = $_POST['tittle'];
    $desc = $_POST['desc'];
    $data = $conn->prepare("UPDATE `detail` SET `tittle` = '$tittle' , `desc` = '$desc' WHERE `detail`.`id_detail` = $id ");
    if ($data->execute()) {
        echo "<script>alert('Data Berhasil di Ubah');</script>";
        echo "<script>
        setTimeout(function () {
        window.location.href= 'detail-utama.php?id=$id_company';
     
         },500);
        </script>";
    }
}
