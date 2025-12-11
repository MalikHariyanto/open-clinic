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
    <h2>Manajemen Stok Obat</h2>
    <a href="<?= BASE_URL ?>controllers/ObatController.php?action=create" class="btn btn-primary mb-3">Tambah Obat</a>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nama Obat</th>
                <th>Kategori</th>
                <th>Stok</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($obat as $o): ?>
                <tr>
                    <td><?= $o['id_obat'] ?></td>
                    <td><?= $o['nama_obat'] ?></td>
                    <td><?= $o['kategori'] ?></td>
                    <td>
                        <?= $o['stok'] ?>
                        <?php if ((int)$o['stok'] === 0): ?>
                            <span class="badge bg-danger">Stok Habis</span>
                        <?php elseif ((int)$o['stok'] < 10): ?>
                            <span class="badge bg-warning text-dark">Stok Menipis</span>
                        <?php endif; ?>
                    </td>
                    <td>Rp<?= number_format($o['harga'], 0, ',', '.') ?></td>
                    <td>
                        <a href="<?= BASE_URL ?>controllers/ObatController.php?action=edit&id=<?= $o['id_obat'] ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="<?= BASE_URL ?>controllers/ObatController.php?action=delete&id=<?= $o['id_obat'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>
