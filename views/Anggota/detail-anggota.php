<?php
require_once __DIR__ . '/../models/anggota.php';
require_once __DIR__ . '/../models/pegawai.php';
require_once __DIR__ . '/../models/kartu_diskon.php';

use models\Anggota;

$id = $_GET['id'] ?? null;
if (!$id) {
    header('Location: list-anggota.php');
    exit;
}

$anggota = Anggota::findWithRelations($id);
if (!$anggota) {
    echo "Data anggota tidak ditemukan.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Detail Anggota</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="bg-light">
<div class="container mt-4">
    <h1>Detail Anggota</h1>
    <table class="table">
        <tr><th>ID</th><td><?= $anggota['id'] ?></td></tr>
        <tr><th>Status Aktif</th><td><?= $anggota['status_aktif'] ? 'Aktif' : 'Tidak Aktif' ?></td></tr>
        <tr><th>Nama Pegawai</th><td><?= htmlspecialchars($anggota['pegawai_nama']) ?></td></tr>
        <tr><th>Kartu Diskon</th><td><?= htmlspecialchars($anggota['kartu_nama']) ?></td></tr>
    </table>
    <a href="list-anggota.php" class="btn btn-secondary">Kembali</a>
</div>
</body>
</html>
