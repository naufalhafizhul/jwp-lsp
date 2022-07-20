<?php
$datamateri = array();

$ambil = $koneksi->query("SELECT * FROM materi");
while ($tiap = $ambil->fetch_assoc()) {
    $datakategori[] = $tiap;
}

// echo "<pre>";
// print_r($datakategori);
// echo "</pre>";
?>
<h3>Tambah Produk</h3>

<form method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label>Nama</label>
        <input type="text" class="form-control" name="nama">
    </div>
    <div class="form-group">
        <label>NPM</label>
        <input type="text" class="form-control" name="npm">
    </div>
    <div class="form-group">
        <label>Kategori</label>
        <select name="id_materi" class="form-control">
            <option value="">Pilih Kategori</option>
            <?php foreach ($datakategori as $key => $value) : ?>
                <option value="<?php echo $value["id_materi"] ?>"><?php echo $value["nama_materi"] ?></option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="form-group">
        <label>KRS</label>
        <input type="file" class="form-control" name="foto">
    </div>
    <button class="btn btn-primary" name="save">Submit</button>
</form>

<!-- Untuk Fungsi Post -->
<?php
if (isset($_POST['save'])) {
    $nama = $_FILES['krs']['name'];
    $lokasi = $_FILES['krs']['tmp_name'];
    move_uploaded_file($lokasi, "../krs/" . $nama);
    $koneksi->query("INSERT INTO mahasiswa (nama,npm,krs,id_materi) VALUES('$_POST[nama]','$_POST[npm]','$nama','$_POST[id_materi]')");

    echo "<div class='alert alert-info'>Data Tersimpan</div>";
    echo "<meta http-equiv='refresh' content='1;url=index.php?'>";
}
?>