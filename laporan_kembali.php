<?php
    require 'session_check.php'
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html,body {
            font-family: Arial, sans-serif;
            background: #C1D4F5;
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100%;
            width: 100%;
        }

        .content {
            width: 100%;
            max-width: 1200px;
            margin-top: 70px;
            flex: 1;
        }

        .sidebar {
            width: 200px;
            background-color: #007bff;
            padding: 20px;
            color: white;
            position: relative;
        }

        h3 {
            margin: 0; /* Menghilangkan margin default */
            font-weight: bold;
        }

        h1 {
            position: absolute;
            top: 25%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            font-weight: bold;
        }

        h5 a {
            font-weight: bold;
            color: inherit; /* Warna mengikuti elemen induk */
            text-decoration: none; /* Hilangkan garis bawah */
        }

        .table-container{
            width: 100%; /* Sesuaikan dengan lebar tabel */
            padding-bottom: 50px; /* Jarak di bawah tabel */
        }

        .table-container {
            padding-top: 180px;
            display: flex;
            flex-wrap: wrap;
            flex-direction: column;
            overflow-x: auto;
            overflow-y: auto;
        }

        table {
            width: auto;
            border-collapse: collapse;
            background-color: white;
            
        }

        th, td {
            border: 1px solid #dddddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: rgb(18, 75, 135);
            color: white;
            font-size: 13px;
        }

        td{
            text-align: left;
            font-weight: bold;
        }

        img {
            width: 80px;
            height: 100px;
            border: 3px solid white;
        }
        
        .aksi{
            display: flex;
            position: relative;
            top: 160px;
            gap: 10px;
        }

        footer {
            text-align: center;
            background-color:rgb(238, 240, 243);
            color: black;
            font-weight: bold;
            padding: 10px 0;
            width: 100%;
            bottom:0;
        }


    </style>
</head>
<body>
    <nav class="navbar bg-body-tertiary fixed-top">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand">Welcome</a>
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5>
                        <a href="home.php"> Dashboard </a>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link" href="cari_katalog.php">
                                <i class="bi bi-archive"></i> Katalog
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-arrow-down-up"></i>Transaksi
                        </a>
                        <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="cari_pinjam.php">Peminjaman</a></li>
                            <li><a class="dropdown-item" href="cari_kembali.php">Pengembalian</a></li>
                        </ul>
                        </li>
                        <li class="nav-item">
                            <a class="dropdown-item" href="cari_pegawai.php">
                                <i class="bi bi-people"></i> Pegawai
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="laporan.php">
                                <i class="bi bi-journal-album"></i> Laporan
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">
                                <i class="bi bi-box-arrow-left"></i> Keluar
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

<div class="content">
    <h1>Laporan Pengembalian Alat</h1>
        <div class="container">
            <div class="aksi">
                <button type="button" class="btn btn-outline-primary">
                    <a href="report_kembali.php">
                        <i class="bi bi-printer-fill"></i>
                    </a>
                </button>
                <button class="btn btn-outline-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Lihat Laporan
                </button>
                <ul class="dropdown-menu">
                    <a class= id="dropdown-report">
                        <li><a class="dropdown-item" href="laporan.php">Laporan Peminjaman Alat</a></li>
                        <li><a class="dropdown-item" href="laporan_kembali.php">Laporan Pengembalian Alat</a></li>
                    </a>
                </ul>

                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#filterDateModal">
                    Filter Tanggal
                </button>

                <!-- Modal -->
                <div class="modal fade" id="filterDateModal" tabindex="-1" aria-labelledby="filterDateModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="filterDateModalLabel">Filter Berdasarkan Tanggal</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="filterForm" method="GET" action="report_kembali.php">
                            <div class="mb-3">
                                <label for="startDate" class="form-label">Tanggal Mulai</label>
                                <input type="date" class="form-control" id="startDate" name="startDate" required>
                            </div>
                            <div class="mb-3">
                                <label for="endDate" class="form-label">Tanggal Akhir</label>
                                <input type="date" class="form-control" id="endDate" name="endDate" required>
                            </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary" form="filterForm">Terapkan Filter</button>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <div class="container">
        <div class="table-container">
            <?php
                error_reporting(E_ALL);
                ini_set('display_errors', 1);

                $databaseHost = 'localhost';
                $databaseName = 'gudang_alat';
                $databaseUsername = 'root';
                $databasePassword = '';

                try {
                    $pdo = new PDO("mysql:host=$databaseHost;dbname=$databaseName; charset=utf8", $databaseUsername, $databasePassword);
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                } catch (PDOException $e) {
                    die("Koneksi gagal: " . $e->getMessage());
                }

                $tanggal_awal = $_GET['startDate'] ?? '';
                $tanggal_akhir = $_GET['endDate'] ?? '';

                if (!empty($tanggal_awal) && !empty($tanggal_akhir)) {
                    $stmt = $pdo->prepare('SELECT * FROM kembali_alat 
                                            WHERE tanggal_kembali BETWEEN :tanggal_awal AND :tanggal_akhir
                                            ORDER BY tanggal_kembali DESC');

                    $stmt->execute([
                        'tanggal_awal' => $tanggal_awal,
                        'tanggal_akhir' => $tanggal_akhir
                    ]);

                    $laporan = $stmt->fetchAll(PDO::FETCH_ASSOC);
                } else {
                    $stmt = $pdo->query('SELECT * FROM kembali_alat
                                        ORDER BY tanggal_kembali DESC');
                    $laporan = $stmt->fetchAll(PDO::FETCH_ASSOC);
                }

                if(!empty ($laporan)) {
                    // Menambahkan header tabel
                    echo "<table border='1'>
                            <tr>
                                <th>No</th>
                                <th>ID Kembali</th>
                                <th>Tanggal Kembali</th>
                                <th>ID Pinjam</th>
                                <th>Tanggal Pinjam</th>
                                <th>NIK Pegawai</th>
                                <th>Nama Pegawai</th>
                                <th>Kode Alat</th>
                                <th>Nama Alat</th>
                                <th>Qty</th>
                                <th>Kondisi Alat</th>
                                <th>Keterangan</th>
                            </tr>";

                    $no = 1;
                    foreach($laporan as $row) {
                        echo "<tr>
                            <td>" . $no++ . " </td>
                            <td>" . $row['id_kembali'] . "</td>
                            <td>" . $row['tanggal_kembali'] . "</td>
                            <td>" . $row['id_pinjam'] . "</td>
                            <td>" . $row['tanggal_pinjam'] . "</td>
                            <td>" . $row['nik_pegawai'] . "</td>
                            <td>" . $row['nama_pegawai'] . "</td>
                            <td>" . $row['kode_alat'] . "</td>
                            <td>" . $row['nama_alat'] . "</td>
                            <td>" . $row['qty'] . "</td>
                            <td>" . $row['kondisi_alat'] . "</td>
                            <td>" . $row['keterangan'] . "</td>
                            </tr>";
                    } 
                    echo "</table>"; // Menutup tabel
                } else {
                    echo "<tr><td colspan='9'>Tidak ada data.</td></tr>";
                }
            ?>
        </div>
    </div>
</div>

    <footer>
        <p></p>
        &copy; 2025 DEPARTEMEN PRODUKSI
        <p></p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>