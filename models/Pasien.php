<?php
// models/Pasien.php

require_once __DIR__ . '/../config/database.php';

class Pasien
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function semua()
    {
        $stmt = $this->pdo->query("SELECT * FROM pasien");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function cari($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM pasien WHERE id_pasien = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function tambah($data)
    {
        $stmt = $this->pdo->prepare("
            INSERT INTO pasien (id_asuransi, nama_depan, nama_belakang, tanggal_lahir, jenis_kelamin, alamat, nomor_telepon, email)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)
        ");
        return $stmt->execute([
            $data['id_asuransi'],
            $data['nama_depan'],
            $data['nama_belakang'],
            $data['tanggal_lahir'],
            $data['jenis_kelamin'],
            $data['alamat'],
            $data['nomor_telepon'],
            $data['email']
        ]);
    }

    public function ubah($id, $data)
    {
        $stmt = $this->pdo->prepare("
            UPDATE pasien
            SET id_asuransi = ?, nama_depan = ?, nama_belakang = ?, tanggal_lahir = ?, jenis_kelamin = ?, alamat = ?, nomor_telepon = ?, email = ?
            WHERE id_pasien = ?
        ");
        return $stmt->execute([
            $data['id_asuransi'],
            $data['nama_depan'],
            $data['nama_belakang'],
            $data['tanggal_lahir'],
            $data['jenis_kelamin'],
            $data['alamat'],
            $data['nomor_telepon'],
            $data['email'],
            $id
        ]);
    }

    public function hapus($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM pasien WHERE id_pasien = ?");
        return $stmt->execute([$id]);
    }
}
