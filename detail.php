<?php
session_start();
include 'admin/dbconnect.php';

//Mendapankan id produk dari url
$id_produk = $_GET["id"];

// query ambil data 
$ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
$detail = $ambil->fetch_assoc();

// echo "<pre>";
// print_r($detail);
// echo "</pre>";
?>
<!DOCTYPE html>

<head>
    <title>Detail <?php echo $detail["nama_produk"]; ?></title>
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>

<body>
    <!-- Navbar -->
    <?php include 'navbar.php'; ?>

    <section class="kontent">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="foto_produk/<?php echo $detail["foto_produk"] ?>" alt="" class="img-responsive" style="height: 500px; width: 100%;">
                </div>
                <div class="col-md-6">
                    <h2>Nama: <?php echo $detail["nama_produk"]; ?></h2>
                    <p><?php echo $detail["des_produk"]; ?></p>
                    <h4>Harga: Rp. <?php echo number_format($detail["harga_produk"], '0', ',', '.') ?></h4>

                    <h5>Stok : <?php echo $detail["stok_produk"]; ?></h5>
                    <form method="POST">
                        <div class="form-group">
                            <div class="input-group">
                                <label>Jumlah</label>
                                <input type="number" min="1" value="1" class="form-control" name="jumlah" max="<?php echo $detail["stok_produk"]; ?>">
                            </div>
                            <div class="input-group-btn">
                                <button class="btn btn-primary" name="beli">Beli</button>
                            </div>
                        </div>
                    </form>
                    <?php
                    //jika ada tombol beli
                    if (isset($_POST["beli"])) {
                        //mendapatkan jumlah yang diinputkan
                        $jumlah = $_POST["jumlah"];
                        //masukan ke keranjang belanja
                        $_SESSION["keranjang"]["$id_produk"] = $jumlah;

                        echo "<script>alert('produk telah masuk ke keranjang belanja');</script>";
                        echo "<script>location='keranjang.php';</script>";
                    }
                    ?>
                </div>
            </div>
    </section>
</body>

</html>