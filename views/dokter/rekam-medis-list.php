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
    <h2>Daftar Rekam Medis</h2>

    <a href="../controllers/RekamMedisController.php?action=create" class="btn btn-primary mb-3">Tambah Rekam Medis</a>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nama Pasien</th>
                <th>Tanggal Rekam</th>
                <th>Diagnosis</th>
                <th>Resep Obat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rekam as $r): ?>
                <tr>
                    <td><?= $r['id_rekam_medis'] ?></td>
                    <td><?= $r['nama_depan'] . ' ' . $r['nama_belakang'] ?></td>
                    <td><?= $r['waktu_medis'] ?></td>
                    <td><?= $r['diagnosis'] ?></td>
                    <td><?= $r['resep_obat'] ?></td>
                    <td>
                        <a href="../../controllers/RekamMedisController.php?action=edit&id=<?= $r['id_rekam_medis'] ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="../../controllers/RekamMedisController.php?action=delete&id=<?= $r['id_rekam_medis'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>
