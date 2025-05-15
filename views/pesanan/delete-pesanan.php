<?php
require_once __DIR__ . '/../models/pesanan.php';

use models\Pesanan;

$id = $_GET['id'] ?? null;

if ($id) {
    Pesanan::delete($id);
}

header('Location: list-pesanan.php');
exit;
