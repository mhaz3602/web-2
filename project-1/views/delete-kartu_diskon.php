<?php
require_once __DIR__ . '/../models/kartu_diskon.php';

use models\kartu_diskon;

if(!isset($_GET['id'])){

    header("Location: list-kartu_diskon.php");
    exit;
}

$kartu_diskon = kartu_diskon::find($_GET['id']);

if(!$kartu_diskon){

    header("Location: list-kartu_diskon.php");
    exit;
}

kartu_diskon::delete($kartu_diskon ['id']);
header("Location: list-kartu_diskon.php");
