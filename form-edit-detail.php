<?php

include 'koneksi.php';

if (isset($_SESSION['id']) == 0) {
   header('Location: halaman-login.php');
}

$id = $_GET['id'];
$id_company = $_GET['id_company'];

$data = $conn->prepare("SELECT * FROM detail WHERE detail.id_detail = $id");
$data->execute();
$detail = $data->fetch();

?>

<!doctype html>
<html lang="en">

<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="css/bootstrap.min.css">

   <title>UAS!</title>
</head>

<body>
   <div class="container" style="margin-top: 60px;">
      <div class="row justify-content-center">
         <div class="col-md-6 ">
            <div class="card bg-dark text-white">
               <div class="card-header text-center">
                  <h3 class="font-weight-bold">Edit Detail</h3>
               </div>
               <div class="row justify-content-center">
                  <div class="col-md-10">

                     <form action="editDetail.php?id=<?php echo $id ?>" class="card-body" method="POST">
                        <div class="form-group">
                           <input type="hidden" class="form-control" id="id_company" name="id_company" value="<?php echo $id_company ?>">
                        </div>
                        <div class="form-group">
                           <label for="tittle">Judul</label>
                           <input type="text" value="<?php echo $detail['tittle'] ?>" class="form-control" id="tittle" name="tittle">
                        </div>
                        <div class="form-group">
                           <label for="desc">Deskripsi</label>
                           <input type="text" value="<?php echo $detail['desc'] ?>" class="form-control" id="desc" name="desc">
                        </div>
                        <div class="d-flex flex-column ">
                           <hr>
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