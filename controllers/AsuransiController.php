<?php
// controllers/AsuransiController.php

require_once __DIR__ . '/../models/Asuransi.php';
require_once __DIR__ . '/../config/database.php';

$asuransiModel = new Asuransi($pdo);

$action = $_GET['action'] ?? 'index';

switch ($action) {
    case 'index':
        $asuransi = $asuransiModel->semua();
        include '../views/admin/asuransi-list.php';
        break;

    case 'create':
        include '../views/admin/asuransi-form.php';
        break;

    case 'store':
        $asuransiModel->tambah($_POST);
        header('Location: AsuransiController.php');
        break;

    case 'edit':
        $id = $_GET['id'] ?? null;
        $data = $asuransiModel->cari($id);
        include '../views/admin/asuransi-form.php';
        break;

    case 'update':
        $id = $_POST['id_asuransi'];
        $asuransiModel->ubah($id, $_POST);
        header('Location: AsuransiController.php');
        break;

    case 'delete':
        $id = $_GET['id'] ?? null;
        if ($id) {
            $asuransiModel->hapus($id);
        }
        header('Location: AsuransiController.php');
        break;

    default:
        echo "Aksi tidak dikenali.";
        break;
}
