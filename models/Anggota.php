<?php
namespace models;

require_once __DIR__ . '/../config/Connection.php';

use config\Connection;
use PDO;

class Anggota {
    public static function getWithDetails() {
    $pdo = \config\Connection::make();
    $sql = "
        SELECT 
            anggota.id AS anggota_id,
            anggota.status_aktif,

            pegawai.id AS pegawai_id,
            pegawai.nip,
            pegawai.nama AS nama_pegawai,
            pegawai.jenis_kelamin,
            pegawai.jabatan,

            kartu_diskon.id AS kartu_diskon_id,
            kartu_diskon.nama AS nama_diskon,
            kartu_diskon.deskripsi,
            kartu_diskon.persen_diskon

        FROM anggota
        JOIN pegawai ON anggota.pegawai_id = pegawai.id
        LEFT JOIN kartu_diskon ON anggota.kartu_diskon_id = kartu_diskon.id
    ";
    $statement = $pdo->query($sql);
    return $statement->fetchAll(\PDO::FETCH_ASSOC);
}
}