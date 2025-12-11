<?php include __DIR__ . '/../layout/header.php'; ?>
<?php include __DIR__ . '/../layout/sidebar.php'; ?>

<div class="container mt-4">
    <h2><?= isset($data) ? 'Edit' : 'Tambah' ?> Data Dokter</h2>

    <form method="POST" action="DokterController.php?action=<?= isset($data) ? 'update' : 'store' ?>">
        <?php if (isset($data)): ?>
            <input type="hidden" name="id_dokter" value="<?= $data['id_dokter'] ?>">
        <?php endif; ?>

        <div class="mb-3">
            <label class="form-label">Nama Dokter</label>
            <input type="text" name="nama_dokter" class="form-control" required value="<?= $data['nama_dokter'] ?? '' ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Spesialisasi</label>
            <input type="text" name="spesialisasi" class="form-control" required value="<?= $data['spesialisasi'] ?? '' ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Kontak</label>
            <input type="text" name="kontak" class="form-control" required value="<?= $data['kontak'] ?? '' ?>">
        </div>

        <button type="submit" class="btn btn-success"><?= isset($data) ? 'Perbarui' : 'Simpan' ?></button>
        <a href="DokterController.php" class="btn btn-secondary">Batal</a>
    </form>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>
