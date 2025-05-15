<?php
require_once __DIR__ . '/../models/anggota.php';
require_once __DIR__ . '/../models/pegawai.php';
require_once __DIR__ . '/../models/kartu_diskon.php';

use models\Anggota;
use models\Pegawai;
use models\KartuDiskon;

$id = $_GET['id'] ?? null;
if (!$id) {
    header('Location: list-anggota.php');
    exit;
}

$anggota = Anggota::find($id);
if (!$anggota) {
    echo "Data anggota tidak ditemukan.";
    exit;
}

$pegawaiList = Pegawai::get();
$kartuDiskonList = KartuDiskon::get();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'status_aktif' => isset($_POST['status_aktif']) ? 1 : 0,
        'pegawai_id' => $_POST['pegawai_id'],
        'kartu_diskon_id' => $_POST['kartu_diskon_id'],
    ];

    Anggota::update($id, $data);
    header('Location: list-anggota.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Edit Anggota</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="bg-light">
<div class="container mt-4">
    <h1>Edit Anggota</h1>
    <form method="POST">
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="status_aktif" name="status_aktif" value="1" <?= $anggota['status_aktif'] ? 'checked' : '' ?>>
            <label for="status_aktif" class="form-check-label">Status Aktif</label>
        </div>
        <div class="mb-3">
            <label for="pegawai_id" class="form-label">Pilih Pegawai</label>
            <select class="form-select" name="pegawai_id" id="pegawai_id" required>
                <option value="">-- Pilih Pegawai --</option>
                <?php foreach ($pegawaiList as $pegawai): ?>
                    <option value="<?= $pegawai['id'] ?>" <?= $pegawai['id'] == $anggota['pegawai_id'] ? 'selected' : '' ?>>
                        <?= htmlspecialchars($pegawai['nama']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="
