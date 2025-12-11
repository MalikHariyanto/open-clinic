<?php include __DIR__ . '/../layout/header.php'; ?>
<?php include __DIR__ . '/../layout/sidebar.php'; ?>

<div class="container mt-4">
    <h2>Data Asuransi</h2>
    <a href="AsuransiController.php?action=create" class="btn btn-primary mb-3">Tambah Asuransi</a>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nomor Asuransi</th>
                <th>Perusahaan</th>
                <th>Kategori Tarif</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Akhir</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($asuransi as $a): ?>
                <tr>
                    <td><?= $a['id_asuransi'] ?></td>
                    <td><?= $a['nomor_asuransi'] ?></td>
                    <td><?= $a['nama_perusahaan'] ?></td>
                    <td><?= $a['kategori_tarif'] ?></td>
                    <td><?= $a['tanggal_mulai'] ?></td>
                    <td><?= $a['tanggal_akhir'] ?></td>
                    <td>
                        <a href="AsuransiController.php?action=edit&id=<?= $a['id_asuransi'] ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="AsuransiController.php?action=delete&id=<?= $a['id_asuransi'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin hapus?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>
