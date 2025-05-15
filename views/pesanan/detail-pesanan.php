<?php
require_once __DIR__ . '/../models/pesanan.php';

use models\Pesanan;

$id = $_GET['id'] ?? null;
if (!$id) {
    header('Location: list-pesanan.php');
    exit;
}

$pesanan = Pesanan::findWithRelations($id);

if (!$pesanan) {
    echo "Data pesanan tidak ditemukan.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Detail Pesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="bg-light">
<div class="container mt-4">
    <h1>Detail Pesanan</h1>
    <table class="table">
        <tr><th>ID</th><td><?= $pesanan['id'] ?></td></tr>
        <tr><th>Tanggal</th><td><?= $pesanan['tanggal'] ?></td></tr>
        <tr><th>Diskon (%)</th><td><?= $pesanan['diskon'] ?></td></tr>
        <tr><th>Status Bayar</th><td><?= $pesanan['status_bayar'] ? 'Lunas' : 'Belum Lunas' ?></td></tr>
        <tr><th>Nama Anggota</th><td><?= htmlspecialchars($pesanan['pegawai_nama']) ?></td></tr>
    </table>
    <a href="list-pesanan.php" class="btn btn-secondary">Kembali</a>
</div>
</body>
</html>
