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
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            height: 100vh;
            background: #C1D4F5;
            justify-content: center;
            align-items: flex-start; /
        }

        .prisma {
            position: absolute;
            top: 30%;
            left: 30%;
            width: 300px;
            height: 300px;
            background: rgba(255, 255, 255, 0.1);
            clip-path: polygon(50% 0%, 100% 100%, 0% 100%);
            filter: blur(30px);
            z-index: 1;
            animation: rotate 10s infinite linear;
        }

        @keyframes rotate {
            from {
                transform: rotate(0deg);
            }
            to {
                transform: rotate(360deg);
            }
        }
       
        .sidebar {
            width: 200px;
            background-color: #007bff;
            padding: 20px;
            color: white;
            position: relative;
        }

        .button {
            display: block;
            padding: 10px;
            margin: 10px 0;
            background-color: #0056b3;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: left;
            width: 100%;
            transition: background-color 0.3s;
        }

        .button:hover {
            background-color: #004494;
        }

        .content {
            flex-grow: 1;
            padding: 20px;
        }

        .text {
            display: none; /* Teks disembunyikan secara default */
            margin-top: 10px;
            padding: 10px;
            background-color: #e9ecef;
            border-radius: 5px;
        }

        .container {
            display: flex;
            justify-content: center;
            gap: 20px; /* Jarak antar shape */
        }

        .rounded-square {
            width: 400px;
            height: 300px;
            background-color:rgb(18, 75, 135);
            border-radius: 15px; /* Sudut membulat */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: white;
            text-align: center;
            padding: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            transform: translateY(260px);
        }

        .rounded-square img {
            max-width: 80%; /* Mengatur ukuran gambar */
            max-height: 80%; /* Mengatur ukuran gambar */
            margin-bottom: 10px; /* Jarak antara gambar dan teks */
        }

        h3 {
            margin: 0; /* Menghilangkan margin default */
            font-weight: bold;
        }

        h1 {
            position: absolute;
            top: 15%;
            left: 50%;
            transform: translate(-50%, -50%);
            color:white;
            font-weight: bold;
        }

        h5 a {
        font-weight: bold;
        color: inherit; /* Warna mengikuti elemen induk */
        text-decoration: none; /* Hilangkan garis bawah */
        }

        table {
            width: 85%; /* Batasi lebar tabel */
            margin: 290px auto; /* Tengahkan tabel pada halaman */
            position : absolute;
            right: 100px;
            border-collapse: collapse; /* Hapus jarak antar garis tabel */
        }
        th, td {
            border: 1px solid #dddddd; /* Tambahkan garis pembatas */
            text-align: left; /* Teks rata kiri */
            padding: 8px; /* Tambahkan ruang di dalam sel */
        }

        th {
            background-color: white;
            text-align:center;    
        }

        td {
            background-color: yellow;
        }

        table tbody tr td:nth-child(6), 
        table thead tr th:nth-child(6) {
            width: 15%;
            /* text-align: center; Contoh tambahan */
        }

        table tbody tr td:nth-child(7), 
        table thead tr th:nth-child(7) {
            width: 7%;
            text-align: center; /* Contoh tambahan */
        }
        
        table tbody tr td:nth-child(8), 
        table thead tr th:nth-child(8) {
            text-align: center; /* Contoh tambahan */
        }


        .search {
            position:absolute;
            top: 150px;
            right: 99px;
        }

        textarea{
            resize: none;
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
                                <i class="bi bi-book-fill"></i> Katalog
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-collection-fill"></i>Transaksi
                        </a>
                        <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="cari_pinjam.php">Peminjaman</a></li>
                            <li><a class="dropdown-item" href="cari_kembali.php">Pengembalian</a></li>
                        </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="laporan.php">
                                <i class="bi bi-file-earmark-text-fill"></i> Laporan
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">
                                <i class="bi bi-box-arrow-left"></i> Keluar
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

        <!-- Textarea dan Tombol Search -->
        <div class="search">
            <div class="row mb-3 align-items-center">
                <!-- Textarea -->
                <div class="col-8">
                <form action="cari_katalog.php" method="get">
                    <input type="text" name="search" placeholder="Masukkan kata kunci pencarian" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
                    <button type="submit">Cari</button>
                </form>
                </div>
                <!-- Button -->
                <div class="col-2">
                    <button class="btn btn-primary w-105" type="button" onclick="findText()">Cari</button>
                </div>
                <div class="col-2">
                    <button class="btn btn-primary w-100" onclick="window.location.href='addcata.php'">
                        <i class="bi bi-pencil-square"></i>
                    </button>
                </div>
            </div>
        </div>
    <table>
    <?php
        // Koneksi ke database
        $conn = new mysqli('localhost', 'root', '', 'gudang_alat');

        if ($conn->connect_error) {
            die("Koneksi gagal: " . $conn->connect_error);
        }

        // Query untuk mengambil data
        $sql = "SELECT * FROM katalog_alat";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table border='1'>
                    <tr>
                        <th>No</th>
                        <th>Kode Alat</th>
                        <th>Nama Alat</th>
                        <th>Jenis Alat</th>
                        <th>Stok Tetap</th>
                        <th>Jumlah Stok</th>
                        <th>Posisi Alat</th>
                        <th>Gambar Alat</th>
                        <th>Lainnya</th>
                    </tr>";
            $no = 1;

            while ($row = $result->fetch_assoc()) {
                // Path gambar
                $gambar_alat = "uploads/" . $row['gambar_alat'];

                // Validasi keberadaan gambar
                if (empty($row['gambar_alat']) || !file_exists($gambar_alat)) {
                    $gambar_alat = "uploads/default.jpg"; // Path default gambar
                }

                // URL gambar untuk dibuka di halaman baru
                $gambar_url = "http://localhost/" . $gambar_alat;

                echo "<tr class='data-row'>
                        <td>" . $no++ . "</td>
                        <td>" . $row['kode_alat'] . "</td>
                        <td>" . $row['nama_alat'] . "</td>
                        <td>" . $row['jenis_alat'] . "</td>
                        <td>" . $row['stok_tetap'] . "</td>
                        <td>" . $row['jumlah_stok'] . "</td>
                        <td>" . $row['posisi_alat'] . "</td>
                        <td>
                            <img src='" . $gambar_url . "' alt='Gambar Alat' width='100' height='100'>
                        </td>
                        <td>
                            <a href='hapus_katalog.php?kode_alat=" . $row['kode_alat'] . "'>
                            <button class='btn btn-primary btn-sm' onclick='return confirm(\"Yakin ingin menghapus data ini?\")'>
                                <i class='bi bi-trash3-fill'></i>
                            </button>
                            </a>
                        </td>
                    </tr>";
            }
            echo "</table>";
        } else {
            echo "Tidak ada data.";
        }

        $conn->close();
    ?>
    </table>
    <div class="container">
    <h1>Daftar Katalog Alat</h1>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>