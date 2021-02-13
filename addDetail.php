<?php
include 'koneksi.php';
if (isset($_POST['id_company'])) {
    $id = $_POST['id_company'];
    $tittle = $_POST['tittle'];
    $desc = $_POST['desc'];
    $data = $conn->prepare("INSERT INTO `detail` (`id_company`, `id_detail`, `tittle`, `desc`) VALUES ('$id', NULL, '$tittle', '$desc')");
    if ($data->execute()) {
        header("Location: detail-utama.php?id=$id");
        echo "<script>alert('Data Berhasil di Hapus');</script>";
        echo "<script>
    setTimeout(function () {
    window.location.href= 'detail-utama.php?id=$id_company';
     },500);
    </script>";
    }
}
