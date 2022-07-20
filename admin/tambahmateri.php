<h3>Tambah Kategori</h3>

<form method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label>Nama Materi</label>
        <input type="text" class="form-control" name="nama">
    </div>
    <div class="form-group">
        <label>Jadwal</label>
        <input type="text" class="form-control" name="jadwal">
    </div>
    <div class="form-group">
        <label>Keterangan</label>
        <textarea class="form-control" name="keterangan" rows="10"></textarea>
    </div>
    <button class="btn btn-primary" name="save">Simpan</button>
</form>

<!-- Untuk Fungsi Post -->
<?php
if (isset($_POST['save'])) {
    $koneksi->query("INSERT INTO materi (nama_materi, jadwal, keterangan) VALUES('$_POST[nama]', '$_POST[jadwal]', '$_POST[keterangan]')");

    echo "<div class='alert alert-info'>Data Tersimpan</div>";
    echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=materi'>";
}
?>