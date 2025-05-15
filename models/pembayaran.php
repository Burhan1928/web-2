<?php
namespace models;

require_once __DIR__ . '/../config/Connection.php';

use config\Connection;
use PDO;

class Pembayaran {
    public static function getWithDetails() {
    $pdo = \config\Connection::make();
    $sql = "
        SELECT 
            pembayaran.*,
            pesanan.tanggal AS tanggal_pesanan,
            anggota.id AS anggota_id,
            pegawai.nama AS nama_pegawai
        FROM pembayaran
        JOIN pesanan ON pembayaran.pesanan_id = pesanan.id
        JOIN anggota ON pesanan.anggota_id = anggota.id
        JOIN pegawai ON anggota.pegawai_id = pegawai.id
    ";
    $statement = $pdo->query($sql);
    return $statement->fetchAll(\PDO::FETCH_ASSOC);
}
}