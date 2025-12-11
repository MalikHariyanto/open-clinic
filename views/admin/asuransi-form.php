<?php include __DIR__ . '/../layout/header.php'; ?>
<?php include __DIR__ . '/../layout/sidebar.php'; ?>

<div class="container mt-4">
    <h2><?= isset($data) ? 'Edit' : 'Tambah' ?> Data Asuransi</h2>

    <form method="POST" action="AsuransiController.php?action=<?= isset($data) ? 'update' : 'store' ?>">
        <?php if (isset($data)): ?>
            <input type="hidden" name="id_asuransi" value="<?= $data['id_asuransi'] ?>">
        <?php endif; ?>

        <div class="mb-3">
            <label class="form-label">Nomor Asuransi</label>
            <input type="text" name="nomor_asuransi" class="form-control" required value="<?= $data['nomor_asuransi'] ?? '' ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Nama Perusahaan</label>
            <input type="text" name="nama_perusahaan" class="form-control" required value="<?= $data['nama_perusahaan'] ?? '' ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Kategori Tarif</label>
            <input type="text" name="kategori_tarif" class="form-control" required value="<?= $data['kategori_tarif'] ?? '' ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Tanggal Mulai</label>
            <input type="date" name="tanggal_mulai" class="form-control" required value="<?= $data['tanggal_mulai'] ?? '' ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Tanggal Akhir</label>
            <input type="date" name="tanggal_akhir" class="form-control" required value="<?= $data['tanggal_akhir'] ?? '' ?>">
        </div>

        <button type="submit" class="btn btn-success"><?= isset($data) ? 'Perbarui' : 'Simpan' ?></button>
        <a href="AsuransiController.php" class="btn btn-secondary">Batal</a>
    </form>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>
