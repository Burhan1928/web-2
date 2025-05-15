<?php
require_once __DIR__ . '/../../models/Pegawai.php';

use models\Pegawai;

$pegawai = null;

if (isset($_GET['id'])) {
    $pegawai = Pegawai::find($_GET['id']);
}

if (isset($_POST['submit'])) {
    $data = [
        'nip' => $_POST['nip'],
        'nama' => $_POST['nama'],
        'jenis_kelamin' => $_POST['jenis_kelamin'],
        'jabatan' => $_POST['jabatan'],
    ];

    if (!empty($_POST['id'])) {
        // Update jika ada ID
        Pegawai::update($_POST['id'], $data);
    } else {
        // Create data baru
        Pegawai::create($data);
    }

    header("Location: list-pegawai.php");
    exit;
}
?>
