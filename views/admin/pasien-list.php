<?php include __DIR__ . '/../layout/header.php'; ?>
<?php include __DIR__ . '/../layout/sidebar.php'; ?>


<div class="container mt-4">
    <h2>Daftar Pasien</h2>
    <a href="PasienController.php?action=create" class="btn btn-primary mb-3">Tambah Pasien</a>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nama Lengkap</th>
                <th>Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Telepon</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pasien as $row): ?>
                <tr>
                    <td><?= $row['id_pasien'] ?></td>
                    <td><?= $row['nama_depan'] . ' ' . $row['nama_belakang'] ?></td>
                    <td><?= $row['tanggal_lahir'] ?></td>
                    <td><?= $row['jenis_kelamin'] ?></td>
                    <td><?= $row['nomor_telepon'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td>
                        <a href="PasienController.php?action=edit&id=<?= $row['id_pasien'] ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="PasienController.php?action=delete&id=<?= $row['id_pasien'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>
                