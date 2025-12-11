<?php include __DIR__ . '/../layout/header.php'; ?>
<?php include __DIR__ . '/../layout/sidebar.php'; ?>

<div class="container mt-4">
    <h2>Data Pembayaran</h2>
    <a href="PembayaranController.php?action=create" class="btn btn-primary mb-3">Tambah Pembayaran</a>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Pasien</th>
                <th>Tagihan</th>
                <th>Jumlah Bayar</th>
                <th>Metode</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pembayaran as $p): ?>
                <tr>
                    <td><?= $p['id_pembayaran'] ?></td>
                    <td><?= $p['nama_depan'] . ' ' . $p['nama_belakang'] ?></td>
                    <td>Rp<?= number_format($p['jumlah_total'], 0, ',', '.') ?> (<?= $p['status'] ?>)</td>
                    <td>Rp<?= number_format($p['jumlah_bayar'], 0, ',', '.') ?></td>
                    <td><?= $p['metode_pembayaran'] ?></td>
                    <td><?= $p['tanggal_pembayaran'] ?></td>
                    <td>
                        <a href="PembayaranController.php?action=edit&id=<?= $p['id_pembayaran'] ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="PembayaranController.php?action=delete&id=<?= $p['id_pembayaran'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>
