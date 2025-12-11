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
    <h1 class="mb-4">Dashboard Apoteker</h1>

    <div class="row">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Stok Obat</h5>
                    <p class="card-text">Lihat dan kelola stok obat tersedia.</p>
                    <a href="../../controllers/ObatController.php" class="btn btn-primary">Kelola Stok Obat</a> <!-- Link nanti bisa diisi -->
                </div>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>
