<?php include __DIR__ . '/../layout/header.php'; ?>
<?php include __DIR__ . '/../layout/sidebar.php'; ?>

<div class="container mt-4">
    <h2><?= isset($data) ? 'Edit' : 'Tambah' ?> Data Pembayaran</h2>

    <form method="POST" action="PembayaranController.php?action=<?= isset($data) ? 'update' : 'store' ?>">
        <?php if (isset($data)): ?>
            <input type="hidden" name="id_pembayaran" value="<?= $data['id_pembayaran'] ?>">
        <?php endif; ?>

        <div class="mb-3">
            <label class="form-label">ID Tagihan (id_invoice)</label>
            <input type="number" name="id_invoice" class="form-control" required value="<?= $data['id_invoice'] ?? '' ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Metode Pembayaran</label>
            <input type="text" name="metode_pembayaran" class="form-control" required value="<?= $data['metode_pembayaran'] ?? '' ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Jumlah Bayar</label>
            <input type="number" name="jumlah_bayar" class="form-control" required value="<?= $data['jumlah_bayar'] ?? '' ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Tanggal Pembayaran</label>
            <input type="date" name="tanggal_pembayaran" class="form-control" required value="<?= $data['tanggal_pembayaran'] ?? date('Y-m-d') ?>">
        </div>

        <button type="submit" class="btn btn-success"><?= isset($data) ? 'Perbarui' : 'Simpan' ?></button>
        <a href="PembayaranController.php" class="btn btn-secondary">Batal</a>
    </form>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>
