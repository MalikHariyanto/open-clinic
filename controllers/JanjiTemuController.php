<?php
// controllers/JanjiTemuController.php

require_once __DIR__ . '/../models/JanjiTemu.php';
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../config/session.php';

require_login();

$role = $_SESSION['user']['role'];
$id_user = $_SESSION['user']['id_referensi'];

$janjiModel = new JanjiTemu($pdo);
$action = $_GET['action'] ?? 'index';

switch ($action) {
    case 'index':
        if ($role === 'pasien') {
            $janji = $janjiModel->untukPasien($id_user);
            include '../views/pasien/janji-temu.php';

        } elseif ($role === 'dokter') {
            $janji = $janjiModel->untukDokter($id_user);
            include '../views/dokter/janji-temu.php';

        } else {
            echo "Akses ditolak.";
        }
        break;

    case 'store':
        if ($role === 'pasien') {
            $data = [
                'id_pasien' => $id_user,
                'id_dokter' => $_POST['id_dokter'],
                'tanggal' => $_POST['tanggal'],
                'jam' => $_POST['jam'],
                'keluhan' => $_POST['keluhan']
            ];
            // Validasi bentrok
            if ($janjiModel->cekDuplikatJanji($data['id_dokter'], $data['tanggal'], $data['jam'])) {
                header("Location: JanjiTemuController.php?error=Jadwal dokter sudah penuh pada waktu tersebut");
                exit;
            }
            $janjiModel->tambah($data);

        }
        header("Location: JanjiTemuController.php");
        break;

    case 'ubah-status':
        if ($role === 'dokter') {
            $id = $_GET['id'];
            $status = $_GET['status']; // diterima / ditolak
            $janjiModel->ubahStatus($id, $status);
        }
        header("Location: JanjiTemuController.php");
        break;

    case 'delete':
        $id = $_GET['id'] ?? null;
        if ($id && ($role === 'pasien' || $role === 'dokter')) {
            $janjiModel->hapus($id);
        }
        header("Location: JanjiTemuController.php");
        break;

    default:
        echo "Aksi tidak dikenali.";
        break;
}
