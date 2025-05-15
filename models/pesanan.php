<?php
namespace models;

require_once __DIR__ . '/../config/Connection.php';

use config\Connection;
use PDO;

class Pesanan {
    
    // Ambil semua pesanan beserta nama pegawai yg melakukan pesanan
    public static function getWithAnggotaPegawai() {
        $pdo = Connection::make();
        $sql = "
            SELECT 
                pesanan.*,
                anggota.id AS anggota_id,
                pegawai.nama AS nama_pegawai
            FROM pesanan
            JOIN anggota ON pesanan.anggota_id = anggota.id
            JOIN pegawai ON anggota.pegawai_id = pegawai.id
        ";
        $statement = $pdo->query($sql);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    // Ambil detail produk dalam satu pesanan
    public static function getDetailByPesanan($pesananId) {
        $pdo = Connection::make();
        $sql = "
            SELECT 
                detail_pesanan.*,
                produk.nama AS nama_produk,
                produk.harga
            FROM detail_pesanan
            JOIN produk ON detail_pesanan.produk_id = produk.id
            WHERE detail_pesanan.pesanan_id = :pesanan_id
        ";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':pesanan_id', $pesananId);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Kamu juga bisa tambahkan: create, update, delete, dsb.
}
