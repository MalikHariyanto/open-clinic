<?php
// models/RekamMedis.php

require_once __DIR__ . '/../config/database.php';

class RekamMedis
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function semua()
    {
        $stmt = $this->pdo->query("
            SELECT rm.*, p.nama_depan, p.nama_belakang, k.tanggal_mulai
            FROM rekam_medis rm
            JOIN pasien p ON rm.id_pasien = p.id_pasien
            JOIN kunjungan k ON rm.id_encounter = k.id_encounter
            ORDER BY rm.waktu_medis DESC
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function cari($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM rekam_medis WHERE id_rekam_medis = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function tambah($data)
    {
        $stmt = $this->pdo->prepare("
            INSERT INTO rekam_medis (id_pasien, id_encounter, diagnosis, resep_obat, hasil_pemeriksaan, waktu_medis)
            VALUES (?, ?, ?, ?, ?, ?)
        ");
        return $stmt->execute([
            $data['id_pasien'],
            $data['id_encounter'],
            $data['diagnosis'],
            $data['resep_obat'],
            $data['hasil_pemeriksaan'],
            date('Y-m-d H:i:s')
        ]);
    }

    public function ubah($id, $data)
    {
        $stmt = $this->pdo->prepare("
            UPDATE rekam_medis SET
                id_pasien = ?, id_encounter = ?, diagnosis = ?, resep_obat = ?, hasil_pemeriksaan = ?
            WHERE id_rekam_medis = ?
        ");
        return $stmt->execute([
            $data['id_pasien'],
            $data['id_encounter'],
            $data['diagnosis'],
            $data['resep_obat'],
            $data['hasil_pemeriksaan'],
            $id
        ]);
    }

    public function hapus($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM rekam_medis WHERE id_rekam_medis = ?");
        return $stmt->execute([$id]);
    }

    public function riwayatPasien($id_pasien)
    {
        $stmt = $this->pdo->prepare("
            SELECT r.*, d.nama_dokter
            FROM rekam_medis r
            LEFT JOIN janji_temu j ON r.id_janji = j.id_janji
            LEFT JOIN dokter d ON j.id_dokter = d.id_dokter
            WHERE r.id_pasien = ?
            ORDER BY r.waktu_medis DESC
        ");
        $stmt->execute([$id_pasien]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}
