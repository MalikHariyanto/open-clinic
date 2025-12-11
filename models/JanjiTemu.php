<?php
// models/JanjiTemu.php

require_once __DIR__ . '/../config/database.php';

class JanjiTemu
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    // Semua janji temu (untuk admin nanti bisa dipakai)
    public function semua()
    {
        $stmt = $this->pdo->query("
            SELECT j.*, p.nama_depan, p.nama_belakang, d.nama_dokter
            FROM janji_temu j
            JOIN pasien p ON j.id_pasien = p.id_pasien
            JOIN dokter d ON j.id_dokter = d.id_dokter
            ORDER BY j.tanggal DESC, j.jam DESC
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Janji temu berdasarkan ID dokter
    public function untukDokter($id_dokter)
    {
        $stmt = $this->pdo->prepare("
            SELECT j.*, p.nama_depan, p.nama_belakang
            FROM janji_temu j
            JOIN pasien p ON j.id_pasien = p.id_pasien
            WHERE j.id_dokter = ?
            ORDER BY j.tanggal DESC, j.jam DESC
        ");
        $stmt->execute([$id_dokter]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Janji temu berdasarkan ID pasien
    public function untukPasien($id_pasien)
    {
        $stmt = $this->pdo->prepare("
            SELECT j.*, d.nama_dokter
            FROM janji_temu j
            JOIN dokter d ON j.id_dokter = d.id_dokter
            WHERE j.id_pasien = ?
            ORDER BY j.tanggal DESC, j.jam DESC
        ");
        $stmt->execute([$id_pasien]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Tambah janji temu
    public function tambah($data)
    {
        $stmt = $this->pdo->prepare("
            INSERT INTO janji_temu (id_pasien, id_dokter, tanggal, jam, keluhan)
            VALUES (?, ?, ?, ?, ?)
        ");
        return $stmt->execute([
            $data['id_pasien'],
            $data['id_dokter'],
            $data['tanggal'],
            $data['jam'],
            $data['keluhan']
        ]);
    }

    // Ubah status janji temu
    public function ubahStatus($id, $status)
    {
        $stmt = $this->pdo->prepare("UPDATE janji_temu SET status = ? WHERE id_janji = ?");
        return $stmt->execute([$status, $id]);
    }

    // Hapus janji temu
    public function hapus($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM janji_temu WHERE id_janji = ?");
        return $stmt->execute([$id]);
    }

    public function cekDuplikatJanji($id_dokter, $tanggal, $jam)
    {
        $stmt = $this->pdo->prepare("
            SELECT COUNT(*) FROM janji_temu
            WHERE id_dokter = ? AND tanggal = ? AND jam = ? AND status IN ('diajukan', 'diterima')
        ");
        $stmt->execute([$id_dokter, $tanggal, $jam]);
        return $stmt->fetchColumn() > 0;
    }

}
