<?php
require_once __DIR__ . '/../models/jenis_produk.php';

use models\jenis_produk;

$jenis_produk = jenis_produk::get();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>PROJECT 01</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="../public/css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <?php include_once './patrials/navbar.php' ?>
    <div id="layoutSidenav">
        <?php include_once './patrials/sidebar.php' ?>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Jenis Produk</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Jenis Produk</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            List Jenis Produk
                        </div>
                        <div class="card-body">
                            <div class="mb-3 text-end">
                                <a href="create-jenis_produk.php" class="btn btn-success">
                                    <i class="fas fa-plus"></i>Tambah Jenis Produk
                                </a>
                            </div>
                            <table id="datatablesSimple" class="table">
                                <thead>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>deskripsi</th>
                                    
                                </thead>
                                <tbody>
                                    <?php foreach ($jenis_produk as $index => $item): ?>
                                        <tr>
                                            <td><?= $index + 1; ?></td>
                                            <td><?= $item['nama'] ?></td>
                                            <td><?= $item['deskripsi'] ?></td>
                                            
                                            <td>
                                                <a href="detail-jenis_produk.php?id=<?= $item['id'] ?>" class="btn btn-primary">
                                                    <i class="fas fa-eye"></i>Detail
                                                </a>

                                                <a href="edit-jenis_produk.php?id=<?= $item['id'] ?>" class="btn btn-warning">
                                                    <i class="fas fa-edit"></i>Edit
                                                </a>

                                                <a href="delete-jenis_produk.php?id=<?= $item['id'] ?>" class="btn btn-danger">
                                                    <i class="fas fa-trash"></i>Delete
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
            <?php include_once './patrials/footer.php'; ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../public/js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="../public/js/datatables-simple-demo.js"></script>
</body>

</html>

nama VARCHAR(45),
    deskripsi TEXT