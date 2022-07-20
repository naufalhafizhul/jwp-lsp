<?php
session_start();
include 'admin/dbconnect.php';

$keyword = $_GET["keyword"];

$semuadata = array();
$ambil = $koneksi->query("SELECT * FROM produk WHERE nama_produk LIKE '%$keyword%' OR des_produk LIKE '%$keyword%'");
while ($pecah = $ambil->fetch_assoc()) {
    $semuadata[] = $pecah;
}
// echo "<pre>";
// print_r($semuadata);
// echo "</pre>";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pencarian</title>
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>

<body>
    <style>
        /* card */
        .thumbnail img {
            width: 100%;
            height: 300px;
        }

        .thumbnail p {
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
        }
    </style>
    <!-- Navbar -->
    <?php include 'navbar.php'; ?>
    <section class="konten">
        <div class="container">
            <h2>Hasil Pencarian : <?php echo $keyword ?></h2>
            <!-- Jika kosong -->
            <?php if (empty($semuadata)) : ?>
                <div class="alert alert-danger">Makanan <strong><?php echo $keyword  ?></strong> Tidak Ditemukan</div>
            <?php endif  ?>

            <div class="row">
                <?php foreach ($semuadata as $key => $value) : ?>
                    <div class="col-md-3">
                        <div class="thumbnail">
                            <img src="foto_produk/<?php echo $value['foto_produk'] ?>">
                            <div class="caption">
                                <h3><?php echo $value['nama_produk'] ?> </h3>
                                <p><?php echo $value['des_produk'] ?></p>
                                <h5><?php echo "Rp. " . number_format($value['harga_produk'], '0', ',', '.') ?></h5>
                                <a href="detail.php?id=<?php echo $value['id_produk']; ?>" class="btn btn-primary">Beli</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach  ?>
            </div>
        </div>
    </section>
</body>

</html>