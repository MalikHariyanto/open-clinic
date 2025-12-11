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
    <h1 class="mb-4">Dashboard Pasien</h1>

    <div class="row">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Jadwal Janji Temu</h5>
                    <p class="card-text">Lihat jadwal konsultasi Anda.</p>
                    <a href="#" class="btn btn-primary">Lihat Jadwal</a> <!-- Link nanti bisa diisi -->
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">Riwayat Pembayaran</h5>
                    <p class="card-text">Lihat tagihan dan pembayaran Anda.</p>
                    <a href="#" class="btn btn-primary">Lihat Pembayaran</a> <!-- Link nanti bisa diisi -->
                </div>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>
