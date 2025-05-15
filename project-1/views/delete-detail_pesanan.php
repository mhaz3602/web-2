<?php
require_once __DIR__ . '/../models/detail_pesanan.php';

use models\detail_pesanan;

if(!isset($_GET['id'])){

    header("Location: list-detail_pesanan.php");
    exit;
}

$detail_pesanan = detail_pesanan::find($_GET['id']);

if(!$detail_pesanan){

    header("Location: list-detail_pesanan.php");
    exit;
}

detail_pesanan::delete($detail_pesanan ['id']);
header("Location: list-detail_pesanan.php");
