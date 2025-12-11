<?php 
require_once __DIR__ . '/../../config/session.php'; 
require_login();

if ($_SESSION['user']['role'] !== 'apoteker') {
    die('Akses hanya untuk apoteker.');
}

$username = $_SESSION['user']['username'] ?? 'Apoteker';

include __DIR__ . '/../layout/header.php'; 
include __DIR__ . '/../layout/sidebar.php'; 
?>

<!-- Welcome Section -->
<div class="welcome-section" style="background: linear-gradient(135deg, #f59e0b 0%, #fbbf24 100%);">
    <div class="breadcrumb-modern" style="color: rgba(255,255,255,0.7);">
        <i class="bi bi-house-fill"></i>
        <span>/</span>
        <span>Dashboard Apoteker</span>
    </div>
    <h2><i class="bi bi-capsule me-2"></i>Selamat Datang, <?= htmlspecialchars($username) ?>!</h2>
    <p>Kelola stok obat dan inventory apotek dengan mudah.</p>
    <div class="welcome-date">
        <i class="bi bi-calendar3 me-1"></i>
        <?= date('l, d F Y') ?>
    </div>
    <div class="quick-actions">
        <a href="../../controllers/ObatController.php?action=create" class="quick-action-btn">
            <i class="bi bi-plus-circle"></i> Tambah Obat Baru
        </a>
        <a href="../../controllers/ObatController.php" class="quick-action-btn">
            <i class="bi bi-box-seam"></i> Cek Stok
        </a>
    </div>
</div>

<!-- Statistics Cards -->
<div class="row g-4 mb-4">
    <div class="col-md-6 col-lg-3">
        <div class="stat-card primary">
            <div class="stat-icon">
                <i class="bi bi-capsule"></i>
            </div>
            <div class="stat-value">250</div>
            <div class="stat-label">Total Jenis Obat</div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="stat-card success">
            <div class="stat-icon">
                <i class="bi bi-box-seam-fill"></i>
            </div>
            <div class="stat-value">1,500</div>
            <div class="stat-label">Total Stok</div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="stat-card danger">
            <div class="stat-icon">
                <i class="bi bi-exclamation-triangle-fill"></i>
            </div>
            <div class="stat-value">12</div>
            <div class="stat-label">Stok Menipis</div>
        </div>
    </div>
    <div class="col-md-6 col-lg-3">
        <div class="stat-card warning">
            <div class="stat-icon">
                <i class="bi bi-calendar-x-fill"></i>
            </div>
            <div class="stat-value">5</div>
            <div class="stat-label">Akan Kadaluarsa</div>
        </div>
    </div>
</div>

<!-- Page Header -->
<div class="page-header">
    <h1 class="page-title">Menu Apoteker</h1>
    <p class="page-subtitle">Kelola obat dan inventory apotek</p>
</div>

<!-- Feature Cards -->
<div class="row g-4">
    <div class="col-md-6">
        <div class="feature-card orange">
            <div class="feature-icon">
                <i class="bi bi-capsule"></i>
            </div>
            <h3 class="feature-title">Manajemen Stok Obat</h3>
            <p class="feature-desc">Lihat dan kelola stok obat tersedia. Tambah obat baru, update stok, dan pantau ketersediaan.</p>
            <a href="../../controllers/ObatController.php" class="btn btn-modern btn-modern-primary">
                <i class="bi bi-arrow-right"></i> Kelola Stok Obat
            </a>
        </div>
    </div>

    <div class="col-md-6">
        <div class="feature-card red">
            <div class="feature-icon">
                <i class="bi bi-exclamation-triangle-fill"></i>
            </div>
            <h3 class="feature-title">Peringatan Stok</h3>
            <p class="feature-desc">Pantau obat dengan stok menipis dan yang akan kadaluarsa. Lakukan restock tepat waktu.</p>
            <a href="../../controllers/ObatController.php?filter=low_stock" class="btn btn-modern btn-modern-outline">
                <i class="bi bi-arrow-right"></i> Lihat Peringatan
            </a>
        </div>
    </div>
</div>

<!-- Low Stock Alert -->
<div class="card-modern mt-4">
    <div class="card-header">
        <i class="bi bi-exclamation-circle me-2 text-danger"></i>Obat dengan Stok Menipis
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover mb-0">
                <thead>
                    <tr>
                        <th>Kode Obat</th>
                        <th>Nama Obat</th>
                        <th>Stok Saat Ini</th>
                        <th>Min. Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><code>OBT001</code></td>
                        <td>Paracetamol 500mg</td>
                        <td><span class="badge-modern badge-danger">15</span></td>
                        <td>50</td>
                        <td><a href="#" class="btn btn-sm btn-modern btn-modern-primary">Restock</a></td>
                    </tr>
                    <tr>
                        <td><code>OBT015</code></td>
                        <td>Amoxicillin 500mg</td>
                        <td><span class="badge-modern badge-warning">25</span></td>
                        <td>50</td>
                        <td><a href="#" class="btn btn-sm btn-modern btn-modern-primary">Restock</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>
