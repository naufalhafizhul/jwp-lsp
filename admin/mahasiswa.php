<h3>Menu Makanan</h3>
<table class="table table-bordered text-center">
    <thead>
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">NPM</th>
            <th class="text-center">Nama</th>
            <th class="text-center">Materi</th>
            <th class="text-center">KRS</th>
            <th class="text-center">Status</th>
            <th class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; ?>
        <?php $ambil = $koneksi->query("SELECT * FROM mahasiswa LEFT JOIN materi ON mahasiswa.id_materi=materi.id_materi"); ?>
        <?php while ($pecah = $ambil->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $pecah['npm']; ?></td>
                <td><?php echo $pecah['nama']; ?></td>
                <td><?php echo $pecah['nama_materi']; ?></td>
                <td>
                    <a src="../krs/<?php echo $pecah['krs']; ?>"></a>
                </td>
                <td><?php echo $pecah['status']; ?></td>
                <td>
                    <a href="index.php?halaman=ubahmahasiswa&id=<?php echo $pecah['id_mahasiswa']; ?>" class="btn btn-warning">Edit</a>
                    <a href="index.php?halaman=hapusmahasiswa&id=<?php echo $pecah['id_mahasiswa']; ?>" class="btn-danger btn">Hapus</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<!-- Tambah Data -->

<!-- <a href="index.php?halaman=tambahmahasiswa" class="btn btn-primary">Tambah Data</a> -->