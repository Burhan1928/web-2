<?php
require_once __DIR__ . '/../models/produk.php';
require_once __DIR__ . '/../models/jenis_produk.php';

require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../models/Produk.php';
require_once __DIR__ . '/../models/JenisProduk.php';

use models\Produk;
use models\JenisProduk;

$jenisProdukList = JenisProduk::get();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'kode' => $_POST['kode'],
        'nama' => $_POST['nama'],
        'deskripsi' => $_POST['deskripsi'],
        'harga' => $_POST['harga'],
        'stok' => $_POST['stok'],
        'jenis_produk_id' => $_POST['jenis_produk_id'],
    ];
    Produk::create($data);
    header("Location: list-produk.php");
    exit;
}
