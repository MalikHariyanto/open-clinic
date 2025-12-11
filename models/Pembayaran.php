<?php
// models/Pembayaran.php

require_once __DIR__ . '/../config/database.php';

class Pembayaran
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function semua()
    {
        $stmt = $this->pdo->query("
            SELECT pembayaran.*, tagihan.jumlah_total, tagihan.status, pasien.nama_depan, pasien.nama_belakang
            FROM pembayaran
            JOIN tagihan ON pembayaran.id_invoice = tagihan.id_invoice
            JOIN pasien ON tagihan.id_pasien = pasien.id_pasien
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function cari($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM pembayaran WHERE id_pembayaran = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function tambah($data)
    {
        $stmt = $this->pdo->prepare("
            INSERT INTO pembayaran (id_invoice, metode_pembayaran, jumlah_bayar, tanggal_pembayaran)
            VALUES (?, ?, ?, ?)
        ");
        return $stmt->execute([
            $data['id_invoice'],
            $data['metode_pembayaran'],
            $data['jumlah_bayar'],
            $data['tanggal_pembayaran']
        ]);
    }

    public function ubah($id, $data)
    {
        $stmt = $this->pdo->prepare("
            UPDATE pembayaran
            SET id_invoice = ?, metode_pembayaran = ?, jumlah_bayar = ?, tanggal_pembayaran = ?
            WHERE id_pembayaran = ?
        ");
        return $stmt->execute([
            $data['id_invoice'],
            $data['metode_pembayaran'],
            $data['jumlah_bayar'],
            $data['tanggal_pembayaran'],
            $id
        ]);
    }

    public function hapus($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM pembayaran WHERE id_pembayaran = ?");
        return $stmt->execute([$id]);
    }
}
