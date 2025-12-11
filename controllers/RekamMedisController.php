<?php
// controllers/RekamMedisController.php

require_once __DIR__ . '/../models/RekamMedis.php';
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../config/session.php';
 // Dompdf is already imported at the top of the file
require_once __DIR__ . '/../vendor/autoload.php'; // atau sesuaikan path jika manual
use Dompdf\Dompdf;

require_login();

// Validasi akses khusus untuk role dokter
if ($_SESSION['user']['role'] !== 'dokter') {
    die('Akses hanya untuk dokter.');
}

$rekamModel = new RekamMedis($pdo);
$action = $_GET['action'] ?? 'index';

switch ($action) {
    case 'index':
        $rekam = $rekamModel->semua();
        include '../views/dokter/rekam-medis-list.php';
        break;
    
    case 'create':
    $id_janji = $_GET['id_janji'] ?? null;
    if ($id_janji) {
        // ambil info janji (id_pasien, id_dokter)
        $stmt = $pdo->prepare("SELECT * FROM janji_temu WHERE id_janji = ?");
        $stmt->execute([$id_janji]);
        $janji = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($janji) {
            $data = [
                'id_pasien' => $janji['id_pasien'],
                'id_encounter' => 0,
                'id_janji' => $id_janji
            ];
        }
    }
    include '../views/dokter/rekam-medis-form.php';
    break;
    
    case 'store':
        $rekamModel->tambah($_POST);
        header('Location: RekamMedisController.php');
        break;
    
    case 'edit':
        $id = $_GET['id'] ?? null;
        $data = $rekamModel->cari($id);
        include '../views/dokter/rekammedis-form.php';
        break;
    
    case 'update':
        $id = $_POST['id_rekam_medis'];
        $rekamModel->ubah($id, $_POST);
        header('Location: RekamMedisController.php');
        break;
    
    case 'delete':
        $id = $_GET['id'] ?? null;
        if ($id) {
            $rekamModel->hapus($id);
        }
        header('Location: RekamMedisController.php');
        break;


    case 'riwayat':
        if ($_SESSION['user']['role'] === 'pasien') {
            $rekam = $rekamModel->riwayatPasien($_SESSION['user']['id_referensi']);
            include '../views/pasien/riwayat-periksa.php';
        } else {
            echo "Akses ditolak.";
        }
        break;
    
        case 'pdf':
            $id = $_GET['id'] ?? null;
            if (!$id) {
                die("ID tidak valid.");
            }
        
            $data = $rekamModel->cari($id);
        
            // ambil nama dokter
            $stmt = $pdo->prepare("
                SELECT d.nama_dokter
                FROM janji_temu j
                JOIN dokter d ON j.id_dokter = d.id_dokter
                WHERE j.id_janji = ?
            ");
            $stmt->execute([$data['id_janji'] ?? 0]);
            $dokter = $stmt->fetchColumn();
        
            // HTML template PDF
            $html = '
            <h2>OpenClinic - Hasil Pemeriksaan</h2>
            <table border="1" cellpadding="8" cellspacing="0" width="100%">
                <tr><td><strong>Nama Pasien:</strong></td><td>' . htmlspecialchars($data['id_pasien']) . '</td></tr>
                <tr><td><strong>Tanggal Pemeriksaan:</strong></td><td>' . $data['waktu_medis'] . '</td></tr>
                <tr><td><strong>Dokter:</strong></td><td>' . htmlspecialchars($dokter) . '</td></tr>
                <tr><td><strong>Diagnosis:</strong></td><td>' . nl2br(htmlspecialchars($data['diagnosis'])) . '</td></tr>
                <tr><td><strong>Resep Obat:</strong></td><td>' . nl2br(htmlspecialchars($data['resep_obat'])) . '</td></tr>
                <tr><td><strong>Hasil Pemeriksaan:</strong></td><td>' . nl2br(htmlspecialchars($data['hasil_pemeriksaan'])) . '</td></tr>
            </table>
            ';
        
           
        
            $pdf = new Dompdf();
            $pdf->loadHtml($html);
            $pdf->setPaper('A4', 'portrait');
            $pdf->render();
            $pdf->stream('rekam_medis_' . $data['id_rekam_medis'] . '.pdf', ['Attachment' => false]);
            exit;
        
}
