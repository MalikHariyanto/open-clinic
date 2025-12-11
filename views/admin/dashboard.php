<?php 
require_once __DIR__ . '/../../config/session.php'; 
require_login();

// Cek role, pastikan hanya admin yang bisa masuk
if ($_SESSION['user']['role'] !== 'admin') {
    die('Akses hanya untuk admin.');
}

include __DIR__ . '/../layout/header.php'; 
include __DIR__ . '/../layout/sidebar.php'; 
?>

<div class="container mt-4">
    <h1 class="mb-4">Dashboard Admin</h1>

    <div class="row">
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Manajemen Pasien</h5>
                    <p class="card-text">Lihat, tambah, edit, dan hapus data pasien.</p>
                    <a href="../../controllers/PasienController.php" class="btn btn-primary">Kelola Pasien</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Manajemen Asuransi</h5>
                    <p class="card-text">Kelola data asuransi untuk pasien.</p>
                    <a href="../../controllers/AsuransiController.php" class="btn btn-primary">Kelola Asuransi</a>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Manajemen Dokter</h5>
                    <p class="card-text">Kelola data dokter dan spesialisasi.</p>
                    <a href="../../controllers/DokterController.php" class="btn btn-primary">Kelola Dokter</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Tambahkan baris lain untuk fitur lainnya -->
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>
