<?php
require_once __DIR__ . '/../models/jenis_produk.php';

use models\jenis_produk;

if(!isset($_GET['id'])){

    header("Location: list-jenis_produk.php");
    exit;
}

$jenis_produk = jenis_produk::find($_GET['id']);

if(!$jenis_produk){

    header("Location: list-jenis_produk.php");
    exit;
}

jenis_produk::delete($jenis_produk ['id']);
header("Location: list-jenis_produk.php");
