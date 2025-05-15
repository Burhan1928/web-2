<?php
require_once __DIR__ . '/../models/pesanan.php';
require_once __DIR__ . '/../models/anggota.php';

use models\Pesanan;
use models\Anggota;

$anggotaList = Anggota::get();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'tanggal' => $_POST['tanggal'],
        'diskon' => $_POST['diskon'],
        'status_bayar' => isset($_POST['status_bayar']) ? 1 : 0,
        'anggota_id' => $_POST['anggota_id'],
    ];

    Pesanan::create($data);
    header('Location: list-pesanan.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Tambah Pesanan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="bg-light">
<div class="container mt-4">
    <h1>Tambah Pesanan</h1>
    <form method="POST">
        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input type="date" class="form-control" id="tanggal" name="tanggal" required>
        </div>
        <div class="mb-3">
            <label for="diskon" class="form-label">Diskon (%)</label>
            <input type="number" class="form-control" id="diskon" name="diskon" min="0" value="0" required>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="status_bayar" name="status_bayar" value="1">
            <label for="status_bayar" class="form-check-label">Status Bayar (Lunas)</label>
        </div>
        <div class="mb-3">
            <label for="anggota_id" class="form-label">Pilih Anggota</label>
            <select class="form-select" id="anggota_id" name="anggota_id" required>
                <option value="">-- Pilih Anggota --</option>
                <?php foreach ($anggotaList as $anggota): ?>
                    <option value="<?= $anggota['id'] ?>"><?= htmlspecialchars($anggota['id'] . ' - ' . $anggota['pegawai_nama']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="list-pesanan.php" class="btn btn-secondary">Batal</a>
    </form>
</div>
</body>
</html>
