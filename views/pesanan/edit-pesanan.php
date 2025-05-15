<?php
require_once __DIR__ . '/../models/pesanan.php';
require_once __DIR__ . '/../models/anggota.php';

use models\Pesanan;
use models\Anggota;

$id = $_GET['id'] ?? null;
if (!$id) {
    header('Location: list-pesanan.php');
    exit;
}

$pesanan = Pesanan::find($id);
if (!$pesanan) {
    echo "Data pesanan tidak ditemukan.";
    exit;
}

$anggotaList = Anggota::get();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'tanggal' => $_POST['tanggal'],
        'diskon' => $_POST['diskon'],
        'status_bayar' => isset($_POST['status_bayar']) ? 1 : 0,
        'anggota_id' => $_POST['anggota_id'],
    ];

    Pesanan::update($id, $data);
    header('Location: list-pesanan.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Edit Pesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="bg-light">
<div class="container mt-4">
    <h1>Edit Pesanan</h1>
    <form method="POST">
        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?= $pesanan['tanggal'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="diskon" class="form-label">Diskon (%)</label>
            <input type="number" class="form-control" id="diskon" name="diskon" min="0" value="<?= $pesanan['diskon'] ?>" required>
        </div>
        <div class="mb-3 form-check
