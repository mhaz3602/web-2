<?php
require_once __DIR__ . '/../models/anggota.php';
require_once __DIR__ . '/../models/pegawai.php';
require_once __DIR__ . '/../models/kartu_diskon.php';

use models\anggota;
use models\pegawai;
use models\kartu_diskon;

if (isset($_POST['submit'])) {
    $data = [
        'status_aktif' => $_POST['status_aktif'],
        'pegawai_id' => $_POST['pegawai_id'],
        'kartu_diskon_id' => $_POST['kartu_diskon_id'],
    ];

    anggota::create($data);
    header("Location: list-anggota.php");
    exit;
}

$list_pegawai = pegawai::getUnregisteredPegawai();
$list_kartu_diskon = kartu_diskon::get();
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
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="dashboard.php">PROJECT 01</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="#!">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Main Menu</div>
                        <a class="nav-link" href="list-anggota.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-user"></i></div>
                            MANAJEMEN KOPERASI ANGGOTA
                        </a>

                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    M Hudzaifah Ali
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Tambah Anggota</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="list-anggota.php">Anggota</a></li>
                        <li class="breadcrumb-item active">Tambah Anggota</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Tambah Anggota
                        </div>
                        <div class="card-body">
                            <form action="create-anggota.php" method="POST">
                                <div class="mb-3">
                                    <div class="form-label">status aktif
                                        <br>
                                        <label for="aktif" class="form-label">
                                            <input type="radio" name="status_aktif" id="aktif" value="aktif" required>Aktif
                                        </label>
                                        <label for="tidak_aktif" class="form-label">
                                            <input type="radio" name="status_aktif" id="tidak_aktif" value="tidak aktif">Tidak Aktif
                                        </label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <select class="form-select" aria-label="Default select example" name="pegawai_id">
                                        <option selected>-- Pilih Pegawai</option>
                                        <?php foreach ($list_pegawai as $pegawai): ?>
                                            <option value="<?= $pegawai['id'] ?>">
                                                <?= $pegawai['nama'] ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <select class="form-select" aria-label="Default select example" name="kartu_diskon_id">
                                        <option selected>-- Pilih Kartu Diskon</option>
                                        <?php foreach ($list_kartu_diskon as $kartu_diskon): ?>
                                            <option value="<?= $kartu_diskon['id'] ?>">
                                                <?= $kartu_diskon['nama'] ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>


                                <a href="list-anggota.php" class="btn btn-secondary"><i class="fas fa-arrow-left"></i>Back</a>
                                <button type="submit" name="submit" class="btn btn-primary"><i class="fas fa-save"></i>Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
            <!-- Footer-->
            <?php include_once "./patrials/footer.php" ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="../public/js/scripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="../public/js/datatables-simple-demo.js"></script>
</body>

</html>