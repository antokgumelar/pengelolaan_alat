<?php
    require 'session_check.php'
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pengembalian Alat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Bootstrap JS (Optional if you need dropdowns or other features) -->
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
            margin-top: 80px;
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
            top: 20%;
            left: 50%;
            transform: translate(-50%, -50%);
            color:white;
            font-weight: bold;
            display: flex;
            flex-wrap: nowrap;
            align-item: center;
            justify-content: center;
        }

        h5 a {
            font-weight: bold;
            color: inherit; /* Warna mengikuti elemen induk */
            text-decoration: none; /* Hilangkan garis bawah */
        } 
        
        .input-group{
            display: flex;
            align-items: center;
            justify-content: end;
            margin-top: 120px;
        }

        .input-group .form-container{
            display: flex;
            align-items: center;
        }

        .input-group-append{
            display: flex;
        }

        .table-container {
            padding-top: 50px;
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
            text-align: center;
        }

        th {
            background-color: rgb(18, 75, 135);
            color: white;
            font-size: 13px;
        }

        td{
            text-align: center;
            font-weight: bold;
        }

        img {
            width: 80px;
            height: 100px;
            border: 3px solid white;
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
    
    <!-- Textarea dan Tombol Search -->
<div class="content">
    <h1>Daftar Pengembalian Alat</h1>
    <div class="input-group">
        <form action="cari_kembali.php" method="get" class="form-container">
            <input type="text" class="form-control" name="search" placeholder="Masukkan kata kunci pencarian" value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>">
            <div class="input-group-append">
                <button class="btn btn-outline-primary" type="submit">
                <i class="bi bi-search"></i>
                </button>
            </div>
        </form>
    </div>
<div class="container">
<div class="table-container">
    <?php
        $conn = new mysqli('localhost','root', '', 'gudang_alat');

        if ($conn->connect_error){
            die("Koneksi gagal: ". $conn->connect_error);
        }

        $searchTerm = isset($_GET['search']) ? $_GET['search'] : '';

        $sql = "SELECT * FROM kembali_alat 
                WHERE nama_pegawai LIKE ? OR kode_alat LIKE ? OR nama_alat LIKE ? OR kondisi_alat LIKE ? OR id_kembali LIKE ?
                ORDER BY tanggal_kembali DESC";
        $stmt = $conn->prepare($sql);
        $searchTermLike = "%" . $searchTerm . "%";
        $stmt->bind_param("sssss", $searchTermLike, $searchTermLike, $searchTermLike, $searchTermLike, $searchTermLike);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows >0) {
            echo "<table order='1'>
                <tr>
                    <th>No</th>
                    <th>ID Pengembalian</th>
                    <th>Tanggal Pengembalian</th>
                    <th>ID Peminjaman</th>
                    <th>Tanggal Peminjaman</th>
                    <th>Nomor Induk Pegawai</th>
                    <th>Nama Pegawai</th>
                    <th>Kode Alat</th>
                    <th>Nama Alat</th>
                    <th>Qty</th>
                    <th>Kondisi Alat</th>
                </tr>";
            $no = 1;

            while ($row = $result-> fetch_assoc()) {
                echo "<tr>
                        <td>" . $no++ . "</td>
                        <td>" . $row['id_kembali']. "</td>
                        <td>" . $row['tanggal_kembali']. "</td>
                        <td>" . $row['id_pinjam']. "</td>
                        <td>" . $row['tanggal_pinjam']. "</td>
                        <td>" . $row['nik_pegawai']. "</td>
                        <td>" . $row['nama_pegawai']. "</td>
                        <td>" . $row['kode_alat']. "</td>
                        <td>" . $row['nama_alat']. "</td>
                        <td>" . $row['qty']. "</td>
                        <td>" . $row['kondisi_alat']. "</td>
                    </tr>";
            } 
            echo "</table>";
    } else {
        echo "Tidak ada kata";
    }

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