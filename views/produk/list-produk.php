<?php
require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../models/Produk.php';

use models\Produk;

$produkList = Produk::getAll();


