<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Peminjaman Alat</title>
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
        top: 100px;
        }

        table {
            width: 85%; /* Batasi lebar tabel */
            margin: 290px auto; /* Tengahkan tabel pada halaman */
            position : absolute;
            left: 120px;
            border-collapse: collapse; /* Hapus jarak antar garis tabel */
            /*table-layout: fixed;  Sesuaikan lebar kolom dengan konten */
        }
        th, td {
            border: 1px solid #dddddd; /* Tambahkan garis pembatas */
            text-align: left; /* Teks rata kiri */
            padding: 8px; /* Tambahkan ruang di dalam sel */
        }

        th {
            background-color: white;
            text-align: center;    
        }

        td {
            background-color: yellow;
        }

        table tbody tr td:nth-child(1), 
        table thead tr th:nth-child(1) {
            width: 2%;
            text-align: left; /* Contoh tambahan */
        }

        table tbody tr td:nth-child(2), 
        table thead tr th:nth-child(2) {
            width: 12%;
            text-align: left; /* Contoh tambahan */
        }

        table tbody tr td:nth-child(3), 
        table thead tr th:nth-child(3) {
            width: 15%;
            text-align: left; /* Contoh tambahan */
        }

        table tbody tr td:nth-child(4), 
        table thead tr th:nth-child(4) {
            width: 12%;
            text-align: left; /* Contoh tambahan */
        }

        table tbody tr td:nth-child(5), 
        table thead tr th:nth-child(5) {
            width: 10%;
            text-align: left; /* Contoh tambahan */
        }

        table tbody tr td:nth-child(7), 
        table thead tr th:nth-child(7) {
            width: 5%;
            text-align: left; /* Contoh tambahan */
        }

        table tbody tr td:nth-child(8), 
        table thead tr th:nth-child(8) {
            width: 11%;
            text-align: left; /* Contoh tambahan */
        }

        table tbody tr td:nth-child(9), 
        table thead tr th:nth-child(9) {
            width: 12%;
            text-align: center; /* Contoh tambahan */
            font-style: italic;
        }

        table tbody tr td:nth-child(10), 
        table thead tr th:nth-child(10) {
            width: 12%;
            text-align: center; /* Contoh tambahan */
        }

        .search {
            position:absolute;
            top: 220px;
            right: 100px;
        }

        textarea{
            resize: none;
        }

        .custom-spacing {
            margin: 0.1px; /* Memberikan jarak antar objek */
        }

    </style>
</head>
<body>
    <div class="prisma"></div>
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
        <div class="row row mb-6 align-items-center">
            <!-- Textarea -->
            <div class="col-5 custom-spacing">
                <textarea id="searchTextarea" class="form-control" rows="1" placeholder="Cari Disini"></textarea>
            </div>
            <!-- Button -->
            <div class="col-auto custom-spacing">
                <button class="btn btn-primary w-100" onclick="searchTable()">Cari</button>
            </div>
            <div class="col-auto custom-spacing">
            <button class="btn btn-primary w-100" onclick="window.location.href='formpinjam.php'">
                <i class="bi bi-pencil-square"></i>
            </button>
            </div>
            <div class="col-auto custom-spacing">
            <button class="btn btn-primary w-100" onclick="window.location.href='form_update.php'">
                <i class='bi bi-arrow-clockwise'></i>
            </button>
            </div>
            <div class="col-auto custom-spacing">
            <button class="btn btn-primary w-100" onclick="window.location.href='form_kembali.php'">
                <i class='bi bi-box-seam-fill'></i>
            </button>
            </div>
        </div>
    </div>
       
    <table>
    <?php
    $conn = new mysqli('localhost','root', '', 'gudang_alat');

    if ($conn->connect_error) {
        die("Koneksi gagal: ". $conn->connect_error);
    }

    //query select data pinjam_alat
    $sql = "SELECT * FROM pinjam_alat";
    $result = $conn->query($sql);

    if ($result->num_rows >0) {
        echo "<table border='1'>
            <tr>
                <th>No</th>
                <th>ID Peminjaman</th>
                <th>Tanggal Peminjaman</th>
                <th>Nama Peminjam</th>
                <th>Kode Alat</th>
                <th>Nama Alat</th>
                <th>Qty</th>
                <th>Admin</th>
                <th>Status Peminjaman</th>
            </tr>";
        $no = 1;

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $no++ . "</td>
                    <td>" . $row['id_pinjam'] . "</td>
                    <td>" . $row['tanggal_pinjam'] . "</td>
                    <td>" . $row['nama_peminjam'] . "</td>
                    <td>" . $row['kode_alat'] . "</td>
                    <td>" . $row['nama_alat'] . "</td>
                    <td>" . $row['qty'] . "</td>
                    <td>" . $row['admin'] . "</td>
                    <td>" . $row['status_peminjaman'] . "</td>
                </tr>";
        }
        echo "</table>";
    } else {
        echo "Tidak ada data.";
    }

    $conn->close();
    ?>
    
    <div class="container">
    <h1>Daftar Peminjaman Alat</h1>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>