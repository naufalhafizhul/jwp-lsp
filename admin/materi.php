<h3>Data Kategori</h3>
<hr>

<table class="table table-bordered">
    <thead>
        <tr>
            <td>No</td>
            <td>Materi</td>
            <td>Jadwal</td>
            <td>Keterangan</td>
            <td>Aksi</td>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        <?php $ambil = $koneksi->query("SELECT * FROM materi"); ?>
        <?php while ($pecah = $ambil->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $pecah['nama_materi']; ?></td>
                <td><?php echo $pecah['jadwal']; ?></td>
                <td><?php echo $pecah['keterangan']; ?></td>
                <td>
                    <a href="index.php?halaman=editmateri&id=<?php echo $pecah['id_materi']; ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="index.php?halaman=hapusmateri&id=<?php echo $pecah['id_materi']; ?>" class="btn btn-danger btn-sm">Hapus</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<a href="index.php?halaman=tambahmateri" class="btn btn-default">Tambah Data</a>