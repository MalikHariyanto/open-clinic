<?php
require_once __DIR__ . '/../../config/session.php';
require_login();

if ($_SESSION['user']['role'] !== 'apoteker') {
    die('Akses hanya untuk apoteker.');
}

include __DIR__ . '/../layout/header.php';
include __DIR__ . '/../layout/sidebar.php';
?>

<div class="container mt-4">
    <h2><?= isset($data) ? 'Edit' : 'Tambah' ?> Obat</h2>

    <form action="<?= BASE_URL ?>controllers/ObatController.php?action=<?= isset($data) ? 'update' : 'store' ?>" method="POST">
        <?php if (isset($data)): ?>
            <input type="hidden" name="id_obat" value="<?= $data['id_obat'] ?>">
        <?php endif; ?>

        <div class="mb-3">
            <label class="form-label">Nama Obat</label>
            <input type="text" name="nama_obat" class="form-control" required value="<?= $data['nama_obat'] ?? '' ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Kategori</label>
            <input type="text" name="kategori" class="form-control" required value="<?= $data['kategori'] ?? '' ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Stok</label>
            <input type="number" name="stok" class="form-control" required min="0" value="<?= $data['stok'] ?? 0 ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Harga (Rp)</label>
            <input type="number" name="harga" class="form-control" required step="0.01" value="<?= $data['harga'] ?? '' ?>">
        </div>

        <button type="submit" class="btn btn-success"><?= isset($data) ? 'Perbarui' : 'Simpan' ?></button>
        <a href="<?= BASE_URL ?>controllers/ObatController.php" class="btn btn-secondary">Batal</a>
    </form>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>
