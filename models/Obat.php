<?php
// models/Obat.php

require_once __DIR__ . '/../config/database.php';

class Obat
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function semua()
    {
        $stmt = $this->pdo->query("SELECT * FROM obat");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function cari($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM obat WHERE id_obat = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function tambah($data)
    {
        $stmt = $this->pdo->prepare("
            INSERT INTO obat (nama_obat, kategori, stok, harga)
            VALUES (?, ?, ?, ?)
        ");
        return $stmt->execute([
            $data['nama_obat'],
            $data['kategori'],
            $data['stok'],
            $data['harga']
        ]);
    }

    public function ubah($id, $data)
    {
        $stmt = $this->pdo->prepare("
            UPDATE obat SET
                nama_obat = ?, kategori = ?, stok = ?, harga = ?
            WHERE id_obat = ?
        ");
        return $stmt->execute([
            $data['nama_obat'],
            $data['kategori'],
            $data['stok'],
            $data['harga'],
            $id
        ]);
    }

    public function hapus($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM obat WHERE id_obat = ?");
        return $stmt->execute([$id]);
    }
}
