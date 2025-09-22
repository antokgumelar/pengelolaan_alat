<?php
    require 'session_check.php'
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Katalog Alat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

      
    <!-- Bootstrap JS (Optional if you need dropdowns or other features) -->
    <style>

        h5 a {
            font-weight: bold;
            color: inherit; /* Warna mengikuti elemen induk */
            text-decoration: none; /* Hilangkan garis bawah */
        }


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

        .header{
            background-color: white;
            padding: 10px;
            height: 17%;
            width: 100%;
        }

        .content {
            width: 100%;
            max-width: 1200px;
            margin-top: 80px;
            flex: 1;
        }

        h1{
            font-weight: bold;
            color: white;
            text-align: center;
        }

        .input-group{
            display: flex;
            align-items: center;
            justify-content: end;
            flex-wrap: nowrap;
            margin-top: 20px;
            gap: 10px;
        }

        .table-container {
            padding-top: 50px;
            display: flex;
            flex-wrap: wrap;
            flex-direction: column;
        }

        table {
            width: auto;
            border-collapse: collapse;
            background-color: white;
            overflow-x: auto;
            overflow-y: auto;
        }

        th, td {
            border: 1px solid #dddddd;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: rgb(18, 75, 135);
            color: white;
            font-size: 13px;
        }

        td{
            font-weight: bold;
        }

        img {
            width: 120px;
            height: 100px;
            border: 3px solid white;
        }

        th:nth-child(1),
        td:nth-child(1){
            min-width: 50px;
            max-width: 180px;
            overflow-wrap: break-word;
            white-space: normal;
        }
        
        th:nth-child(2),
        td:nth-child(2){
            min-width: 110px;
            max-width: 180px;
            overflow-wrap: break-word;
            white-space: normal;
        }

        th:nth-child(3),
        td:nth-child(3){
            min-width: 150px;
            max-width: 180px;
            overflow-wrap: break-word;
            white-space: normal;
        }

        th:nth-child(4),
        td:nth-child(4){
            min-width: 150px;
            max-width: 180px;
            overflow-wrap: break-word;
            white-space: normal;
        }

        th:nth-child(5),
        td:nth-child(5){
            min-width: 80px;
            max-width: 180px;
            overflow-wrap: break-word;
            white-space: normal;
        }

        th:nth-child(6),
        td:nth-child(6){
            min-width: 80px;
            max-width: 180px;
            overflow-wrap: break-word;
            white-space: normal;
        }

        th:nth-child(7),
        td:nth-child(7){
            min-width: 80px;
            max-width: 180px;
            overflow-wrap: break-word;
            white-space: normal;
        }

        th:nth-child(8),
        td:nth-child(8){
            min-width: 180px;
            max-width: 250px;
            overflow-wrap: break-word;
            white-space: normal;
        }

        th:nth-child(9),
        td:nth-child(9){
            min-width: 150px;
            max-width: 180px;
            overflow-wrap: break-word;
            white-space: normal;
        }










        footer {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            text-align: center;
            font-weight: bold;
            background-color: rgb(238, 240, 243);
            padding: 20px;
            width: 100%;
            margin-top: 20px;
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

        <!-- Textarea dan Tombol Search -->
        <div class="content">
        <div class="container">
            <h1>Daftar Katalog Alat</h1>
            <div class="input-group">
                <form action="cari_katalog.php" method="get" class="form-container d-flex">
                    <input type="text" class="form-control" name="search" placeholder="Masukkan kata kunci pencarian" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
                    <div class="input-group-append d-flex">
                        <button class="btn btn-outline-primary" type="submit">
                            <i class="bi bi-search"></i>
                        </button>
                        <button class="btn btn-outline-primary" type="button" onclick="window.location.href='addcata.php'">
                        <i class="bi bi-plus"></i>
                        </button>
                    </div>
                </form>
            </div>        
        </div>
        <div class="container">
            <div class="table-container">
                <?php
                    // Koneksi ke database
                    $conn = new mysqli('localhost', 'root', '', 'gudang_alat');

                    // Cek koneksi
                    if ($conn->connect_error) {
                        die("Koneksi gagal: " . $conn->connect_error);
                    }

                    // Ambil kata kunci pencarian dari URL
                    $searchTerm = isset($_GET['search']) ? $_GET['search'] : '';

                    // Query untuk mengambil data berdasarkan pencarian
                    $sql = "SELECT * FROM katalog_alat WHERE nama_alat LIKE ? OR jenis_alat LIKE ? OR posisi_alat LIKE ? OR kode_alat LIKE ?";
                    $stmt = $conn->prepare($sql);
                    $searchTermLike = "%" . $searchTerm . "%";
                    $stmt->bind_param("ssss", $searchTermLike, $searchTermLike, $searchTermLike, $searchTermLike);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows > 0) {
                        echo "<table border='1'>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Alat</th>
                                    <th>Nama Alat</th>
                                    <th>Jenis Alat</th>
                                    <th>Stok Tetap</th>
                                    <th>Stok Tersedia</th>
                                    <th>Posisi Alat</th>
                                    <th>Gambar Alat</th>
                                    <th>Aksi</th>
                                </tr>";
                        $no = 1;

                        while ($row = $result->fetch_assoc()) {
                            // Path gambar
                            $gambar_alat = "rentora/uploads/" . $row['gambar_alat'];

                            // Validasi keberadaan gambar
                            if (empty($row['gambar_alat']) || !file_exists($gambar_alat)) {
                                $gambar_alat = "rentora/uploads/default.jpg"; // Path default gambar
                            }

                            // URL gambar untuk dibuka di halaman baru
                            $gambar_url = $gambar_alat;

                            echo "<tr class='data-row'>
                                    <td>" . $no++ . "</td>
                                    <td>" . $row['kode_alat'] . "</td>
                                    <td>" . $row['nama_alat'] . "</td>
                                    <td>" . $row['jenis_alat'] . "</td>
                                    <td>" . $row['stok_tetap'] . "</td>
                                    <td>" . $row['jumlah_stok'] . "</td>
                                    <td>" . $row['posisi_alat'] . "</td>
                                    <td>
                                        <img src='" . $gambar_url . "' alt='Gambar Alat'>
                                    </td>
                                    <td>
                                        <a onclick=window.location.href='hapus_katalog.php?kode_alat=" . $row['kode_alat'] . "'>
                                            <button class='btn btn-danger btn-sm me-1' onclick='return confirm(\"Yakin ingin menghapus data ini?\")'>
                                                <i class='bi bi-trash3-fill'></i>
                                            </button>
                                        </a>
                                        <a onclick=window.location.href='edit_catalog.php?kode_alat=". $row['kode_alat']. "'>
                                            <button class='btn btn-primary btn-sm'>
                                                <i class='bi bi-sliders2'></i>
                                            </button>
                                        </a>
                                        <a href='form_pinjam.php?kode_alat=". $row['kode_alat']. "'>
                                            <button class='btn btn-secondary btn-sm'>
                                                <i class='bi bi-hand-index-thumb-fill'></i>
                                            </button>
                                        </a>
                                    </td>
                                </tr>";
                        }
                        echo "</table>";
                    } else {
                        echo "Tidak ada data.";
                    }

                    $stmt->close();
                    $conn->close();
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
