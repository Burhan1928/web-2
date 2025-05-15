<?php
require_once __DIR__ . '/../models/anggota.php';
require_once __DIR__ . '/../models/pegawai.php';
require_once __DIR__ . '/../models/kartu_diskon.php';

use models\Anggota;
use models\Pegawai;
use models\KartuDiskon;

$anggotaList = Anggota::getWithRelations(); // misal ambil join pegawai dan kartu_diskon

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>List Anggota</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="bg-light">
<div class="container mt-4">
    <h1>List Anggota</h1>
    <a href="create-anggota.php" class="btn btn-success mb-3">Tambah Anggota</a>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Status Aktif</th>
                <th>Nama Pegawai</th>
                <th>Kartu Diskon</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($anggotaList as $a): ?>
            <tr>
                <td><?= $a['id'] ?></td>
                <td><?= $a['status_aktif'] ? 'Aktif' : 'Tidak Aktif' ?></td>
                <td><?= htmlspecialchars($a['pegawai_nama']) ?></td>
                <td><?= htmlspecialchars($a['kartu_nama']) ?></td>
                <td>
                    <a href="detail-anggota.php?id=<?= $a['id'] ?>" class="btn btn-info btn-sm">Detail</a>
                    <a href="edit-anggota.php?id=<?= $a['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="delete-anggota.php?id=<?= $a['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus anggota ini?')">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>
