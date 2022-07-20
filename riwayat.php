<?php
session_start();
include 'admin/dbconnect.php';

// jika tidak ada sesson pelanggan (blm login)
if (!isset($_SESSION["pelanggan"]) or empty($_SESSION["pelanggan"])) {
  echo "<script>alert('silahkan login');</script>";
  echo "<script>location='login.php';</script>";
  exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Riwayat Belanja</title>
  <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>

<body>
  <!-- Navbar -->
  <?php include 'navbar.php'; ?>

  <section class="riwayat">
    <div class="container">
      <h3>Riwayat Belanja <?php echo $_SESSION["pelanggan"]["nama_pelanggan"] ?></h3>

      <table class="table table-bordered">
        <thead>
          <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Status</th>
            <th>Total</th>
            <th>Opsi</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $nomor = 1;
          // mendapatkan id pelanggan yang login dari session
          $id_pelanggan = $_SESSION["pelanggan"]['id_pelanggan'];

          $ambil = $koneksi->query("SELECT * FROM pembelian WHERE id_pelanggan='$id_pelanggan'");
          while ($pecah = $ambil->fetch_assoc()) {
          ?>
            <tr>
              <td><?php echo $nomor++ ?></td>
              <td><?php echo $pecah["tanggal_pembelian"] ?></td>
              <td><?php echo $pecah["status_pembelian"] ?></td>
              <td><?php echo "Rp. " . number_format($pecah['total_pembelian'], '0', ',', '.') ?></td>
              <td>
                <a href="nota.php?id=<?php echo $pecah["id_pembelian"] ?>" class="btn btn-info">Nota</a>
                <?php
                if ($pecah['status_pembelian'] == 'pending') : ?>
                  <a href="pembayaran.php?id=<?php echo $pecah["id_pembelian"] ?>" class="btn btn-success">Pembayaran</a>
                <?php else : ?>
                  <a href="lihat_pembayaran.php?id=<?php echo $pecah['id_pembelian']; ?>" class="btn btn-warning">Lihat Pembayaran</a>
                <?php endif ?>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </section>
</body>

</html>