<?php
require_once __DIR__ . '/../models/pembayaran.php';

use models\pembayaran;

if(!isset($_GET['id'])){

    header("Location: list-pembayaran.php");
    exit;
}

$pembayaran = pembayaran::find($_GET['id']);

if(!$pembayaran){

    header("Location: list-pembayaran.php");
    exit;
}

pembayaran::delete($pembayaran ['id']);
header("Location: list-pembayaran.php");
