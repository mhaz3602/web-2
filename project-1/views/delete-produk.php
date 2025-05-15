<?php
require_once __DIR__ . '/../models/produk.php';

use models\produk;

if(!isset($_GET['id'])){

    header("Location: list-produk.php");
    exit;
}

$produk = produk::find($_GET['id']);

if(!$produk){

    header("Location: list-produk.php");
    exit;
}

produk::delete($produk ['id']);
header("Location: list-produk.php");
