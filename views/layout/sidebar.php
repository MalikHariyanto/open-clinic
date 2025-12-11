<?php
require_once __DIR__ . '/../../config/session.php';
require_once __DIR__ . '/../../config/config.php';
require_login();
$role = $_SESSION['user']['role'];
$username = $_SESSION['user']['username'] ?? 'User';
$initial = strtoupper(substr($username, 0, 1));
?>

<!-- Modern Navbar -->
<nav class="navbar navbar-expand-lg navbar-modern">
    <div class="container-fluid">
        <button class="btn d-lg-none me-2" type="button" id="sidebarToggle" style="color: #fff;">
            <i class="bi bi-list fs-4"></i>
        </button>
        <a class="navbar-brand" href="<?= BASE_URL ?>">
            <i class="bi bi-heart-pulse"></i>
            <?= APP_NAME ?>
        </a>
        
        <div class="ms-auto d-flex align-items-center">
            <div class="dropdown">
                <div class="user-dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="user-avatar"><?= $initial ?></div>
                    <div class="user-info d-none d-md-block">
                        <div class="user-name"><?= htmlspecialchars($username) ?></div>
                        <div class="user-role"><?= htmlspecialchars($role) ?></div>
                    </div>
                    <i class="bi bi-chevron-down text-white ms-2"></i>
                </div>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="#"><i class="bi bi-person me-2"></i>Profil Saya</a></li>
                    <li><a class="dropdown-item" href="#"><i class="bi bi-gear me-2"></i>Pengaturan</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item text-danger" href="<?= BASE_URL ?>controllers/AuthController.php?action=logout"><i class="bi bi-box-arrow-right me-2"></i>Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<!-- Modern Sidebar -->
<aside class="sidebar-modern" id="sidebar">
    <div class="sidebar-menu">
        <div class="menu-label">Menu Utama</div>
        
        <?php if ($role === 'admin'): ?>
            <a href="<?= BASE_URL ?>views/admin/dashboard.php" class="sidebar-link active">
                <i class="bi bi-grid-1x2-fill"></i>
                <span>Dashboard</span>
            </a>
            <a href="<?= BASE_URL ?>controllers/PasienController.php" class="sidebar-link">
                <i class="bi bi-people-fill"></i>
                <span>Manajemen Pasien</span>
            </a>
            <a href="<?= BASE_URL ?>controllers/AsuransiController.php" class="sidebar-link">
                <i class="bi bi-shield-check"></i>
                <span>Data Asuransi</span>
            </a>
            <a href="<?= BASE_URL ?>controllers/DokterController.php" class="sidebar-link">
                <i class="bi bi-person-badge-fill"></i>
                <span>Manajemen Dokter</span>
            </a>
            
            <div class="menu-label">Transaksi</div>
            <a href="<?= BASE_URL ?>controllers/PembayaranController.php" class="sidebar-link">
                <i class="bi bi-credit-card-fill"></i>
                <span>Pembayaran & Tagihan</span>
            </a>
            <a href="<?= BASE_URL ?>controllers/JanjiTemuController.php" class="sidebar-link">
                <i class="bi bi-calendar-check-fill"></i>
                <span>Jadwal & Janji Temu</span>
            </a>

        <?php elseif ($role === 'dokter'): ?>
            <a href="<?= BASE_URL ?>views/dokter/dashboard.php" class="sidebar-link active">
                <i class="bi bi-grid-1x2-fill"></i>
                <span>Dashboard</span>
            </a>
            <a href="<?= BASE_URL ?>controllers/RekamMedisController.php" class="sidebar-link">
                <i class="bi bi-file-medical-fill"></i>
                <span>Kelola Rekam Medis</span>
            </a>
            <a href="<?= BASE_URL ?>controllers/JanjiTemuController.php" class="sidebar-link">
                <i class="bi bi-calendar-check-fill"></i>
                <span>Janji Temu</span>
            </a>

        <?php elseif ($role === 'apoteker'): ?>
            <a href="<?= BASE_URL ?>views/apoteker/dashboard.php" class="sidebar-link active">
                <i class="bi bi-grid-1x2-fill"></i>
                <span>Dashboard</span>
            </a>
            <a href="<?= BASE_URL ?>controllers/ObatController.php" class="sidebar-link">
                <i class="bi bi-capsule"></i>
                <span>Manajemen Stok Obat</span>
            </a>

        <?php elseif ($role === 'pasien'): ?>
            <a href="<?= BASE_URL ?>views/pasien/dashboard.php" class="sidebar-link active">
                <i class="bi bi-grid-1x2-fill"></i>
                <span>Dashboard</span>
            </a>
            <a href="<?= BASE_URL ?>controllers/JanjiTemuController.php" class="sidebar-link">
                <i class="bi bi-calendar-check-fill"></i>
                <span>Jadwal Janji Temu</span>
            </a>
            <a href="<?= BASE_URL ?>controllers/RekamMedisController.php" class="sidebar-link">
                <i class="bi bi-file-medical-fill"></i>
                <span>Riwayat Pemeriksaan</span>
            </a>
        <?php endif; ?>

        <a href="<?= BASE_URL ?>controllers/AuthController.php?action=logout" class="sidebar-link logout-link">
            <i class="bi bi-box-arrow-right"></i>
            <span>Logout</span>
        </a>
    </div>
</aside>

<!-- Main Content Wrapper -->
<main class="main-content">
