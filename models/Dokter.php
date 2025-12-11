<?php
// models/Dokter.php

require_once __DIR__ . '/../config/database.php';

class Dokter
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function semua()
    {
        $stmt = $this->pdo->query("SELECT * FROM dokter");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function cari($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM dokter WHERE id_dokter = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function tambah($data)
    {
        $stmt = $this->pdo->prepare("
            INSERT INTO dokter (nama_dokter, spesialisasi, kontak)
            VALUES (?, ?, ?)
        ");
        return $stmt->execute([
            $data['nama_dokter'],
            $data['spesialisasi'],
            $data['kontak']
        ]);
    }

    public function ubah($id, $data)
    {
        $stmt = $this->pdo->prepare("
            UPDATE dokter SET 
                nama_dokter = ?, 
                spesialisasi = ?, 
                kontak = ?
            WHERE id_dokter = ?
        ");
        return $stmt->execute([
            $data['nama_dokter'],
            $data['spesialisasi'],
            $data['kontak'],
            $id
        ]);
    }

    public function hapus($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM dokter WHERE id_dokter = ?");
        return $stmt->execute([$id]);
    }
}
