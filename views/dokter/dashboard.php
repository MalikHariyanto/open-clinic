<?php 
require_once __DIR__ . '/../../config/session.php'; 
require_login();

if ($_SESSION['user']['role'] !== 'dokter') {
    die('Akses hanya untuk dokter.');
}

$username = $_SESSION['user']['username'] ?? 'Dokter';

include __DIR__ . '/../layout/header.php'; 
include __DIR__ . '/../layout/sidebar.php'; 
?>

<!-- Welcome Section -->
<div class="welcome-section" style="background: linear-gradient(135deg, #10b981 0%, #34d399 100%);">
    <div class="breadcrumb-modern" style="color: rgba(255,255,255,0.7);">
        <i class="bi bi-house-fill"></i>
        <span>/</span>
        <span>Dashboard Dokter</span>
    </div>
    <h2><i class="bi bi-heart-pulse me-2"></i>Selamat Datang, Dr. <?= htmlspecialchars($username) ?>!</h2>
    <p>Kelola rekam medis dan jadwal praktik Anda dengan mudah.</p>
    <div class="welcome-date">
        <i class="bi bi-calendar3 me-1"></i>
        <?= date('l, d F Y') ?>
    </div>
    <div class="quick-actions">
        <a href="../../controllers/RekamMedisController.php?action=create" class="quick-action-btn">
            <i class="bi bi-plus-circle"></i> Buat Rekam Medis
        </a>
        <a href="../../controllers/JanjiTemuController.php" class="quick-action-btn">
            <i class="bi bi-calendar-check"></i> Lihat Jadwal
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
            <div class="stat-value">8</div>
            <div class="stat-label">Janji Temu Hari Ini</div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="stat-card success">
            <div class="stat-icon">
                <i class="bi bi-people-fill"></i>
            </div>
            <div class="stat-value">45</div>
            <div class="stat-label">Total Pasien Ditangani</div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="stat-card warning">
            <div class="stat-icon">
                <i class="bi bi-clock-history"></i>
            </div>
            <div class="stat-value">3</div>
            <div class="stat-label">Menunggu Konsultasi</div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="stat-card info">
            <div class="stat-icon">
                <i class="bi bi-file-medical-fill"></i>
            </div>
            <div class="stat-value">120</div>
            <div class="stat-label">Rekam Medis</div>
        </div>
    </div>
</div>

<!-- Page Header -->
<div class="page-header">
    <h1 class="page-title">Menu Dokter</h1>
    <p class="page-subtitle">Kelola pasien dan rekam medis Anda</p>
</div>

<!-- Feature Cards -->
<div class="row g-4">
    <div class="col-md-6">
        <div class="feature-card green">
            <div class="feature-icon">
                <i class="bi bi-file-medical-fill"></i>
            </div>
            <h3 class="feature-title">Rekam Medis Pasien</h3>
            <p class="feature-desc">Lihat dan kelola rekam medis pasien. Catat diagnosis, resep obat, dan tindakan medis.</p>
            <a href="../../controllers/RekamMedisController.php" class="btn btn-modern btn-modern-success">
                <i class="bi bi-arrow-right"></i> Kelola Rekam Medis
            </a>
        </div>
    </div>

    <div class="col-md-6">
        <div class="feature-card blue">
            <div class="feature-icon">
                <i class="bi bi-calendar-check-fill"></i>
            </div>
            <h3 class="feature-title">Jadwal Janji Temu</h3>
            <p class="feature-desc">Lihat jadwal janji temu dengan pasien. Kelola waktu praktik dan konfirmasi jadwal.</p>
            <a href="../../controllers/JanjiTemuController.php" class="btn btn-modern btn-modern-primary">
                <i class="bi bi-arrow-right"></i> Lihat Jadwal
            </a>
        </div>
    </div>
</div>

<!-- Today's Appointments -->
<div class="card-modern mt-4">
    <div class="card-header">
        <i class="bi bi-calendar-event me-2"></i>Janji Temu Hari Ini
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>Waktu</th>
                        <th>Pasien</th>
                        <th>Keluhan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><span class="badge-modern badge-info">09:00</span></td>
                        <td>Ahmad Sutrisno</td>
                        <td>Demam & Flu</td>
                        <td><span class="badge-modern badge-success">Selesai</span></td>
                        <td><a href="#" class="btn btn-sm btn-modern btn-modern-outline">Detail</a></td>
                    </tr>
                    <tr>
                        <td><span class="badge-modern badge-info">10:30</span></td>
                        <td>Rina Wulandari</td>
                        <td>Kontrol Rutin</td>
                        <td><span class="badge-modern badge-warning">Menunggu</span></td>
                        <td><a href="#" class="btn btn-sm btn-modern btn-modern-primary">Periksa</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>
