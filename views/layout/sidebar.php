<?php
require_once __DIR__ . '/../../config/session.php';
require_once __DIR__ . '/../../config/config.php';
require_login();
$role = $_SESSION['user']['role'];
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?= BASE_URL ?>">OpenClinic</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>

<div class="bg-light border-end" id="sidebar-wrapper" style="width: 200px; float:left; height: 100vh; padding: 1rem;">
    <div class="list-group list-group-flush">

        <?php if ($role === 'admin'): ?>
            <a href="<?= BASE_URL ?>views/admin/dashboard.php" class="list-group-item list-group-item-action">Dashboard</a>
            <a href="<?= BASE_URL ?>controllers/PasienController.php" class="list-group-item list-group-item-action">Manajemen Pasien</a>
            <a href="<?= BASE_URL ?>controllers/AsuransiController.php" class="list-group-item list-group-item-action">Data Asuransi</a>
            <a href="<?= BASE_URL ?>controllers/DokterController.php" class="list-group-item list-group-item-action">Manajemen Dokter</a>
            <a href="<?= BASE_URL ?>controllers/PembayaranController.php" class="list-group-item list-group-item-action">Pembayaran & Tagihan</a>
            <a href="<?= BASE_URL ?>controllers/JanjiTemuController.php" class="list-group-item list-group-item-action">Jadwal & Janji Temu</a>

        <?php elseif ($role === 'dokter'): ?>
            <a href="<?= BASE_URL ?>views/dokter/dashboard.php" class="list-group-item list-group-item-action">Dashboard</a>
            <a href="<?= BASE_URL ?>controllers/RekamMedisController.php" class="list-group-item list-group-item-action">Kelola Rekam Medis</a>
            <a href="<?= BASE_URL ?>controllers/JanjiTemuController.php" class="list-group-item list-group-item-action">Janji Temu</a>

        <?php elseif ($role === 'apoteker'): ?>
            <a href="<?= BASE_URL ?>views/apoteker/dashboard.php" class="list-group-item list-group-item-action">Dashboard</a>
            <a href="<?= BASE_URL ?>controllers/ObatController.php" class="list-group-item list-group-item-action">Manajemen Stok Obat</a>

        <?php elseif ($role === 'pasien'): ?>
            <a href="<?= BASE_URL ?>views/pasien/dashboard.php" class="list-group-item list-group-item-action">Dashboard</a>
            <a href="<?= BASE_URL ?>controllers/JanjiTemuController.php" class="list-group-item list-group-item-action">Jadwal Janji Temu</a>
            <a href="<?= BASE_URL ?>controllers/RekamMedisController.php" class="list-group-item list-group-item-action">Riwayat Pemeriksaan</a>
            <!-- <a href="<?= BASE_URL ?>controllers/PembayaranController.php" class="list-group-item list-group-item-action">Riwayat Pembayaran</a> -->
        <?php endif; ?>

        <hr>

        <a href="<?= BASE_URL ?>controllers/AuthController.php?action=logout" class="list-group-item list-group-item-action text-danger">Logout</a>
    </div>
</div>

<div style="margin-left: 210px; padding: 1rem;">
