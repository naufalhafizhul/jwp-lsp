<?php
session_start();



include 'admin/dbconnect.php'
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>

<body>
  <!-- Navbar -->
  <?php include 'navbar.php'; ?>
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Login Pelanggan</h3>
          </div>
          <div class="panel-body">
            <form method="POST">
              <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" name="email">
              </div>
              <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password">
              </div>
              <button class="btn btn-success" name="simpan">Login</button>
              <button type="button" class="btn btn-link"><a href="daftar.php">Daftar Sekarang</a></button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php
  //jika ada tombol simpan ditekan
  if (isset($_POST["simpan"])) {
    //buat variable untuk mengambil email dan password yang diinpun lenggan
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Lalu Cek akun Di database
    $ambil = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan='$email' AND password_pelanggan='$password'");
    // ngitung akun yg terambil
    $akuncocok = $ambil->num_rows;
    //Jika 1 akun yang cocok, maka diloginkan
    if ($akuncocok == 1) {
      //anda sudah login
      // mendapatkan akun dalam bentuk array
      $akun = $ambil->fetch_assoc();
      // simpan akun yg login
      $_SESSION["pelanggan"] = $akun;
      echo "<script>alert('anda succes login');</script>";

      //jk sudah belanja
      if (isset($_SESSION["keranjang"]) or !empty($_SESSION["keranjang"])) {
        echo "<script>location='checkout.php';</script>";
      } else {
        echo "<script>location='produk.php';</script>";
      }
    } else {
      //gagal login
      echo "<script>alert('anda gagal login, Periksa akun anda kebali');</script>";
      echo "<script>location='login.php';</script>";
    }
  }
  ?>
</body>

</html>