<?php

require_once __DIR__ . '/../config/database.php';

class Asuransi
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function semua()
    {
        $stmt = $this->pdo->query("SELECT * FROM asuransi");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function cari($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM asuransi WHERE id_asuransi = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function tambah($data)
    {
        $stmt = $this->pdo->prepare("
            INSERT INTO asuransi (nomor_asuransi, nama_perusahaan, kategori_tarif, tanggal_mulai, tanggal_akhir)
            VALUES (?, ?, ?, ?, ?)
        ");
        return $stmt->execute([
            $data['nomor_asuransi'],
            $data['nama_perusahaan'],
            $data['kategori_tarif'],
            $data['tanggal_mulai'],
            $data['tanggal_akhir']
        ]);
    }

    public function ubah($id, $data)
    {
        $stmt = $this->pdo->prepare("
            UPDATE asuransi SET 
                nomor_asuransi = ?, 
                nama_perusahaan = ?, 
                kategori_tarif = ?, 
                tanggal_mulai = ?, 
                tanggal_akhir = ?
            WHERE id_asuransi = ?
        ");
        return $stmt->execute([
            $data['nomor_asuransi'],
            $data['nama_perusahaan'],
            $data['kategori_tarif'],
            $data['tanggal_mulai'],
            $data['tanggal_akhir'],
            $id
        ]);
    }

    public function hapus($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM asuransi WHERE id_asuransi = ?");
        return $stmt->execute([$id]);
    }
}
