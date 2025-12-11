<?php
// controllers/ObatController.php

require_once __DIR__ . '/../models/Obat.php';
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../config/session.php';

require_login();

if ($_SESSION['user']['role'] !== 'apoteker') {
    die('Akses hanya untuk apoteker.');
}

$obatModel = new Obat($pdo);

$action = $_GET['action'] ?? 'index';

switch ($action) {
    case 'index':
        $obat = $obatModel->semua();
        include '../views/apoteker/obat-list.php';
        break;

    case 'create':
        include '../views/apoteker/obat-form.php';
        break;

    case 'store':
        $obatModel->tambah($_POST);
        header('Location: ObatController.php');
        break;

    case 'edit':
        $id = $_GET['id'] ?? null;
        $data = $obatModel->cari($id);
        include '../views/apoteker/obat-form.php';
        break;

    case 'update':
        $id = $_POST['id_obat'];
        $obatModel->ubah($id, $_POST);
        header('Location: ObatController.php');
        break;

    case 'delete':
        $id = $_GET['id'] ?? null;
        if ($id) {
            $obatModel->hapus($id);
        }
        header('Location: ObatController.php');
        break;

    default:
        echo "Aksi tidak dikenali.";
        break;
}
