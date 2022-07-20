<!-- Hapus Foto Dari Forder foto_produk -->
<?php
$ambil = $koneksi->query("SELECT * FROM mahasiswa WHERE id_mahasiswa='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
$krsmahasiswa = $pecah['krs'];
if (file_exists("../krs/$krsmahasiswa")) {
    unlink("../krs/$krsmahasiswa");
}

/* Hapus Data dari Data Basse */
$koneksi->query("DELETE FROM mahasiswa WHERE npm='$_GET[id]'");

echo "<script>alert('produk terhapus');</script>";
echo "<script>location='index.php?halaman=mahasiswa';</script>";
