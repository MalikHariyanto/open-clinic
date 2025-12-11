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
    <h1 class="mb-4">Dashboard Dokter</h1>

    <div class="row">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Rekam Medis Pasien</h5>
                    <p class="card-text">Lihat dan kelola rekam medis pasien.</p>
                    <a href="../../controllers/RekamMedisController.php" class="btn btn-primary">Kelola Rekam Medis</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>
