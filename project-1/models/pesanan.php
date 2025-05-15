<?php

namespace models;

require_once __DIR__ . '/../config/Connection.php';

use config\Connection;
use PDO;



class pesanan
{
    public static function get()
    {
        $pdo = Connection::make();
        $sql = 'SELECT * FROM pesanan';
        $query = $pdo->query($sql);
        return $query->fetchALL(PDO::FETCH_ASSOC);
    }

    public static function create($data)
    {
        $pdo = Connection::make();

        $sql = 'INSERT INTO pesanan (tanggal, diskon, status_bayar, anggota_id) 
            VALUES (:tanggal, :diskon, :status_bayar, :anggota_id)';

        $statement = $pdo->prepare($sql); // ✅ Inisialisasi statement dulu

        $statement->bindParam(':tanggal', $data['tanggal']);
        $statement->bindParam(':diskon', $data['diskon']);
        $statement->bindParam(':status_bayar', $data['status_bayar']);
        $statement->bindParam(':anggota_id', $data['anggota_id']);

        return $statement->execute();
    }


    public static function find($id)
    {
        $pdo = Connection::make();
        $sql = 'SELECT * FROM pesanan WHERE id = :id';
        $statement = $pdo->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->execute();

        return $statement->fetch(PDO::FETCH_ASSOC);
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

      public static function delete($id)
     {
        $pdo = Connection::make();
        $sql = 'DELETE FROM pegawai WHERE id = :id';
        $statement = $pdo->prepare($sql);
        $statement->bindParam(':id', $id);

        return $statement->execute();
    }
     public static function getUnregisteredPembayaran()
    {
        $pdo = Connection::make();
        $sql = 'SELECT p.*
FROM pesanan p
LEFT JOIN pembayaran a ON p.id = a.pesanan_id
WHERE a.pesanan_id IS NULL;
';
        $query = $pdo->query($sql);
        return $query->fetchALL(PDO::FETCH_ASSOC);
    }
}
