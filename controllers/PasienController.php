<?php

require_once __DIR__ . '/../models/Pasien.php';
require_once __DIR__ . '/../config/database.php';

$pasienModel = new Pasien($pdo);

// Cek aksi (action) dari parameter URL
$action = $_GET['action'] ?? 'index';

switch ($action) {
    case 'index':
        $pasien = $pasienModel->semua();
        include '../views/admin/pasien-list.php';
        break;

    case 'create':
        include '../views/admin/pasien-form.php';
        break;

    case 'store':
        $data = $_POST;
        $pasienModel->tambah($data);
        header('Location: PasienController.php');
        break;

    case 'edit':
        $id = $_GET['id'] ?? null;
        $data = $pasienModel->cari($id);
        include '../views/admin/pasien-form.php';
        break;

    case 'update':
        $id = $_POST['id_pasien'];
        $data = $_POST;
        $pasienModel->ubah($id, $data);
        header('Location: PasienController.php');
        break;

    case 'delete':
        $id = $_GET['id'] ?? null;
        if ($id) {
            $pasienModel->hapus($id);
        }
        header('Location: PasienController.php');
        break;

    default:
        echo "Aksi tidak dikenali.";
        break;
}
