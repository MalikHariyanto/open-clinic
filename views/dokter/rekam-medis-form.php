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
    <h2><?= isset($data) ? 'Edit' : 'Tambah' ?> Rekam Medis</h2>

    <form method="POST" action="../../controllers/RekamMedisController.php?action=<?= isset($data) ? 'update' : 'store' ?>">
        <?php if (isset($data)): ?>
            <input type="hidden" name="id_rekam_medis" value="<?= $data['id_rekam_medis'] ?>">
        <?php endif; ?>

        <div class="mb-3">
            <label class="form-label">ID Pasien</label>
            <input type="number" name="id_pasien" class="form-control" required value="<?= $data['id_pasien'] ?? '' ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">ID Kunjungan (Encounter)</label>
            <input type="number" name="id_encounter" class="form-control" required value="<?= $data['id_encounter'] ?? '' ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Diagnosis</label>
            <textarea name="diagnosis" class="form-control" required><?= $data['diagnosis'] ?? '' ?></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Resep Obat</label>
            <textarea name="resep_obat" class="form-control" required><?= $data['resep_obat'] ?? '' ?></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Hasil Pemeriksaan</label>
            <textarea name="hasil_pemeriksaan" class="form-control"><?= $data['hasil_pemeriksaan'] ?? '' ?></textarea>
        </div>

        <button type="submit" class="btn btn-success"><?= isset($data) ? 'Perbarui' : 'Simpan' ?></button>
        <a href="../../openclinic/controllers/RekamMedisController.php" class="btn btn-secondary">Batal</a>
    </form>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>
