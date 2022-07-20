<h3>Ubah kategori</h3>
<?php
$ambil = $koneksi->query("SELECT * FROM materi WHERE id_materi='$_GET[id]'");
$pecah = $ambil->fetch_assoc();

// echo "<pre>";
// print_r($pecah);
// echo "</pre>";
?>
<form method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <div class="form-group">
            <label>Nama Materi</label>
            <input type="text" class="form-control" name="nama" value="<?php echo $pecah['nama_materi']; ?>">
        </div>
        <div class="form-group">
            <label>NPM</label>
            <input type="text" class="form-control" name="jadwal" value="<?php echo $pecah['jadwal']; ?>">
        </div>
        <div class="form-group">
        <label>Keterangan</label>
        <textarea class="form-control" name="keterangan" rows="10"><?php echo $pecah['keterangan']; ?></textarea>
    </div>
        <button class="btn btn-primary" name="ubah">Ubah</button>
</form>
<?php
if (isset($_POST['ubah'])) {
    $koneksi->query("UPDATE materi SET nama_materi='$_POST[nama]' WHERE id_materi='$_GET[id]'");

    echo "<div class='alert alert-info'>Data Telah Diubah</div>";
    echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=materi'>";
}
?>