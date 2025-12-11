<?php 
require_once __DIR__ . '/../../config/session.php'; 
require_login();

// Cek role, pastikan hanya admin yang bisa masuk
if ($_SESSION['user']['role'] !== 'admin') {
    die('Akses hanya untuk admin.');
}

$username = $_SESSION['user']['username'] ?? 'Admin';

include __DIR__ . '/../layout/header.php'; 
include __DIR__ . '/../layout/sidebar.php'; 
?>

<!-- Welcome Section -->
<div class="welcome-section">
    <div class="breadcrumb-modern" style="color: rgba(255,255,255,0.7);">
        <i class="bi bi-house-fill"></i>
        <span>/</span>
        <span>Dashboard</span>
    </div>
    <h2><i class="bi bi-emoji-smile me-2"></i>Selamat Datang, <?= htmlspecialchars($username) ?>!</h2>
    <p>Kelola sistem klinik dengan mudah dan efisien melalui panel administrasi ini.</p>
    <div class="welcome-date">
        <i class="bi bi-calendar3 me-1"></i>
        <?php 
            $formatter = new IntlDateFormatter('id_ID', IntlDateFormatter::FULL, IntlDateFormatter::NONE);
            echo $formatter->format(new DateTime());
        ?>
    </div>
    <div class="quick-actions">
        <a href="../../controllers/PasienController.php?action=create" class="quick-action-btn">
            <i class="bi bi-plus-circle"></i> Tambah Pasien
        </a>
        <a href="../../controllers/DokterController.php?action=create" class="quick-action-btn">
            <i class="bi bi-plus-circle"></i> Tambah Dokter
        </a>
        <a href="../../controllers/JanjiTemuController.php" class="quick-action-btn">
            <i class="bi bi-calendar-plus"></i> Lihat Jadwal
        </a>
    </div>
</div>

<!-- Statistics Cards -->
<div class="row g-4 mb-4">
    <div class="col-md-6 col-lg-3">
        <div class="stat-card primary">
            <div class="stat-icon">
                <i class="bi bi-people-fill"></i>
            </div>
            <div class="stat-value">150</div>
            <div class="stat-label">Total Pasien</div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="stat-card success">
            <div class="stat-icon">
                <i class="bi bi-person-badge-fill"></i>
            </div>
            <div class="stat-value">12</div>
            <div class="stat-label">Dokter Aktif</div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="stat-card warning">
            <div class="stat-icon">
                <i class="bi bi-calendar-check-fill"></i>
            </div>
            <div class="stat-value">28</div>
            <div class="stat-label">Janji Temu Hari Ini</div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="stat-card info">
            <div class="stat-icon">
                <i class="bi bi-shield-check"></i>
            </div>
            <div class="stat-value">85</div>
            <div class="stat-label">Pasien Terasuransi</div>
        </div>
    </div>
</div>

<!-- Page Header -->
<div class="page-header">
    <h1 class="page-title">Menu Manajemen</h1>
    <p class="page-subtitle">Kelola seluruh data klinik melalui fitur-fitur berikut</p>
</div>

<!-- Feature Cards -->
<div class="row g-4">
    <div class="col-md-6 col-lg-4">
        <div class="feature-card">
            <div class="feature-icon">
                <i class="bi bi-people-fill"></i>
            </div>
            <h3 class="feature-title">Manajemen Pasien</h3>
            <p class="feature-desc">Lihat, tambah, edit, dan hapus data pasien dengan mudah. Kelola informasi lengkap setiap pasien.</p>
            <a href="../../controllers/PasienController.php" class="btn btn-modern btn-modern-primary">
                <i class="bi bi-arrow-right"></i> Kelola Pasien
            </a>
        </div>
    </div>

    <div class="col-md-6 col-lg-4">
        <div class="feature-card green">
            <div class="feature-icon">
                <i class="bi bi-shield-check"></i>
            </div>
            <h3 class="feature-title">Manajemen Asuransi</h3>
            <p class="feature-desc">Kelola data asuransi untuk pasien. Pantau coverage dan validitas polis asuransi.</p>
            <a href="../../controllers/AsuransiController.php" class="btn btn-modern btn-modern-success">
                <i class="bi bi-arrow-right"></i> Kelola Asuransi
            </a>
        </div>
    </div>

    <div class="col-md-6 col-lg-4">
        <div class="feature-card blue">
            <div class="feature-icon">
                <i class="bi bi-person-badge-fill"></i>
            </div>
            <h3 class="feature-title">Manajemen Dokter</h3>
            <p class="feature-desc">Kelola data dokter dan spesialisasi. Atur jadwal praktik dan informasi kontak.</p>
            <a href="../../controllers/DokterController.php" class="btn btn-modern btn-modern-primary">
                <i class="bi bi-arrow-right"></i> Kelola Dokter
            </a>
        </div>
    </div>

    <div class="col-md-6 col-lg-4">
        <div class="feature-card orange">
            <div class="feature-icon">
                <i class="bi bi-credit-card-fill"></i>
            </div>
            <h3 class="feature-title">Pembayaran & Tagihan</h3>
            <p class="feature-desc">Kelola pembayaran dan tagihan pasien. Pantau status pembayaran dengan mudah.</p>
            <a href="../../controllers/PembayaranController.php" class="btn btn-modern btn-modern-primary">
                <i class="bi bi-arrow-right"></i> Kelola Pembayaran
            </a>
        </div>
    </div>

    <div class="col-md-6 col-lg-4">
        <div class="feature-card purple">
            <div class="feature-icon">
                <i class="bi bi-calendar-check-fill"></i>
            </div>
            <h3 class="feature-title">Jadwal & Janji Temu</h3>
            <p class="feature-desc">Atur jadwal janji temu pasien dengan dokter. Kelola antrian dan penjadwalan.</p>
            <a href="../../controllers/JanjiTemuController.php" class="btn btn-modern btn-modern-primary">
                <i class="bi bi-arrow-right"></i> Kelola Jadwal
            </a>
        </div>
    </div>

    <div class="col-md-6 col-lg-4">
        <div class="feature-card red">
            <div class="feature-icon">
                <i class="bi bi-graph-up-arrow"></i>
            </div>
            <h3 class="feature-title">Laporan & Statistik</h3>
            <p class="feature-desc">Lihat laporan dan statistik klinik. Analisis data untuk pengambilan keputusan.</p>
            <a href="#" class="btn btn-modern btn-modern-outline">
                <i class="bi bi-arrow-right"></i> Lihat Laporan
            </a>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>
