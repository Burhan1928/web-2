<?php
require_once __DIR__ . '/../models/pesanan.php';

use models\Pesanan;

$pesananList = Pesanan::getWithRelations(); // ambil join anggota dan pegawai

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>List Pesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="bg-light">
<div class="container mt-4">
    <h1>List Pesanan</h1>
    <a href="create-pesanan.php" class="btn btn-success mb-3">Tambah Pesanan</a>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tanggal</th>
                <th>Diskon (%)</th>
                <th>Status Bayar</th>
                <th>Nama Anggota</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pesananList as $p): ?>
            <tr>
                <td><?= $p['id'] ?></td>
                <td><?= $p['tanggal'] ?></td>
                <td><?= $p['diskon'] ?></td>
                <td><?= $p['status_bayar'] ? 'Lunas' : 'Belum Lunas' ?></td>
                <td><?= htmlspecialchars($p['pegawai_nama']) ?></td>
                <td>
                    <a href="detail-pesanan.php?id=<?= $p['id'] ?>" class="btn btn-info btn-sm">Detail</a>
                    <a href="edit-pesanan.php?id=<?= $p['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="delete-pesanan.php?id=<?= $p['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus pesanan ini?')">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php if(empty($pesananList)) : ?>
            <tr>
                <td colspan="6" class="text-center">Data pesanan kosong</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
</body>
</html>
