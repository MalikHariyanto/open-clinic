<?php
// controllers/PembayaranController.php

require_once __DIR__ . '/../models/Pembayaran.php';
require_once __DIR__ . '/../config/database.php';

$pembayaranModel = new Pembayaran($pdo);

$action = $_GET['action'] ?? 'index';

switch ($action) {
    case 'index':
        $pembayaran = $pembayaranModel->semua();
        include '../views/admin/pembayaran-list.php';
        break;

    case 'create':
        include '../views/admin/pembayaran-form.php';
        break;

    case 'store':
        $pembayaranModel->tambah($_POST);
        header('Location: PembayaranController.php');
        break;

    case 'edit':
        $id = $_GET['id'] ?? null;
        $data = $pembayaranModel->cari($id);
        include '../views/admin/pembayaran-form.php';
        break;

    case 'update':
        $id = $_POST['id_pembayaran'];
        $pembayaranModel->ubah($id, $_POST);
        header('Location: PembayaranController.php');
        break;

    case 'delete':
        $id = $_GET['id'] ?? null;
        if ($id) {
            $pembayaranModel->hapus($id);
        }
        header('Location: PembayaranController.php');
        break;

    default:
        echo "Aksi tidak dikenali.";
        break;
}
