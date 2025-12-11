<?php
// controllers/DokterController.php

require_once __DIR__ . '/../models/Dokter.php';
require_once __DIR__ . '/../config/database.php';

$dokterModel = new Dokter($pdo);

$action = $_GET['action'] ?? 'index';

switch ($action) {
    case 'index':
        $dokter = $dokterModel->semua();
        include '../views/admin/dokter-list.php';
        break;

    case 'create':
        include '../views/admin/dokter-form.php';
        break;

    case 'store':
        $dokterModel->tambah($_POST);
        header('Location: DokterController.php');
        break;

    case 'edit':
        $id = $_GET['id'] ?? null;
        $data = $dokterModel->cari($id);
        include '../views/admin/dokter-form.php';
        break;

    case 'update':
        $id = $_POST['id_dokter'];
        $dokterModel->ubah($id, $_POST);
        header('Location: DokterController.php');
        break;

    case 'delete':
        $id = $_GET['id'] ?? null;
        if ($id) {
            $dokterModel->hapus($id);
        }
        header('Location: DokterController.php');
        break;

    default:
        echo "Aksi tidak dikenali.";
        break;
}
