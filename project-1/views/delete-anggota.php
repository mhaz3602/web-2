<?php
require_once __DIR__ . '/../models/anggota.php';
use models\anggota;

if (!isset($_GET['id'])) {
    header("Location: list-anggota.php");
    exit;
}

$anggota = anggota::find($_GET['id']);

if (!$anggota) {
    header("Location: list-anggota.php");
    exit;
}

if (!anggota::delete($anggota['id'])) {
    header("Location: list-anggota.php?error=haspesanan");
    exit;
}

header("Location: list-anggota.php?success=deleted");
