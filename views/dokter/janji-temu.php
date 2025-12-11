<?php
require_once __DIR__ . '/../../config/session.php';
require_login();

if ($_SESSION['user']['role'] !== 'dokter') {
    die('Akses hanya untuk dokter.');
}

include __DIR__ . '/../layout/header.php';
include __DIR__ . '/../layout/sidebar.php';
?>

<div class="container mt-4">
    <h2>Janji Temu Masuk</h2>

    <table class="table table-bordered table-striped mt-3">
        <thead class="table-dark">
            <tr>
                <th>Pasien</th>
                <th>Tanggal</th>
                <th>Jam</th>
                <th>Keluhan</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($janji as $j): ?>
                <tr>
                    <td><?= $j['nama_depan'] . ' ' . $j['nama_belakang'] ?></td>
                    <td><?= $j['tanggal'] ?></td>
                    <td><?= $j['jam'] ?></td>
                    <td><?= $j['keluhan'] ?></td>
                    <td>
                        <?php if ($j['status'] === 'diajukan'): ?>
                            <span class="badge bg-warning text-dark">Diajukan</span>
                        <?php elseif ($j['status'] === 'diterima'): ?>
                            <span class="badge bg-success">Diterima</span>
                        <?php elseif ($j['status'] === 'ditolak'): ?>
                            <span class="badge bg-danger">Ditolak</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if ($j['status'] === 'diajukan'): ?>
                            <a href="<?= BASE_URL ?>controllers/JanjiTemuController.php?action=ubah-status&id=<?= $j['id_janji'] ?>&status=diterima" class="btn btn-sm btn-success">Terima</a>
                            <a href="<?= BASE_URL ?>controllers/JanjiTemuController.php?action=ubah-status&id=<?= $j['id_janji'] ?>&status=ditolak" class="btn btn-sm btn-danger">Tolak</a>
                        <?php else: ?>
                            <span class="text-muted">Sudah diproses</span>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>
