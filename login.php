<?php
include 'koneksi.php';

if (isset($_POST['login'])) {
   $email = $_POST['email'];
   $password = $_POST['password'];

   $sql = "SELECT * FROM user WHERE email = :email AND password = :password";
   $stmt = $conn->prepare($sql);
   $stmt->bindParam(':email', $email);
   $stmt->bindParam(':password', $password);
   $stmt->execute();
   $id = $stmt->fetch();
   $count = $stmt->rowCount();
   if ($count == 1) {
      $_SESSION['id'] = $id['id_user'];
      header("Location: menu-utama.php");
      return;
   }
}

?>

<!doctype html>
<html lang="en">

<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="css/bootstrap.min.css">

   <title>Login</title>
</head>

<body>
   <div class="container" style="margin-top: 120px;">
      <div class="row justify-content-center">
         <div class="col-md-6 ">
            <div class="card bg-dark text-white">
               <div class="card-header text-center">
                  <h3 class="font-weight-bold">Login</h3>
               </div>
               <div class="row justify-content-center">
                  <div class="col-md-10">

                     <form name="form" class="card-body" method="POST">
                        <div class="form-group">
                           <label for="email">Email address</label>
                           <input type="text" class="form-control" id="email" name="email">
                        </div>
                        <div class="form-group">
                           <label for="password">Password</label>
                           <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div class="d-flex flex-column ">
                           <p class="text-center">Tidak punya akun ? <a href="register.php">Register</a></p>
                           <button type="submit" value="login" name="login" id="login" class="btn btn-outline-light">Login</button>
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
<script language="javascript">
   var login = document.getElementById("login");
   login.addEventListener("click", () => {
      var email = document.forms["form"]["email"].value;
      var password = document.forms["form"]["password"].value;

      if (email != "" && password != "") {
         window.location.replace("menu-utama.php");
      } else {
         alert("Email dan password salah!");
      }
   });
</script>

</html>