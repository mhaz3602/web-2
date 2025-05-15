<?php
require_once __DIR__ . '/../models/pegawai.php';

use models\pegawai;

if(!isset($_GET['id'])){

    header("Location: list-pegawai.php");
    exit;
}

$pegawai = pegawai::find($_GET['id']);

if(!$pegawai){

    header("Location: list-pegawai.php");
    exit;
}

pegawai::delete($pegawai ['id']);
header("Location: list-pegawai.php");
