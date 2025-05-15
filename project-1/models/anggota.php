<?php

namespace models;

require_once __DIR__ . '/../config/Connection.php';

use config\Connection;
use PDO;

class anggota
{
    public static function get()
    {
        $pdo = Connection::make();
        $sql = 'SELECT * FROM anggota';
        $query = $pdo->query($sql);
        return $query->fetchALL(PDO::FETCH_ASSOC);
    }

    public static function create($data)
    {
        $pdo = Connection::make();
        $sql = 'INSERT INTO anggota (status_aktif, pegawai_id, kartu_diskon_id) VALUES (:status_aktif, :pegawai_id, :kartu_diskon_id)';
        $statement = $pdo->prepare($sql);
        $statement->bindParam(':status_aktif', $data['status_aktif']);
        $statement->bindParam(':pegawai_id', $data['pegawai_id']);
        $statement->bindParam(':kartu_diskon_id', $data['kartu_diskon_id']);

        return $statement->execute();
    }

    public static function update($data)
    {
        $pdo = Connection::make();
        $sql = 'UPDATE pesanan SET id=:id, tanggal=:tanggal, diskon=:diskon, status_bayar=:status_bayar, anggota_id=:anggota_id WHERE id =:id';
        $statement = $pdo->prepare($sql);
        $statement->bindParam(':id', $data['id']);
        $statement->bindParam(':tanggal', $data['tanggal']);
        $statement->bindParam(':diskon', $data['diskon']);
        $statement->bindParam(':status_bayar', $data['status_bayar']);
        $statement->bindParam(':anggota_id', $data['anggota_id']);

        return $statement->execute();
    }

    public static function find($id)
    {
        $pdo = Connection::make();
        $sql = 'SELECT * FROM anggota WHERE id = :id';
        $statement = $pdo->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->execute();

        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public static function delete($id)
{
    $pdo = Connection::make();

    // Cek apakah masih ada pesanan
    $sql = 'SELECT COUNT(*) FROM pesanan WHERE anggota_id = :id';
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $count = $stmt->fetchColumn();

    if ($count > 0) {
        return false; // Masih punya pesanan, tidak bisa hapus
    }

    $sql = 'DELETE FROM anggota WHERE id = :id';
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);

    return $stmt->execute();

    
}
}
