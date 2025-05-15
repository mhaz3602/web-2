<?php
require_once __DIR__ . '/../models/pesanan.php';

use models\pesanan;

if(!isset($_GET['id'])){

    header("Location: list-pesanan.php");
    exit;
}

$pesanan = pesanan::find($_GET['id']);

if(!$pesanan){

    header("Location: list-pesanan.php");
    exit;
}

pesanan::delete($pesanan ['id']);
header("Location: list-pesanan.php");
