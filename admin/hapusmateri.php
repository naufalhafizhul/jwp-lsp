<?php
/* Hapus Data dari Data Basse */
$koneksi->query("DELETE FROM materi WHERE id_materi='$_GET[id]'");

echo "<script>alert('produk terhapus');</script>";
echo "<script>location='index.php?halaman=materi';</script>";
