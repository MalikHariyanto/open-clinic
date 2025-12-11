<?php
require_once __DIR__ . '/../../config/session.php';
require_login();

if ($_SESSION['user']['role'] !== 'pasien') {
    die('Akses hanya untuk pasien.');
}

include __DIR__ . '/../layout/header.php';
include __DIR__ . '/../layout/sidebar.php';
?>

<div class="container mt-4">
    <h2>Riwayat Pemeriksaan</h2>

    <table class="table table-bordered table-striped mt-3">
        <thead class="table-dark">
            <tr>
                <th>Tanggal</th>
                <th>Dokter</th>
                <th>Diagnosis</th>
                <th>Resep Obat</th>
                <th>Hasil Pemeriksaan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($rekam as $r): ?>
                <tr>
                    <td><?= date('d-m-Y', strtotime($r['waktu_medis'])) ?></td>
                    <td><?= $r['nama_dokter'] ?? 'N/A' ?></td>
                    <td><?= $r['diagnosis'] ?></td>
                    <td><?= $r['resep_obat'] ?></td>
                    <td><?= $r['hasil_pemeriksaan'] ?></td>
                    <td>
                        <a href="<?= BASE_URL ?>controllers/RekamMedisController.php?action=pdf&id=<?= $r['id_rekam_medis'] ?>" class="btn btn-sm btn-outline-primary">Cetak PDF</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>
