<?php
require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../models/Produk.php';

use models\Produk;

$id = $_GET['id'];
$produk = Produk::find($id);
