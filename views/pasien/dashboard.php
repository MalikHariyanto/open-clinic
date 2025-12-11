<?php 
require_once __DIR__ . '/../../config/session.php'; 
require_login();

if ($_SESSION['user']['role'] !== 'pasien') {
    die('Akses hanya untuk pasien.');
}

$username = $_SESSION['user']['username'] ?? 'Pasien';

include __DIR__ . '/../layout/header.php'; 
include __DIR__ . '/../layout/sidebar.php'; 
?>

<!-- Welcome Section -->
<div class="welcome-section" style="background: linear-gradient(135deg, #0ea5e9 0%, #38bdf8 100%);">
    <div class="breadcrumb-modern" style="color: rgba(255,255,255,0.7);">
        <i class="bi bi-house-fill"></i>
        <span>/</span>
        <span>Dashboard Pasien</span>
    </div>
    <h2><i class="bi bi-person-heart me-2"></i>Selamat Datang, <?= htmlspecialchars($username) ?>!</h2>
    <p>Akses informasi kesehatan dan layanan klinik Anda dengan mudah.</p>
    <div class="welcome-date">
        <i class="bi bi-calendar3 me-1"></i>
        <?= date('l, d F Y') ?>
    </div>
    <div class="quick-actions">
        <a href="../../controllers/JanjiTemuController.php?action=create" class="quick-action-btn">
            <i class="bi bi-calendar-plus"></i> Buat Janji Temu
        </a>
        <a href="../../controllers/RekamMedisController.php" class="quick-action-btn">
            <i class="bi bi-file-medical"></i> Riwayat Medis
        </a>
    </div>
</div>

<!-- Statistics Cards -->
<div class="row g-4 mb-4">
    <div class="col-md-6 col-lg-3">
        <div class="stat-card primary">
            <div class="stat-icon">
                <i class="bi bi-calendar-check-fill"></i>
            </div>
            <div class="stat-value">2</div>
            <div class="stat-label">Janji Temu Aktif</div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="stat-card success">
            <div class="stat-icon">
                <i class="bi bi-file-medical-fill"></i>
            </div>
            <div class="stat-value">15</div>
            <div class="stat-label">Total Kunjungan</div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="stat-card info">
            <div class="stat-icon">
                <i class="bi bi-shield-check"></i>
            </div>
            <div class="stat-value">Aktif</div>
            <div class="stat-label">Status Asuransi</div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="stat-card warning">
            <div class="stat-icon">
                <i class="bi bi-receipt"></i>
            </div>
            <div class="stat-value">Rp 0</div>
            <div class="stat-label">Tagihan Pending</div>
        </div>
    </div>
</div>

<!-- Page Header -->
<div class="page-header">
    <h1 class="page-title">Layanan Pasien</h1>
    <p class="page-subtitle">Akses berbagai layanan kesehatan Anda</p>
</div>

<!-- Feature Cards -->
<div class="row g-4">
    <div class="col-md-6 col-lg-4">
        <div class="feature-card blue">
            <div class="feature-icon">
                <i class="bi bi-calendar-plus-fill"></i>
            </div>
            <h3 class="feature-title">Jadwal Janji Temu</h3>
            <p class="feature-desc">Buat janji temu baru dengan dokter pilihan Anda. Lihat jadwal yang tersedia.</p>
            <a href="../../controllers/JanjiTemuController.php" class="btn btn-modern btn-modern-primary">
                <i class="bi bi-arrow-right"></i> Kelola Jadwal
            </a>
        </div>
    </div>

    <div class="col-md-6 col-lg-4">
        <div class="feature-card green">
            <div class="feature-icon">
                <i class="bi bi-file-medical-fill"></i>
            </div>
            <h3 class="feature-title">Riwayat Pemeriksaan</h3>
            <p class="feature-desc">Lihat riwayat pemeriksaan dan rekam medis Anda. Akses hasil laboratorium.</p>
            <a href="../../controllers/RekamMedisController.php" class="btn btn-modern btn-modern-success">
                <i class="bi bi-arrow-right"></i> Lihat Riwayat
            </a>
        </div>
    </div>

    <div class="col-md-6 col-lg-4">
        <div class="feature-card orange">
            <div class="feature-icon">
                <i class="bi bi-credit-card-fill"></i>
            </div>
            <h3 class="feature-title">Riwayat Pembayaran</h3>
            <p class="feature-desc">Lihat tagihan dan riwayat pembayaran Anda. Cek status klaim asuransi.</p>
            <a href="#" class="btn btn-modern btn-modern-outline">
                <i class="bi bi-arrow-right"></i> Lihat Pembayaran
            </a>
        </div>
    </div>
</div>

<!-- Upcoming Appointments -->
<div class="card-modern mt-4">
    <div class="card-header">
        <i class="bi bi-calendar-event me-2"></i>Janji Temu Mendatang
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Waktu</th>
                        <th>Dokter</th>
                        <th>Spesialisasi</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?= date('d M Y', strtotime('+2 days')) ?></td>
                        <td><span class="badge-modern badge-info">10:00</span></td>
                        <td>Dr. Andi Wijaya</td>
                        <td>Umum</td>
                        <td><span class="badge-modern badge-success">Dikonfirmasi</span></td>
                    </tr>
                    <tr>
                        <td><?= date('d M Y', strtotime('+1 week')) ?></td>
                        <td><span class="badge-modern badge-info">14:30</span></td>
                        <td>Dr. Siti Rahayu</td>
                        <td>Gigi</td>
                        <td><span class="badge-modern badge-warning">Menunggu</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>
