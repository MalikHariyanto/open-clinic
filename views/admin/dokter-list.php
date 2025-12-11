<?php include __DIR__ . '/../layout/header.php'; ?>
<?php include __DIR__ . '/../layout/sidebar.php'; ?>

<div class="container mt-4">
    <h2>Data Dokter</h2>
    <a href="DokterController.php?action=create" class="btn btn-primary mb-3">Tambah Dokter</a>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nama Dokter</th>
                <th>Spesialisasi</th>
                <th>Kontak</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dokter as $d): ?>
                <tr>
                    <td><?= $d['id_dokter'] ?></td>
                    <td><?= $d['nama_dokter'] ?></td>
                    <td><?= $d['spesialisasi'] ?></td>
                    <td><?= $d['kontak'] ?></td>
                    <td>
                        <a href="DokterController.php?action=edit&id=<?= $d['id_dokter'] ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="DokterController.php?action=delete&id=<?= $d['id_dokter'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin hapus?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>
