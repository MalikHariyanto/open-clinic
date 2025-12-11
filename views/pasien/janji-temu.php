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
    <h2>Janji Temu Saya</h2>
`   <?php if (isset($_GET['error'])): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($_GET['error']) ?></div>
    <?php endif; ?>

    <!-- Form Buat Janji Temu -->
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">Buat Janji Temu</div>
        <div class="card-body">
            <form action="<?= BASE_URL ?>controllers/JanjiTemuController.php?action=store" method="POST">
                <div class="mb-3">
                    <label for="id_dokter" class="form-label">Pilih Dokter</label>
                    <select name="id_dokter" id="id_dokter" class="form-select" required>
                        <option value="">-- Pilih Dokter --</option>
                        <?php
                        // ambil semua dokter dari database
                        $dokter = $pdo->query("SELECT id_dokter, nama_dokter FROM dokter")->fetchAll(PDO::FETCH_ASSOC);
                        foreach ($dokter as $d):
                        ?>
                            <option value="<?= $d['id_dokter'] ?>"><?= $d['nama_dokter'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Jam</label>
                    <input type="time" name="jam" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Keluhan</label>
                    <textarea name="keluhan" class="form-control" rows="3" required></textarea>
                </div>

                <button type="submit" class="btn btn-success">Kirim Permintaan Janji</button>
            </form>
        </div>
    </div>

    <!-- Tabel Daftar Janji -->
    <h4>Riwayat Janji Temu</h4>
    <table class="table table-bordered table-striped mt-3">
        <thead class="table-dark">
            <tr>
                <th>Dokter</th>
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
                    <td><?= $j['nama_dokter'] ?></td>
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
                        <a href="<?= BASE_URL ?>controllers/JanjiTemuController.php?action=delete&id=<?= $j['id_janji'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus janji temu ini?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>
